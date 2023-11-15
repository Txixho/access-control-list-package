<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait UsuarioModelTrait
{
    protected $perfilClientesUsuarioModel = \App\Model\PerfilClientesUsuario::class;
    protected $perfilClienteModel = \App\Model\PerfilCliente::class;
    protected $usuarioForeignKey = 'usuario_id';

    // Métodos para cambiar los modelos
    public function setPerfilClientesUsuarioModel($model)
    {
        $this->perfilClientesUsuarioModel = $model;
    }

    public function setPerfilClienteModel($model)
    {
        $this->perfilClienteModel = $model;
    }

    // Método para cambiar la clave foránea
    public function setUsuarioForeignKey($foreignKey)
    {
        $this->usuarioForeignKey = $foreignKey;
    }

    // Métodos para obtener relaciones
    public function getPerfilesClientesUsuario()
    {
        return $this->hasMany($this->perfilClientesUsuarioModel, 'usuario_id', $this->usuarioForeignKey);
    }

    public function getPerfilCliente()
    {
        return $this->hasOne($this->perfilClienteModel, 'usuario_id', $this->usuarioForeignKey);
    }
}

