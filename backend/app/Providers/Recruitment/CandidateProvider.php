<?php

namespace App\Providers\Recruitment;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Recruitment\CandidateInterface;
use App\Services\Recruitment\CandidateService;

class CandidateProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CandidateInterface::class, function () {
            return new CandidateService;
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
