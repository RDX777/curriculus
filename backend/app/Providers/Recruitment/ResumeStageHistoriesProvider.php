<?php

namespace App\Providers\Recruitment;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Recruitment\ResumeStageHistoriesInterface;
use App\Services\Recruitment\ResumeStageHistoriesService;

class ResumeStageHistoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ResumeStageHistoriesInterface::class, function () {
            return new ResumeStageHistoriesService;
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
