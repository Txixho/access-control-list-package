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

El trait utiliza por defecto unos valores para el nombre de la tabla, las claves foráneas y las columnas adicionales de la tabla pivot, pero estos pueden cambiar dinámicamente utilizando:
```php
$cliente->setPivotTable('tabla_pivot_personalizada');
$cliente->setClienteForeignKey('id_cliente_personalizado');
$cliente->setPerfilForeignKey('id_perfil_personalizado');
$cliente->setPivotExtraColumns(['columna_extra1']);
```
Una vez ajustados los valores a tus necesidades o bien utilizando la configuración por defecto del trait podrías obtener las relaciones de la siguiente forma:
```php
$perfiles = $cliente->getObtenerPerfiles()->get();
```