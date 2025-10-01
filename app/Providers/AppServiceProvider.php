<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Http\View\Composers\CartComposer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Compartir el contador del carrito con la vista layouts.app
        View::composer('layouts.app', CartComposer::class);
    }
}
