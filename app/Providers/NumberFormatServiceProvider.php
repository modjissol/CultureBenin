<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\NumberService;
use Illuminate\Support\Facades\App;

class NumberFormatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Enregistre notre service personnalisé
        $this->app->singleton('number', function () {
            return new NumberService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Remplace la classe Number par défaut par notre implémentation
        App::bind('number', function() {
            return new NumberService();
        });
    }
}
