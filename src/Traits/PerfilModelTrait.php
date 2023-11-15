<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait PerfilModelTrait
{
    protected $clienteModel = \App\Model\Cliente::class;
    protected $rutaModel = \App\Model\Ruta::class;

    protected $pivotTablePerfilCliente = 'perfiles_clientes';
    protected $pivotTablePerfilRuta = 'perfiles_rutas';
    protected $foreignKeyCliente = 'cliente_id';
    protected $foreignKeyRuta = 'ruta_id';
    protected $localKeyPerfil = 'perfil_id';



    // Métodos para configurar las tablas pivot
    public function setPivotTablePerfilCliente($tableName)
    {
        $this->pivotTablePerfilCliente = $tableName;
    }

    public function setPivotTablePerfilRuta($tableName)
    {
        $this->pivotTablePerfilRuta = $tableName;
    }

    // Métodos para obtener relaciones
    public function getObtenerClientes()
    {
        return $this->belongsToMany($this->clienteModel, $this->pivotTablePerfilCliente, $this->localKeyPerfil, $this->foreignKeyCliente);
    }

    public function getObtenerRutas()
    {
        return $this->belongsToMany($this->rutaModel, $this->pivotTablePerfilRuta, $this->localKeyPerfil, $this->foreignKeyRuta);
    }
}

