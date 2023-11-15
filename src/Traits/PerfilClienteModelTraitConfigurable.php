<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait PerfilClienteModelTraitConfigurable
{
    use ConfigurableRelationsTrait;

    public function getObtenerPerfilesClientesUsuario()
    {
        return $this->hasMany(\App\Model\PerfilClienteUsuario::class,
            $this->foreignKeys['perfilClientePerfilClienteUsuario'] ?? 'perfil_cliente_id',
            $this->localKeys['perfilCliente'] ?? 'perfil_cliente_id');
    }

    public function getObtenerPerfil()
    {
        return $this->belongsTo($this->relatedModels['perfil'] ?? \App\Model\Perfil::class,
            $this->foreignKeys['perfilClientePerfil'] ?? 'perfil_id',
            $this->localKeys['perfilCliente'] ?? 'perfil_cliente_id');
    }
}
