<?php

namespace App\Providers\Recruitment;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Recruitment\VacancyInterface;
use App\Services\Recruitment\VacancyService;

class VacancyProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(VacancyInterface::class, function () {
            return new VacancyService;
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
