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
Para integrar correctamente este paquete en tu proyecto Laravel, es necesario que tu aplicación incluya los siguientes modelos, los cuales deben estar asociados con estructuras específicas de base de datos. A continuación se detallan los modelos y su estructura mínima:

### Modelo Cliente
Representa a los clientes en tu aplicación. La asociación de los distintos perfiles se hace con este modelo.

```php
class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'cliente_id';
    protected $fillable = ['nombre'];
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
    protected $fillable = ['cliente_id', 'login', 'email', 'nombre', 'apellidos'];
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

### Modelo PerfilClienteUsuario
Relaciona los perfiles de clientes con usuarios específicos.

```php
class PerfilClienteUsuario extends Model
{
    protected $table = 'perfiles_clientes_usuarios';
    protected $primaryKey = 'perfil_cliente_usuario_id';
    protected $fillable = ['usuario_id', 'perfil_cliente_id'];
}
```
### Modelo PerfilRuta
Gestiona la relación entre perfiles y rutas accesibles.

```php
class PerfilRuta extends Model
{
    protected $table = 'perfiles_rutas';
    protected $primaryKey = 'perfil_ruta_id';
    public $timestamps = false;
    protected $fillable = ['perfil_id', 'ruta_id', 'habilitado'];
}
```
## Traits
Este paquete proporciona una serie de traits que facilitan la gestión de relaciones entre los diferentes modelos. A continuación se detalla cada uno de estos traits y cómo pueden ser integrados en tus modelos.

### ClienteModelTrait
Este trait se utiliza para gestionar las relaciones entre el modelo Cliente y otros modelos relacionados con los perfiles.

-Método `getObtenerPerfiles()`: Devuelve una colección de perfiles asociados con el cliente. Utiliza la relación belongsToMany para conectar con el modelo Perfil.

-Configuración de Tabla Pivot: Puedes configurar el nombre de la tabla pivot que conecta clientes con perfiles usando el método `setPivotTable()`.
```php
use FbaConsulting\AccessControlListPackage\Traits\ClienteModelTrait;

class Cliente extends Model
{
    use ClienteModelTrait;

    // Resto del modelo...
}
```
### PerfilModelTrait
Este trait se enfoca en las relaciones del modelo Perfil.

-Métodos `getObtenerClientes()` y `getObtenerRutas()`: Permiten acceder a los clientes y rutas relacionadas con un perfil.

-Configuración de Tabla Pivot: Puedes configurar los nombres de las tablas pivot que conectan con perfiles usando los métodos `setPivotTablePerfilCliente()` y `setPivotTablePerfilRuta()`.
```php
use FbaConsulting\AccessControlListPackage\Traits\PerfilModelTrait;

class Perfil extends Model
{
    use PerfilModelTrait;

    // Resto del modelo...
}
```
### UsuarioModelTrait
Este trait está diseñado para ser utilizado con el modelo Usuario y facilita la gestión de sus relaciones con los modelos PerfilClienteUsuario y PerfilCliente.

-Método `getPerfilesClientesUsuario()`: Devuelve todas las instancias de PerfilClienteUsuario asociadas con un usuario particular. Utiliza la relación hasMany para conectar el usuario con múltiples perfiles de clientes.

-Método `getPerfilCliente()`: Proporciona acceso a la instancia única de PerfilCliente asociada con el usuario. Utiliza la relación hasOne.
```php
use FbaConsulting\AccessControlListPackage\Traits\UsuarioModelTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use UsuarioModelTrait;

    // Resto del modelo...
}
```
### PerfilClienteModelTrait
Este trait se usa para definir las relaciones del modelo PerfilCliente.

Métodos de Relación: Incluye `getObtenerPerfilesClientesUsuario()` para obtener los usuarios asociados con un perfil de cliente y `getObtenerPerfil()` para obtener el perfil relacionado.
```php
use FbaConsulting\AccessControlListPackage\Traits\PerfilClienteModelTrait;

class PerfilCliente extends Model
{
    use PerfilClienteModelTrait;

    // Resto del modelo...
}
```
### PerfilClienteUsuarioModelTrait
Facilita la gestión de las relaciones entre los modelos PerfilCliente y Usuario.

Métodos `getObenerPerfilCliente()` y `getObtenerUsuario()`: Proporcionan accesos a la instancia de Cliente y Usuario relacionados, respectivamente.
```php
use FbaConsulting\AccessControlListPackage\Traits\PerfilClienteUsuarioModelTrait;

class PerfilClienteUsuario extends Model
{
    use PerfilClienteUsuarioModelTrait;

    // Resto del modelo...
}
```
### PerfilRutaModelTrait
Se utiliza para las relaciones del modelo PerfilRuta.

Métodos `getObtenerPerfil()` y `getObtenerRuta()`: Ofrecen una forma de acceder al perfil y a la ruta asociada en el modelo PerfilRuta.
```php
use FbaConsulting\AccessControlListPackage\Traits\PerfilRutaModelTrait;

class PerfilRuta extends Model
{
    use PerfilRutaModelTrait;

    // Resto del modelo...
}
```
#### Utilidad
La implementación de estos modelos y traits permitirían crear middlewares en base a la relaciones de estos modelos. Un ejemplo sería:
```php
<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\PerfilRutas;


class ComprobarAccesoRuta
{
    
    public function handle($request, Closure $next)
    {
        // Obtener el nombre de la ruta actual
        $routeName = $request->route()->getName();
        $user = $request->user();

        if (!$user) {
            return redirect('login');
        }

        // Obtener el perfil asociado al usuario donde habilitado sea igual a 1
        $perfilClienteUsuario = $user->getPerfilesClientesUsuario->first(function ($perfil) {
            return $perfil->habilitado === 1;
        });


        if (!$perfilClienteUsuario) {
            abort(403, 'El usuario no tiene un perfil asociado.');
        }

        // Obtener el perfil_cliente_id desde el objeto PerfilClientesUsuario
        $perfilClienteId = $perfilClienteUsuario->perfil_cliente_id;


        if (!$perfilClienteId) {
            abort(403, 'El usuario no tiene un perfil asociado.',);
        }

        // Obtener las rutas asociadas a ese perfil a través de la tabla perfiles_rutas
        $rutasAsociadas = PerfilRuta::where('perfil_id', $perfilClienteId)
            ->where('habilitado', 1)
            ->get();


        // Verificar si la ruta actual está en las rutas asociadas al perfil
        if (!$rutasAsociadas->isEmpty()) {
            $rutaActualExiste = $rutasAsociadas->contains(function ($perfilRuta) use ($routeName) {
                return $perfilRuta->ruta->path === $routeName;
            });

            if (!$rutaActualExiste) {
                abort(403, 'No tienes acceso a esta página.');
            }
        } else {
            abort(403, 'No hay rutas asociadas al perfil.');
        }

        return $next($request);
        
    }

}
```

## Servicios
Este paquete incluye varios servicios que facilitan la gestión de perfiles, rutas y usuarios. A continuación, se describe cada servicio y sus métodos principales:

### PerfilService
Este servicio ofrece funcionalidades para gestionar perfiles y sus relaciones con clientes y usuarios.

Métodos Disponibles:

-`obtenerPerfilesPorCliente($clienteId)`: Obtiene todos los perfiles asociados a un cliente específico. Parámetro: $clienteId - El ID del cliente.

-`obtenerTodosLosPerfiles()`: Devuelve todos los perfiles disponibles.

-`obtenerNombresPerfiles($perfilIds)`: Obtiene los nombres personalizados de un conjunto de perfiles. Parámetro: $perfilIds - Array de IDs de perfil.

-`obtenerPerfilesUsuarios($usuariosIds)`: Retorna los perfiles asociados a una lista de usuarios. Parámetro: $usuariosIds - Array de IDs de usuario.

-`obtenerPerfilHabilitadoPorUsuario($usuarios, $PerfilClienteUsuarios)`: Encuentra el perfil habilitado para un conjunto de usuarios. Parámetros:
$usuarios - Array o colección de objetos de usuario.
$PerfilClienteUsuarios - Colección de objetos PerfilClienteUsuario.

-`deshabilitarPerfilesParaUsuario($usuarioId)`: Deshabilita todos los perfiles asociados a un usuario. Parámetro: $usuarioId - El ID del usuario.

-`habilitarPerfilParaUsuario($usuarioId, $perfilId)`: Habilita un perfil específico para un usuario. Parámetros:
$usuarioId - El ID del usuario.
$perfilId - El ID del perfil a habilitar.

-`crearPerfilConRutas($nombre, $rutasSeleccionadas)`: Crea un nuevo perfil y asocia rutas seleccionadas. Parámetros:
$nombre - Nombre del nuevo perfil.
$rutasSeleccionadas - Array de IDs de ruta a asociar.

-`actualizarRelacionesClientePerfil($clienteId, $perfilesSeleccionados)`: Actualiza las relaciones entre clientes y perfiles. Parámetros:
$clienteId - El ID del cliente.
$perfilesSeleccionados - Array de IDs de perfil seleccionados.

-`actualizarNombrePersonalizado($perfilClienteId, $nombrePersonalizado)`: Actualiza el nombre personalizado de un perfil cliente. Parámetros:
$perfilClienteId - El ID del perfil cliente.
$nombrePersonalizado - El nuevo nombre personalizado.

### RutaService
Este servicio gestiona las rutas de la aplicación.

Métodos Disponibles:

-`obtenerTodasLasRutas()`: Retorna todas las rutas registradas.

-`obtenerRutasHabilitadasParaPerfil(Perfil $perfil)`: Devuelve las rutas habilitadas para un perfil específico. Parámetro: $perfil - Objeto del modelo Perfil.

-`actualizarRutasAsociadas(Perfil $perfil, array $rutasSeleccionadas)`: Actualiza las rutas asociadas a un perfil. Parámetros:
$perfil - Objeto del modelo Perfil.
$rutasSeleccionadas - Array de IDs de ruta seleccionadas.

-`obtenerRutasAplicacion()`: Obtiene todas las rutas de la aplicación.

-`obtenerRutasTabla()`: Recupera las rutas desde la tabla de rutas.

-`almacenarRutas()`: Almacena las rutas en la base de datos.

### UsuarioService
Este servicio facilita la gestión de usuarios y sus perfiles.

Métodos Disponibles:

-`obtenerClientePorUsuario($usuarioId)`: Encuentra el cliente asociado a un usuario. Parámetro: $usuarioId - El ID del usuario.

-`obtenerUsuariosPorCliente($clienteId)`: Obtiene todos los usuarios asociados a un cliente. Parámetro: $clienteId - El ID del cliente.

-`obtenerUsuarioPorId($id)`: Recupera un usuario específico por su ID. Parámetro: $id - El ID del usuario.

-`obtenerPerfilPersonalizado($usuarioId)`: Obtiene el nombre personalizado del perfil de un usuario. Parámetro: $usuarioId - El ID del usuario.

#### Uso de los servicios
Estos servicios pueden ser utilizados en los controladores de tu aplicación para realizar diversas operaciones relacionadas con perfiles, rutas y usuarios. Por ejemplo, podrías crear un controlador que tenga métodos para mostrar todas las rutas asociadas a un perfil en una vista y poder actualizarlas desde la propia vista:
```php
<?php

namespace App\Http\Controllers;

use App\Model\Perfil;
use FbaConsulting\AccessControlListPackage\Services\RutaService;
use Illuminate\Http\Request;

class PerfilRutaController extends Controller
{

    public function __construct(RutaService $rutaService)
    {
        $this->rutaService = $rutaService;
    }

    public function index(Perfil $perfil)
    {
        $perfilRutas = $this->rutaService->obtenerRutasHabilitadasParaPerfil($perfil);
        $rutas = $this->rutaService->obtenerTodasLasRutas();

        return view('ejemplo.vista', compact('perfil', 'rutas', 'perfilRutas'));
    }

    public function update(Request $request, Perfil $perfil)
    {
        try {
            $this->rutaService->actualizarRutasAsociadas($perfil, $request->input('rutas', []));
            return redirect()->back()->with('success', 'Rutas actualizadas con éxito.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error al actualizar las rutas: ' . $e->getMessage());
        }
    }
    
}
```
```php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Administración de Rutas para el Perfil: {{ $perfil->nombre }}</h1>
        <div style="position: absolute; top: 5px; right: 10px;">
            <a href="{{ route('tu-ruta-al-dashboard') }}">Volver a Dashboard</a>
        </div>
        <div style="position: absolute; top: 30px; right: 10px;">
            <a href="{{ route('tu-ruta-a-la-seleccion-de-perfil') }}">Atrás</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulario para actualizar las rutas asociadas al perfil -->
        <form method="post" action="{{ route('tu-ruta-al-metodo-update', $perfil->perfil_id) }}">
            @csrf
            @method('PUT')

            <!-- Lista de todas las rutas -->
            <ul class="list-group">
                @foreach($rutas as $ruta)
                    <li class="list-group-item">
                        <div class="row">
                            <!-- Columna para mostrar la ruta -->
                            <div class="col-md-6">
                                {{ $ruta->path }}
                            </div>

                            <!-- Columna para el checkbox -->
                            <div class="col-md-6">
                                <div class="form-check float-right">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        name="rutas[]"
                                        value="{{ $ruta->ruta_id }}"
                                        {{ in_array($ruta->ruta_id, $perfilRutas) ? 'checked' : '' }}
                                    >
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <button type="submit" class="btn btn-primary mt-4">Actualizar Rutas</button>
        </form>
    </div>
@endsection
```
Con las herramientas presentes en el paquete podrías implementar muchas utilidades distintas. Algunos ejemplos:

- Un sistema para detectar y almacenar directamente todas las rutas de la aplicación en una tabla que tenga la estructura del modelo Ruta.

- Un sistema para la creación de perfiles, desde el cual se puedan asignar las rutas a las que tiene acceso.

- Un sistema para la administración de las rutas a las que tienen acceso los perfiles.

- Un sistema para la administración de los perfiles que pueden asignar los clientes a sus usuarios.

- Un sistema para que los clientes asignen perfiles a sus usuarios.

- Un sistema para que los clientes puedan personalizar el nombre de los perfiles que tienen asignados.