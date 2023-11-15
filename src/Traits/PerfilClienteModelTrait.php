<?php

namespace FbaConsulting\AccessControlListPackage\Traits;


trait PerfilClienteModelTrait
{
    protected $perfilClienteUsuarioModel = \App\Model\PerfilClienteUsuario::class;
    protected $perfilModel = \App\Model\Perfil::class;

    protected $perfilClienteForeignKey = 'perfil_cliente_id';
    protected $perfilForeignKey = 'perfil_id';

    protected $localKey = 'perfil_cliente_id';


    public function setPerfilModel($model)
    {
        $this->perfilModel = $model;
    }

    // Métodos para configurar las claves foráneas y la clave local
    public function setPerfilClienteForeignKey($foreignKey)
    {
        $this->perfilClienteForeignKey = $foreignKey;
    }

    public function setPerfilForeignKey($foreignKey)
    {
        $this->perfilForeignKey = $foreignKey;
    }

    public function setLocalKey($localKey)
    {
        $this->localKey = $localKey;
    }

    // Métodos para obtener relaciones
    public function getObtenerPerfilesClientesUsuario()
    {
        return $this->hasMany($this->perfilClienteUsuarioModel, $this->perfilClienteForeignKey, $this->localKey);
    }

    public function getObtenerPerfil()
    {
        return $this->belongsTo($this->perfilModel, $this->perfilForeignKey);
    }
}
