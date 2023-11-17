<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

use App\Model\Perfil;
use App\Model\Ruta;

trait PerfilRutaModelTrait
{

    // Métodos para obtener relaciones
    public function getObtenerPerfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id', 'perfil_ruta_id');
    }

    public function getObtenerRuta()
    {
        return $this->belongsTo(Ruta::class, 'ruta_id', 'perfil_ruta_id');
    }
}
