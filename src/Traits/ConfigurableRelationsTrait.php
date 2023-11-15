<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait ConfigurableRelationsTrait
{

    protected $foreignKeys = [];
    protected $localKeys = [];
    protected $pivotTables = [];
    protected $pivotExtraColumns = [];


    public function setForeignKey($relationName, $foreignKey)
    {
        $this->foreignKeys[$relationName] = $foreignKey;
    }

    public function setLocalKey($relationName, $localKey)
    {
        $this->localKeys[$relationName] = $localKey;
    }

    public function setPivotTable($relationName, $tableName)
    {
        $this->pivotTables[$relationName] = $tableName;
    }

    public function setPivotExtraColumns($relationName, array $columns)
    {
        $this->pivotExtraColumns[$relationName] = $columns;
    }

}
