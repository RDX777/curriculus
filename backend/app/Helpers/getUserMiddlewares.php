<?php

namespace App\Helpers;

use App\Models\Auth\Middleware;
use App\Models\Auth\Role;

use function App\Helpers\getAbility;

if (!function_exists("getUserMiddlewares")) {

    /**
     * Get abilities from a logged user
     *
     * @param string $typeName
     * @return array|null
     */

    function getUserMiddlewares(): array|null
    {
        $abilityFonded = getAbility();

        $role = Role::where("name", "=", $abilityFonded)
            ->where("active", "=", true)
            ->first()
            ->toArray();

        if (empty($role)) {
            abort(403, "User has no role");
        }

        if ($abilityFonded == env("GROUP_NAME_ADMIN")) {

            $middlewares = Middleware::where("active", "=", true)->get();
            $role["middlewares"] = $middlewares->toArray();
        } else {
            $middlewares = Middleware::with("roles")
                ->where("active", "=", true)
                ->whereHas('roles', function ($query) use ($role) {
                    $query->where('role_id', $role["id"]);
                })
                ->get();
            $role["middlewares"] = $middlewares->toArray();
        }

        return $role;
    }
}
