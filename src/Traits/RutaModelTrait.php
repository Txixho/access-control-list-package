<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait RutaModelTrait
{

    protected $rutaPerfilModel = \App\Model\Perfil::class;
    protected  $rutaPerfilPivotTable = 'perfiles_rutas';
    protected $rutaForeignKey = 'ruta_id';
    protected $perfilForeignKey = 'perfil_id';


    // Método para configurar la tabla pivot
    public function setPivotTable($tableName)
    {
        $this->pivotTable = $tableName;
    }


    // Métodos para obtener relaciones
    public function getPerfilesRutas()
    {
        return $this->belongsToMany($this->rutaPerfilModel, $this->rutaPerfilPivotTable, $this->rutaForeignKey, $this->perfilForeignKey);
    }

}