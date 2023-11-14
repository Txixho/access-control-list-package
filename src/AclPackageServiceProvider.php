<?php

namespace Fbaconsulting\Aclpackage2;

use Illuminate\Support\ServiceProvider;
use Fbaconsulting\Aclpackage2\Http\Middleware\ComprobarAccesoRuta;
use Fbaconsulting\Aclpackage2\Http\Middleware\ComprobarRutaUsuario;

class AclPackageServiceProvider extends ServiceProvider
{
    public function register()
    {
    // Registración de servicios, inyección de dependencias, etc.
    }

    public function boot()
    {
        // Obtener el router a través del contenedor de servicios de Laravel
        $router = $this->app['router'];

        // Registrar middlewares
        $router->aliasMiddleware('comprobar.usuario.ruta', ComprobarRutaUsuario::class);
        $router->aliasMiddleware('comprobar.ruta', ComprobarAccesoRuta::class);

        //Registrar vistas
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'aclpackage2');
        $this->loadViewsFrom(__DIR__.'/../resources/views/admin', 'aclpackage2-admin');

        // Permitir la publicación de las vistas
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/aclpackage2'),
            __DIR__.'/../resources/views/admin' => resource_path('views/vendor/aclpackage2-admin'),
        ], 'aclpackage2-views');
    }
}