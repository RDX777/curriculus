<?php

namespace App\Providers\Recruitment;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Recruitment\ResumeInterface;
use App\Services\Recruitment\ResumeService;

class ResumeProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ResumeInterface::class, function () {
            return new ResumeService;
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
