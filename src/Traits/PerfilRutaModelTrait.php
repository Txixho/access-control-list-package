<?php

namespace FbaConsulting\AccessControlListPackage\Traits;


trait PerfilRutaModelTrait
{
    protected $perfilModel = \App\Model\Perfil::class;
    protected $rutaModel = \App\Model\Ruta::class;
    protected $perfilForeignKey = 'perfil_id';
    protected $rutaForeignKey = 'ruta_id';
    protected $localKey = 'perfil_ruta_id';



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
