<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

use App\Model\Perfil;
trait RutaModelTrait
{

    // Métodos para obtener relaciones
    public function getPerfilesRutas()
    {
        return $this->belongsToMany(Perfil::class, 'perfiles_rutas', 'ruta_id', 'perfil_id');
    }

}