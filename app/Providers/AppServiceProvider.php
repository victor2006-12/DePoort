<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Client;                

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
    public function boot()
    {
        // Deel de clientnaam met de navbar view
        View::composer('includes.navbar', function ($view) {
            // Haal de clientnaam op (pas dit aan naar jouw logica)
            $client = Client::first(); // Of een specifieke client ophalen, afhankelijk van je toepassing
            $view->with('clientName', $client ? $client->name : 'Client Name');
        });
    }
}
