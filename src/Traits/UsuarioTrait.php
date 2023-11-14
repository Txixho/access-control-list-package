<?php

namespace Fbaconsulting\Aclpackage2\Traits;

use Fbaconsulting\Aclpackage2\Models\PerfilClientesUsuario;


trait UsuarioTrait
{
    public function perfilesClientesUsuario()
    {
        return $this->hasMany(PerfilClientesUsuario::class, 'usuario_id', 'usuario_id');
    }
}
