<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait UsuarioModelTraitConfigurable
{
    use ConfigurableRelationsTrait;

    public function getPerfilesClientesUsuario()
    {
        return $this->hasMany($this->relatedModels['perfilClienteUsuario'] ?? \App\Model\PerfilClientesUsuario::class,
            $this->foreignKeys['usuarioPerfilClienteUsuario'] ?? 'usuario_id',
            $this->localKeys['usuario'] ?? 'usuario_id');
    }

    public function getPerfilCliente()
    {
        return $this->hasOne($this->relatedModels['perfilCliente'] ?? \App\Model\PerfilCliente::class,
            $this->foreignKeys['usuarioPerfilCliente'] ?? 'usuario_id',
            $this->localKeys['usuario'] ?? 'usuario_id');
    }
}
