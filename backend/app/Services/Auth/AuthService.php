<?php

namespace App\Services\Auth;

use App\Interfaces\Auth\AuthInterface;
use App\Models\User;
use App\Models\Auth\Role;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

use function App\Helpers\getUserMenus;
use function App\Helpers\getUserActions;

class AuthService implements AuthInterface
{
    private string $adilusLink;

    public function __construct()
    {
        $this->adilusLink = config('environment.adilus_url');
    }

    private function getGroup(string $group)
    {
        preg_match('/CN=([^,]+)/', $group, $matches);
        return $matches[1];
    }

    private function extractGroup(array $userAd)
    {
        return array(
            "username" => $userAd["username"],
            "name" => $userAd["name"],
            "group" => $this->getGroup($userAd["groups"][0]),
        );
    }

    private function userIsBlocked(string $username): bool
    {
        $bloqued = User::where("active", "=", false)
            ->where("username", "=", $username)
            ->first();

        if (isset($bloqued) and $bloqued->active == false) {
            return true;
        }
        return false;
    }

    public function login(array $user)
    {
        try {
            $endpoint = "authentication/me-ad";
            $fullUrl = $this->adilusLink . $endpoint;

            $response = Http::post($fullUrl, [
                "username" => $user["username"],
                "password" => $user["password"],
                "groupToBring" => isset($user["groupToBring"]) ? $user["groupToBring"] : config('environment.group_to_bring')
            ]);

            if ($response->status() == 200) {
                $responseRaw = $response->json();

                if (count($responseRaw["groups"]) > 1) {
                    return [
                        "statusCode" => 409,
                        "message" => "Many groups founded"
                    ];
                }

                if (!isset($responseRaw["groups"][0])) {
                    return [
                        "statusCode" => 401,
                        "message" => "No permissions found"
                    ];
                }

                $groupUser = Role::where("name", "=", $responseRaw["groups"][0])
                    ->where("active", "=", true)
                    ->first();

                if (!$groupUser) {
                    return [
                        "statusCode" => 401,
                        "message" => "User does not have the necessary group to access this system"
                    ];
                }

                if ($this->userIsBlocked($user["username"])) {

                    return [
                        "statusCode" => 403,
                        "message" => "User is blocked to access this system"
                    ];
                }

                $userToSave = [
                    "name" => $responseRaw["name"],
                    "username" => $responseRaw["username"],
                    "password" => bcrypt($user["password"])
                ];

                $userSaved = User::updateOrCreate(["username" => $userToSave["username"]], $userToSave);
                //multisessão?
                $userSaved->tokens()->delete();

                $menus = getUserMenus($responseRaw["groups"][0]);
                $actions = getUserActions($responseRaw["groups"][0]);

                $userAuth = [
                    "statusCode" => 200,
                    "data" => [
                        "id" => $userSaved["id"],
                        "name" => $responseRaw["name"],
                        "username" => $responseRaw["username"],
                        "group" => $responseRaw["groups"][0],
                        "token" => $userSaved->createToken($userToSave["password"] . strtotime('now'), [$responseRaw["groups"][0]])->plainTextToken,
                        "role" => $menus,
                        "actions" => $actions
                    ]
                ];
                return $userAuth;
            } else {
                return [
                    "statusCode" => $response->status(),
                    ...$response->json(),
                ];
            }
        } catch (Exception $e) {
            return [
                "statusCode" => 500,
                $e,
            ];
        }
    }

    public function logout()
    {
        $user = auth()->user();
        /** @disregard P1013 running and working function load */
        $user->tokens()->delete();

        return [
            "statusCode" => Response::HTTP_NO_CONTENT,
        ];
    }
}
