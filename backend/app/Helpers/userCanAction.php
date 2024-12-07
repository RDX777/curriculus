<?php

namespace App\Helpers;

use function App\Helpers\getAbility;
use function App\Helpers\getUserActions;

if (!function_exists("userCanAction")) {

    /**
     * Returns if a logged user can execute an function
     *
     * @param string $actionName
     */

    function userCanAction(string $actionName)
    {

        $ability = getAbility();
        $actions = getUserActions($ability);

        $collection = collect($actions);
        $contains = $collection->contains(function ($item, $key) use ($actionName) {
            return $item['name'] === $actionName;
        });

        if (!$contains) {
            abort(403, "User can't execute this function");
        }
    }
}
