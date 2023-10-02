<?php

namespace App\Providers;

use App\Repositories\FlashMessagesRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Flash messages container
        $this->app->singleton('common.flash_message', FlashMessagesRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
