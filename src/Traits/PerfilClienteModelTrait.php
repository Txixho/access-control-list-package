<?php

namespace FbaConsulting\AccessControlListPackage\Traits;


trait PerfilClienteTrait
{
    protected $perfilClienteUsuarioModel = \App\Model\PerfilClienteUsuario::class;
    protected $perfilModel = \App\Model\Perfil::class;

    protected $perfilClienteForeignKey = 'perfil_cliente_id';
    protected $perfilForeignKey = 'perfil_id';

    // Métodos para cambiar los modelos
    public function setPerfilClienteUsuarioModel($model)
    {
        $this->perfilClienteUsuarioModel = $model;
    }

    public function setPerfilModel($model)
    {
        $this->perfilModel = $model;
    }

    // Métodos para configurar las claves foráneas
    public function setPerfilClienteForeignKey($foreignKey)
    {
        $this->perfilClienteForeignKey = $foreignKey;
    }

    public function setPerfilForeignKey($foreignKey)
    {
        $this->perfilForeignKey = $foreignKey;
    }

    // Métodos para obtener relaciones
    public function getObtenerPerfilesClientesUsuario()
    {
        return $this->hasMany($this->perfilClienteUsuarioModel, $this->perfilClienteForeignKey, $this->getKeyName());
    }

    public function getObtenerPerfil()
    {
        return $this->belongsTo($this->perfilModel, $this->perfilForeignKey);
    }
}
