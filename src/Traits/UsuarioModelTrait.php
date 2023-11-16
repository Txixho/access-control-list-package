<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait UsuarioModelTrait
{
    protected $perfilClienteUsuarioModel = \App\Model\PerfilClienteUsuario::class;
    protected $perfilClienteModel = \App\Model\PerfilCliente::class;
    protected $foreignKey = 'usuario_id';
    protected $localKey = 'usuario_id';

    

    // Métodos para obtener relaciones
    public function getPerfilesClientesUsuario()
    {
        return $this->hasMany($this->perfilClienteUsuarioModel, $this->foreignKey, $this->localKey);
    }

    public function getPerfilCliente()
    {
        return $this->hasOne($this->perfilClienteModel, $this->foreignKey, $this->localKey);
    }
}


