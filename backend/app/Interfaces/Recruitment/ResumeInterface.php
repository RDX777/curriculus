<?php

namespace App\Interfaces\Recruitment;

interface ResumeInterface
{
    public function search(array $item);
    public function searchByUuid(array $item);
}
