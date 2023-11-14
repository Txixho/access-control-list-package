<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

use FbaConsulting\AccessControlListPackage\Models\PerfilClientesUsuario;
use FbaConsulting\AccessControlListPackage\Models\PerfilCliente;


trait UsuarioTrait
{
    public function perfilesClientesUsuario()
    {
        return $this->hasMany(PerfilClientesUsuario::class, 'usuario_id', 'usuario_id');
    }

    public function perfilCliente()
    {
        return $this->hasOne(PerfilCliente::class, 'usuario_id', 'usuario_id');
    }

}
