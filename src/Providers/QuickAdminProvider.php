<?php

namespace Nasermekky\Quickadmin\Providers;

use Illuminate\Support\ServiceProvider;

class QuickAdminProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'quickadmin');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        
        // Publishes Files
        $this->publishes([
            __DIR__.'/../config/quickadmin.php' => config_path('quickadmin.php'),
        ],'QuickAdminConfig');
    }
}
