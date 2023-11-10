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

    // Aquí también puedes registrar rutas, vistas, y publicar archivos de configuración.
    }
}