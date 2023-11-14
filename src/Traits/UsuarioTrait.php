<?php

namespace Fbaconsulting\Aclpackage2\Traits;

use Fbaconsulting\Aclpackage2\Models\PerfilClientesUsuario;
use Fbaconsulting\Aclpackage2\Models\PerfilCliente;


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
