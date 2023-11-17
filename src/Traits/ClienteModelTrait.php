<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

use App\Model\Perfil;

trait ClienteModelTrait
{
    // Método para obtener perfiles
    public function getObtenerPerfiles()
    {
        return $this->belongsToMany(Perfil::class, 'perfiles_clientes', 'cliente_id', 'perfil_id')
            ->withPivot('nombre_personalizado');
    }
}


