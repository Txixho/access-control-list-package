<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait PerfilClienteUsuarioModelTraitConfigurable
{
    use ConfigurableRelationsTrait;

    public function getObenerPerfilCliente()
    {
        return $this->belongsTo($this->relatedModels['perfilCliente'] ?? \App\Model\Cliente::class,
            $this->foreignKeys['perfilClienteUsuarioPerfilCliente'] ?? 'perfil_cliente_id',
            $this->localKeys['perfilClienteUsuario'] ?? 'perfil_cliente_usuario_id');
    }

    public function getObtenerUsuario()
    {
        return $this->belongsTo($this->relatedModels['usuario'] ?? \App\Model\Usuario::class,
            $this->foreignKeys['perfilClienteUsuarioUsuario'] ?? 'usuario_id',
            $this->localKeys['perfilClienteUsuario'] ?? 'perfil_cliente_usuario_id');
    }
}
