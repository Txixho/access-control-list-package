# Users Access Control List (ACL) Package

Este paquete proporciona una manera sencilla de añadir control de acceso basado en roles a tu aplicación Laravel.

## Instalación

Para instalar el paquete, sigue estos pasos:

### Paso 1: Agregar el Repositorio de GitHub

Primero, necesitarás decirle a Composer dónde encontrar tu paquete. Agrega el repositorio a la sección `repositories` (si no existe agrégala) en el `composer.json` de tu proyecto Laravel:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Txixho/acl-package2"
        }
    ]
}
```
### Paso 2: Instalar el Paquete con Composer
Ahora puedes instalar el paquete utilizando Composer. Ejecuta el siguiente comando en tu terminal:

```bash
composer require fbaconsulting/aclpackage2
```
Este comando descargará e instalará el paquete en tu proyecto.


### Paso 3: Integrar Traits en los Modelos Usuario y Cliente
En el modelo Usuario agrega lo siguiente:

```
use Fbaconsulting\Aclpackage2\Traits\UsuarioTrait;

class Usuario extends Authenticatable {
    use UsuarioTrait;
    // Resto del modelo...
}
```
En el modelo Cliente agrega lo siguiente:

```
use Fbaconsulting\Aclpackage2\Traits\ClienteTrait;

class Cliente extends Authenticatable {
    use ClienteTrait;
    // Resto del modelo...
}
```

### Paso 4: Asignar Middleware a las Rutas
Por último, necesitas asignar el middleware a las rutas que quieras proteger en tu aplicación Laravel. Agrega el middleware a tus rutas en los archivos de rutas como `routes/web.php`:

```
Route::get('/ruta-protegida', function () {
// ... (tu lógica para la ruta)
})->middleware('comprobar.ruta');
```
Reemplaza /ruta-protegida con la ruta específica que quieres proteger.
También podrías aplicarlo a grupos de rutas:

```
Route::middleware(['comprobar.ruta'])->group(function () {

    Route::get('/ruta-protegida', [MyContoller::class, 'index'])->name('index');
});
```
### Paso 5 (OPCIONAL): Publicar vistas
Si quieres puedes publicar las vistas del paquete ejecutando el siguiente comando en tu terminal:

```bash
php artisan vendor:publish --tag=aclpackage2-views
```
Encontrarás las vistas para poder ser personalizadas en el directorio `resources/views/vendor/aclpackage2`.

### Paso 6 (OPCIONAL): Publicar rutas
Si quieres puedes publicar las rutas del paquete ejecutando el siguiente comando en tu terminal:

```bash
php artisan vendor:publish --tag=aclpackage2-routes
```
Encontrarás las rutas para poder ser personalizadas y usadas en las vistas en `routes/aclpackage2.php`

### Uso
Si usas el middleware con alias `comprobar.ruta`, limitarás el acceso a los usuarios cuyo perfil tenga acceso a esa ruta. Si utilizas el middleware con alias `comprobar.usuario.ruta` también permitirá acceso a la ruta si el usuario_id coincide con el id requerido en la ruta.