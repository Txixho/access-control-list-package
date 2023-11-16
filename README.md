# Users Access Control List (ACL) Package

Este paquete proporciona una manera sencilla de añadir control de acceso basado en perfiles a tu aplicación Laravel.

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
composer require fbaconsulting/access-control-list-package
```
Este comando descargará e instalará el paquete en tu proyecto.

## Modelos Requeridos y Estructura de Base de Datos
Para integrar correctamente el paquete AccessControlList en tu proyecto Laravel, es necesario que tu aplicación incluya los siguientes modelos, los cuales deben estar asociados con estructuras específicas de base de datos. A continuación se detallan los modelos y su estructura mínima:

### Modelo Cliente
Representa a los clientes en tu aplicación. La asociación de los distintos perfiles se hace contra este modelo.

```php
class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'cliente_id';
}

```
### Modelo Perfil
El modelo Perfil representa los perfiles de usuarios dentro de la aplicación.

```php
class Perfil extends Model
{
    protected $table = 'perfiles';
    protected $primaryKey = 'perfil_id';
    protected $fillable = ['nombre', 'descripcion', 'habilitado'];
}
```
### Modelo Usuario
El modelo estándar de usuario, extendiendo la clase User de Laravel.

```php
class Usuario extends User
{
    use Notifiable;
    protected $table = "usuarios";
    protected $primaryKey = 'usuario_id';
}
```
### Modelo Ruta
Representa las rutas en tu aplicación. 

```php
class Ruta extends Model
{
    protected $table = 'rutas';
    protected $primaryKey = 'ruta_id';
    protected $fillable = ['path', 'descripcion'];
}
```
*Nota: Aunque el campo se llame `path` lo que se almacena es el nombre de la ruta.

### Modelo PerfilCliente
Este modelo se utiliza para gestionar la relación entre perfiles y clientes. 

```php
class PerfilCliente extends Model
{
    protected $table = 'perfiles_clientes';
    protected $primaryKey = 'perfil_cliente_id';
    protected $fillable = ['cliente_id', 'perfil_id', 'nombre_personalizado'];
}
```

### Modelo PerfilClientesUsuario
Relaciona los perfiles de clientes con usuarios específicos.

```php
class PerfilClientesUsuario extends Model
{
    protected $table = 'perfiles_clientes_usuarios';
    protected $primaryKey = 'perfil_cliente_usuario_id';
    protected $fillable = ['usuario_id', 'perfil_cliente_id'];
}
```
### Modelo PerfilRutas
Gestiona la relación entre perfiles y rutas accesibles.

```php
class PerfilRutas extends Model
{
    protected $table = 'perfiles_rutas';
    protected $primaryKey = 'perfil_ruta_id';
    public $timestamps = false;
    protected $fillable = ['perfil_id', 'ruta_id', 'habilitado'];
}
```

### Uso
