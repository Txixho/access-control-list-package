<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

use App\Model\PerfilClienteUsuario;
use App\Model\Perfil;

trait PerfilClienteModelTrait
{

    // Métodos para obtener relaciones
    public function getObtenerPerfilesClientesUsuario()
    {
        return $this->hasMany(PerfilClienteUsuario::class, 'perfil_cliente_id', 'perfil_cliente_id');
    }

    public function getObtenerPerfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }
}
