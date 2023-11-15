<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait UsuarioModelTrait
{
    protected $perfilClientesUsuarioModel = \App\Model\PerfilClientesUsuario::class;
    protected $perfilClienteModel = \App\Model\PerfilCliente::class;
    protected $foreignKey = 'usuario_id';
    protected $localKey = 'usuario_id';

    

    // Métodos para obtener relaciones
    public function getPerfilesClientesUsuario()
    {
        return $this->hasMany($this->perfilClientesUsuarioModel, $this->foreignKey, $this->localKey);
    }

    public function getPerfilCliente()
    {
        return $this->hasOne($this->perfilClienteModel, $this->foreignKey, $this->localKey);
    }
}


