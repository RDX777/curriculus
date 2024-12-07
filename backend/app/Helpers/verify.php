<?php

namespace App\Helpers;



if (!function_exists("verify")) {
    /**
     * Checks if the currently authenticated user has the specified ability.
     *
     * This function checks whether the logged in user has access to the specified
     * resource.
     *
     * @param array $role The role array containing permissions.
     * @param string $type The type of permissions to check.
     * @param string $name The name of the ability to check.
     *
     * @return bool True if the user has the ability, false otherwise.
     */
    function verify(array $role, string $type, string $name): bool
    {
        if ($role["id"] == 1 and $role["name"] == env("GROUP_NAME_ADMIN")) {
            return true;
        }

        return collect($role[$type])->contains(function ($middleware) use ($name) {
            return $middleware['name'] === $name;
        });

        return false;
    }
}
