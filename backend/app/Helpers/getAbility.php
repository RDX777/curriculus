<?php

namespace App\Helpers;

use App\Models\Auth\PersonalAccessToken;
use Illuminate\Support\Str;

if (!function_exists("getAbility")) {

    /**
     * Get ability from a logged user
     */

    function getAbility()
    {
        $user = auth()->user();

        if ($user) {
            $abilities = PersonalAccessToken::select("abilities")
                ->where("tokenable_id", "=", $user->id)
                ->first();
            if ($abilities) {
                return Str::between($abilities->abilities, '["', '"]');
            }
        }
        return null;
    }
}
