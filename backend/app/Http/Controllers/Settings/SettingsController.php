<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Services\Settings\SettingsService;
use App\Http\Requests\Settings\PermissionRoleRequest;

class SettingsController extends Controller
{

    public function listRoles(SettingsService $settingsService)
    {
        $result = $settingsService->listRoles();
        return response()->json($result, $result["statusCode"]);
    }

    public function searchRoleById(SettingsService $settingsService)
    {
        $itemSearch = request("itemSearch");
        $result = $settingsService->searchRoleById((int) $itemSearch);
        return response()->json($result, $result["statusCode"]);
    }

    public function changeRoleMiddlewareStatus(PermissionRoleRequest $requestPermissionRoleRequest, SettingsService $settingsService)
    {
        $id = request("idRole");
        $validated = $requestPermissionRoleRequest->validated();
        $result = $settingsService->changeRoleMiddlewareStatus((int) $id, $validated);
        return response()->json(null, $result["statusCode"]);
    }

    public function changeRoleMenuStatus(PermissionRoleRequest $requestPermissionRoleRequest, SettingsService $settingsService)
    {
        $id = request("idRole");
        $validated = $requestPermissionRoleRequest->validated();
        $result = $settingsService->changeRoleMenuStatus((int) $id, $validated);
        return response()->json(null, $result["statusCode"]);
    }

    public function changeRoleActionStatus(PermissionRoleRequest $requestPermissionRoleRequest, SettingsService $settingsService)
    {
        $id = request("idRole");
        $validated = $requestPermissionRoleRequest->validated();
        $result = $settingsService->changeRoleActionStatus((int) $id, $validated);
        return response()->json(null, $result["statusCode"]);
    }
}
