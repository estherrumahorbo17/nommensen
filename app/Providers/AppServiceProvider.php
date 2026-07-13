<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringlength(191);

        // Disable PHP timeout for local environment (multi-upload support)
        if (app()->environment('local')) {
            @set_time_limit(0);
            @ini_set('max_execution_time', 0);
        }
    }
}
