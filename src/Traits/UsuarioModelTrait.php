<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

use App\Model\PerfilClienteUsuario;
use App\Model\PerfilCliente;

trait UsuarioModelTrait
{

    // Métodos para obtener relaciones
    public function getPerfilesClientesUsuario()
    {
        return $this->hasMany(PerfilClienteUsuario::class, 'usuario_id', 'usuario_id');
    }

    public function getPerfilCliente()
    {
        return $this->hasOne(PerfilCliente::class, 'usuario_id', 'usuario_id');
    }
}


