<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        // Esto permite que cuando se muestre la visualización de clientes
        // a través de 'paginate' en la función "index()" del "ClientController"
        // implementando {!! $clients->links() !! } en el 'resources/views/clients/index.blade.html'
        // No haga conflicto bootstrap con la view de las paginaciones propias de laravel
        // modificando las dimensiones de los elementos de control en la navegación de la tabla
        // Estableciendo que la versión de Bootstrap que se está manejando en este proyecto es el 5.x
        Paginator::useBootstrapFive();
    }
}
