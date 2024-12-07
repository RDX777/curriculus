<?php

namespace App\Providers\Auth;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Auth\AuthInterface;
use App\Services\Auth\AuthService;

class AuthProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthInterface::class, function () {
            return new AuthService;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
