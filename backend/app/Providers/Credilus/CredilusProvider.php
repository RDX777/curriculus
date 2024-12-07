<?php

namespace App\Providers\Credilus;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Credilus\CredilusInterface;
use App\Services\Credilus\CredilusService;

class CredilusProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CredilusInterface::class, function () {
            return new CredilusService;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
