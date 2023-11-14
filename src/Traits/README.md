# Uso de los Traits


## Implementación en un Modelo

Primero, asegúrate de que tu modelo (por ejemplo, `Cliente`) esté utilizando el trait, en este caso `ClienteModelTrait`:

```php
namespace App\Models;

use FbaConsulting\AccessControlListPackage\Traits\ClienteModelTrait;

class Cliente extends Model
{
    use ClienteModelTrait;

    // Resto de la definición del modelo...
}
```
Este trait por defecto utiliza el modelo `Perfil`, pero puedes cambiar dinámicamente el modelo con el que se relaciona utilizando:
```php
$cliente = new Cliente();
$cliente->setPerfilModel(PerfilPersonalizado:class);
```
A continuación podrías usar:
```php
$perfiles = $cliente->getObtenerPerfiles()->get();
```
El trait utiliza por defecto unos valores