<?php

namespace App\Interfaces\Auth;

interface AuthInterface
{
    public function login(array $user);
    public function logout();
}
