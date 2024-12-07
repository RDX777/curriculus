<?php

namespace App\Helpers;

use App\Models\Auth\Menu;
use App\Models\Auth\Role;


if (!function_exists("getUserMenus")) {

    /**
     * Get abilities from a role user
     *
     * @param string $roleName
     * @return array|null
     */

    function getUserMenus(string $roleName): array|null
    {

        $role = Role::where("name", "=", $roleName)
            ->where("active", "=", true)
            ->first()
            ->toArray();

        if (empty($role)) {
            abort(403, "User has no role from menus");
        }

        if ($roleName == env("GROUP_NAME_ADMIN")) {

            $menus = Menu::with("route")
                ->where("active", "=", true)
                ->orderBy("position", "asc")
                ->get();
            $role["menus"] = $menus->toArray();
        } else {

            $menus = Menu::with("route")
                ->where("active", "=", true)
                ->whereHas('roles', function ($query) use ($role) {
                    $query->where('role_id', $role["id"]);
                })
                ->orderBy("position", "asc")
                ->get();
            $role["menus"] = $menus->toArray();
        }

        return $role;
    }
}
