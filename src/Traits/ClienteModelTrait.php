<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait ClienteModelTrait
{
    protected $perfilModel = \App\Model\Perfil::class;
    protected $pivotTable = 'perfiles_clientes';
    protected $modelForeignKey = 'cliente_id';
    protected $relatedModelForeignKey = 'perfil_id';
    protected $pivotExtraColumns = ['nombre_personalizado'];


    // Método para configurar la tabla pivot
    public function setPivotTable($tableName)
    {
        $this->pivotTable = $tableName;
    }


    // Método para obtener perfiles
    public function getObtenerPerfiles()
    {
        return $this->belongsToMany($this->perfilModel, $this->pivotTable, $this->modelForeignKey, $this->relatedModelForeignKey)
            ->withPivot($this->pivotExtraColumns);
    }
}


