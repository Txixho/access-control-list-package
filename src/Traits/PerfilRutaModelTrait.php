<?php

namespace FbaConsulting\AccessControlListPackage\Traits;


trait PerfilRutaModelTrait
{
    protected $perfilModel = \App\Model\Perfil::class;
    protected $rutaModel = \App\Model\Ruta::class;

    protected $perfilForeignKey = 'perfil_id';
    protected $rutaForeignKey = 'ruta_id';
    protected $localKey = 'perfil_ruta_id';

    // Métodos para cambiar los modelos
    public function setPerfilModel($model)
    {
        $this->perfilModel = $model;
    }

    public function setRutaModel($model)
    {
        $this->rutaModel = $model;
    }

    // Métodos para configurar las claves foráneas y la clave local
    public function setPerfilForeignKey($foreignKey)
    {
        $this->perfilForeignKey = $foreignKey;
    }

    public function setRutaForeignKey($foreignKey)
    {
        $this->rutaForeignKey = $foreignKey;
    }

    public function setLocalKey($localKey)
    {
        $this->localKey = $localKey;
    }

    // Métodos para obtener relaciones
    public function getObtenerPerfil()
    {
        return $this->belongsTo($this->perfilModel, $this->perfilForeignKey, $this->localKey);
    }

    public function getObtenerRuta()
    {
        return $this->belongsTo($this->rutaModel, $this->rutaForeignKey, $this->localKey);
    }
}
