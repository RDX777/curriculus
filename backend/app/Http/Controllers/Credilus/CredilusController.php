<?php

namespace App\Http\Controllers\Credilus;

use App\Http\Controllers\Controller;

use App\Interfaces\Credilus\CredilusInterface;

use App\Http\Requests\Credilus\SearchByName;
use App\Http\Requests\Credilus\SearchByAddress;
use App\Http\Requests\Credilus\SearchByCpf;
use App\Http\Requests\Credilus\SearchByEmail;

class CredilusController extends Controller
{
    public function searchById(CredilusInterface $credilusService)
    {
        $itemSearch = request("id");
        $result = $credilusService->searchById($itemSearch);
        return response()->json($result, $result["statusCode"]);
    }

    public function searchByCpf(CredilusInterface $credilusService)
    {
        $itemSearch = request("cpf");
        $result = $credilusService->searchByCpf($itemSearch);
        return response()->json($result, $result["statusCode"]);
    }

    public function searchByPhone(CredilusInterface $credilusService)
    {
        $itemSearch = request("phone");
        $result = $credilusService->searchByPhone($itemSearch);
        return response()->json($result, $result["statusCode"]);
    }

    public function searchByName(SearchByName $request, CredilusInterface $credilusService)
    {
        $parameters = $request->validated();
        $result = $credilusService->searchByName($parameters);
        return response()->json($result, $result["statusCode"]);
    }

    public function searchByAddress(SearchByAddress $request, CredilusInterface $credilusService)
    {
        $parameters = $request->validated();
        $result = $credilusService->searchByAddress($parameters);
        return response()->json($result, $result["statusCode"]);
    }

    public function searchByRelative(SearchByCPF $request, CredilusInterface $credilusService)
    {
        $parameters = $request->validated();
        $result = $credilusService->searchByRelative($parameters);
        return response()->json($result, $result["statusCode"]);
    }

    public function searchByEmail(SearchByEmail $request, CredilusInterface $credilusService)
    {
        $parameters = $request->validated();
        $result = $credilusService->searchByEmail($parameters);
        return response()->json($result, $result["statusCode"]);
    }
}
