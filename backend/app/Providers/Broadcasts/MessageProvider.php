<?php

namespace App\Providers\Broadcasts;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Broadcasts\MessageInterface;
use App\Services\Broadcasts\MessageService;

class MessageProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MessageInterface::class, function () {
            return new MessageService;
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
