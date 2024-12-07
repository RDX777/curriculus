<?php

namespace App\Services\Recruitment;

class Recruitment
{
    protected function yesNoAll($active)
    {
        return match ($active) {
            'no' => [0],
            'yes' => [1],
            'all' => [0, 1],
            default => [0, 1],
        };
    }
}
