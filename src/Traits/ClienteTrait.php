<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

use FbaConsulting\AccessControlListPackage\Models\Perfil;


trait ClienteTrait
{
    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class, 'perfiles_clientes', 'cliente_id', 'perfil_id')
            ->withPivot('nombre_personalizado');
    }
}
