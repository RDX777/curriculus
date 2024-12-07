<?php

namespace App\Providers\Recruitment;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Recruitment\RecruitmentStageInterface;
use App\Services\Recruitment\RecruitmentStageService;

class RecruitmentStageProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RecruitmentStageInterface::class, function () {
            return new RecruitmentStageService;
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
