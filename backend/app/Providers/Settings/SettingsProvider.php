<?php

namespace App\Providers\Settings;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Settings\SettingsInterface;
use App\Services\Settings\SettingsService;

class SettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SettingsInterface::class, function () {
            return new SettingsService;
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
