<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait UsuarioModelTraitConfigurable
{
    use ConfigurableRelationsTrait;

    public function getPerfilesClientesUsuario()
    {
        return $this->hasMany(\App\Model\PerfilClientesUsuario::class,
            $this->foreignKeys['usuarioPerfilClienteUsuario'] ?? 'usuario_id',
            $this->localKeys['usuario'] ?? 'usuario_id');
    }

    public function getPerfilCliente()
    {
        return $this->hasOne(\App\Model\PerfilCliente::class,
            $this->foreignKeys['usuarioPerfilCliente'] ?? 'usuario_id',
            $this->localKeys['usuario'] ?? 'usuario_id');
    }
}
