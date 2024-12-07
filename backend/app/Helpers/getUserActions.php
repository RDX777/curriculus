<?php

namespace App\Helpers;

use App\Models\Auth\Action;
use App\Models\Auth\Role;

use function App\Helpers\getAbility;

if (!function_exists("getUserActions")) {

    /**
     * Get abilities from a logged user
     *
     * @param string $typeName
     * @return array|null
     */

    function getUserActions(string $ability): array|null
    {

        if (!empty($ability)) {
            $abilityFonded = $ability;
        } else {
            $abilityFonded = getAbility();
        }

        $role = Role::where("name", "=", $abilityFonded)
            ->where("active", "=", true)
            ->first()
            ->toArray();

        if (empty($role)) {
            abort(403, "User has no role from actions");
        }

        if ($abilityFonded == env("GROUP_NAME_ADMIN")) {

            $actions = Action::where("active", "=", true)
                ->get()
                ->toArray();
        } else {
            $actions = Action::where("active", "=", true)
                ->whereHas('roles', function ($query) use ($role) {
                    $query->where('role_id', $role["id"]);
                })
                ->get()
                ->toArray();
        }

        return $actions;
    }
}
