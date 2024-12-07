<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Interfaces\Auth\AuthInterface;
use App\Http\Requests\Auth\AuthLoginRequest;

class AuthController extends Controller
{

    public function login(AuthLoginRequest $request, AuthInterface $authService)
    {
        $user = $request->validated();

        $userLogged = $authService->login($user);
        return response()->json($userLogged, $userLogged["statusCode"]);
    }

    public function logout(AuthInterface $authService)
    {

        $userLogged = $authService->logout();
        return response()->json(null, $userLogged["statusCode"]);
    }
}
