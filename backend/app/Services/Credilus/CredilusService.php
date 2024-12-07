<?php

namespace App\Services\Credilus;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;

use App\Interfaces\Credilus\CredilusInterface;
use App\Models\ExternalCredentials\ExternalCredentials;

use function App\Helpers\userCanAction;


class CredilusService implements CredilusInterface
{

    protected $baseUrl;
    protected $token;

    public function __construct()
    {
        $credilus = ExternalCredentials::where('system', '=', 'CREDILUS')->get();
        $credilusArray = $credilus->pluck('information', 'name')->toArray();

        $this->baseUrl = $credilusArray['URL'];
        $this->token = $credilusArray['TOKEN'];
    }

    private function getCpfCredilus(string $cpf)
    {
        try {
            $response = Http::timeout(120)
                ->withToken($this->token)
                ->withOptions(['verify' => false])
                ->get($this->baseUrl . "/credilink/search/integration/cpf", [
                    "cpf" => $cpf,
                ]);
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    private function getPhoneCredilus(string $phone)
    {
        try {
            $response = Http::timeout(120)
                ->withToken($this->token)
                ->withOptions(['verify' => false])
                ->get($this->baseUrl . "/credilink/search/integration/phone", [
                    "phone" => $phone,
                ]);
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    private function getRawCredilus(string $parialUrl, array $params)
    {
        $url = $this->baseUrl . "/credilink/search/" . $parialUrl;
        try {
            $response = Http::timeout(120)
                ->withToken($this->token)
                ->withOptions(['verify' => false])
                ->get($url, $params);
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function searchByCpfUnprivileged(string $cpf)
    {
        if ($cpf) {
            $response = $this->getCpfCredilus($cpf);

            if (isset($response["data"])) {
                return [
                    "statusCode" => Response::HTTP_OK,
                    "data" => $response["data"]
                ];
            }
            return [
                "statusCode" => Response::HTTP_NOT_FOUND,
                "message" => "A client cpf not found"
            ];
        }
    }

    public function searchByCpf(string $cpf)
    {
        userCanAction("can-credilus-search-cpf");

        return $this->searchByCpfUnprivileged($cpf);
    }

    public function searchByPhone(string $phone)
    {
        userCanAction("can-credilus-search-phone");

        if ($phone) {
            $response = $this->getPhoneCredilus($phone);

            if (isset($response["data"])) {
                return [
                    "statusCode" => Response::HTTP_OK,
                    "data" => $response["data"]
                ];
            }
            return [
                "statusCode" => Response::HTTP_NOT_FOUND,
                "message" => "A client phone not found"
            ];
        }
    }

    private function clearRequestNoNull(array $request)
    {
        return array_filter($request, function ($value) {
            return !is_null($value);
        });
    }

    private function upperRequest(array $requestNoNull)
    {
        $arrayToUpper = $this->clearRequestNoNull($requestNoNull);
        return array_map('strtoupper', $arrayToUpper);
    }

    public function searchByName($request)
    {
        userCanAction("can-credilus-search-name");

        $requestNotNull = $this->upperRequest($request);

        if ($requestNotNull) {
            $partialUrl = "integration/name";
            $response = $this->getRawCredilus($partialUrl, $requestNotNull);
            if (isset($response["data"])) {
                return [
                    "statusCode" => Response::HTTP_OK,
                    "data" => $response["data"]
                ];
            }
            return [
                "statusCode" => Response::HTTP_NOT_FOUND,
                "message" => "A client name not found"
            ];
        }
    }

    public function searchByAddress($request)
    {
        userCanAction("can-credilus-search-address");

        $requestNotNull = $this->upperRequest($request);

        if ($requestNotNull) {
            $partialUrl = "integration/address";
            $response = $this->getRawCredilus($partialUrl, $requestNotNull);
            if (isset($response["data"])) {
                return [
                    "statusCode" => Response::HTTP_OK,
                    "data" => $response["data"]
                ];
            }
            return [
                "statusCode" => Response::HTTP_NOT_FOUND,
                "message" => "A client address not found"
            ];
        }
    }

    public function searchByRelative($request)
    {
        userCanAction("can-credilus-search-relative");

        $partialUrl = "wsdl/relative";
        $response = $this->getRawCredilus($partialUrl, $request);
        if (isset($response["data"])) {
            return [
                "statusCode" => Response::HTTP_OK,
                "data" => $response["data"]
            ];
        }
        return [
            "statusCode" => Response::HTTP_NOT_FOUND,
            "message" => "A client relative not found"
        ];
    }

    public function searchByEmail($request)
    {
        userCanAction("can-credilus-search-email");

        $partialUrl = "wsdl/email";
        $response = $this->getRawCredilus($partialUrl, $request);
        if (isset($response["data"])) {
            return [
                "statusCode" => Response::HTTP_OK,
                "data" => $response["data"]
            ];
        }
        return [
            "statusCode" => Response::HTTP_NOT_FOUND,
            "message" => "A client email not found"
        ];
    }
}
