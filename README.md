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
composer require fbaconsulting/access-control-list-package
```
Este comando descargará e instalará el paquete en tu proyecto.


### Paso 3: Integrar Traits en los Modelos 
En cada modelo agrega su trait:

```
use FbaConsulting\AccessControlListPackage\Traits\EjemploTrait;

class Usuario extends Authenticatable {
    use EjemploTrait;
    // Resto del modelo...
}
```

### Uso
