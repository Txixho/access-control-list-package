<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait UsuarioModelTrait
{
    protected $perfilClientesUsuarioModel = \App\Model\PerfilClientesUsuario::class;
    protected $perfilClienteModel = \App\Model\PerfilCliente::class;
    protected $foreignKey = 'usuario_id';
    protected $localKey = 'usuario_id';

    // Métodos para cambiar los modelos
    public function setPerfilClientesUsuarioModel($model)
    {
        $this->perfilClientesUsuarioModel = $model;
    }

    public function setPerfilClienteModel($model)
    {
        $this->perfilClienteModel = $model;
    }

    // Métodos para configurar las claves
    public function setForeignKey($foreignKey)
    {
        $this->foreignKey = $foreignKey;
    }

    public function setLocalKey($localKey)
    {
        $this->localKey = $localKey;
    }

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


