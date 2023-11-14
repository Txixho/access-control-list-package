<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait ClienteModelTrait
{
    protected $perfilModel = \App\Model\Perfil::class;
    protected $pivotTable = 'perfiles_clientes';
    protected $clienteForeignKey = 'cliente_id';
    protected $perfilForeignKey = 'perfil_id';
    protected $pivotExtraColumns = ['nombre_personalizado'];

    // Método para cambiar el modelo de perfil
    public function setPerfilModel($model)
    {
        $this->perfilModel = $model;
    }

    // Método para configurar la tabla pivot
    public function setPivotTable($tableName)
    {
        $this->pivotTable = $tableName;
    }

    // Métodos para configurar las claves foráneas
    public function setClienteForeignKey($foreignKey)
    {
        $this->clienteForeignKey = $foreignKey;
    }

    public function setPerfilForeignKey($foreignKey)
    {
        $this->perfilForeignKey = $foreignKey;
    }

    // Método para configurar columnas adicionales en la tabla pivot
    public function setPivotExtraColumns(array $columns)
    {
        $this->pivotExtraColumns = $columns;
    }

    // Método para obtener perfiles
    public function getObtenerPerfiles()
    {
        return $this->belongsToMany($this->perfilModel, $this->pivotTable, $this->clienteForeignKey, $this->perfilForeignKey)
            ->withPivot($this->pivotExtraColumns);
    }
}


