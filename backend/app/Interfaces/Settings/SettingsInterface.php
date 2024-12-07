<?php

namespace App\Interfaces\Settings;

interface SettingsInterface
{
    public function listRoles();
    public function searchRoleById(int $itemTosearch);
    public function changeRoleMiddlewareStatus(int $idRole, array $validated);
    public function changeRoleMenuStatus(int $idRole, array $validated);
    public function changeRoleActionStatus(int $idRole, array $validated);
}
