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

    // Métodos para configurar las claves foráneas
    public function setModelForeignKey($foreignKey)
    {
        $this->modelForeignKey = $foreignKey;
    }

    public function setRelatedModelForeignKey($foreignKey)
    {
        $this->relatedModelForeignKey = $foreignKey;
    }

    // Método para configurar columnas adicionales en la tabla pivot
    public function setPivotExtraColumns(array $columns)
    {
        $this->pivotExtraColumns = $columns;
    }

    // Método para obtener perfiles
    public function getObtenerPerfiles()
    {
        return $this->belongsToMany($this->perfilModel, $this->pivotTable, $this->modelForeignKey, $this->relatedModelForeignKey)
            ->withPivot($this->pivotExtraColumns);
    }
}


