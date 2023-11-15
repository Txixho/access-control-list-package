<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait PerfilModelTraitConfigurable
{
    use ConfigurableRelationsTrait;

    public function getObtenerClientes()
    {
        // Configuración específica de la relación "clientes" para "Perfil"
        return $this->belongsToMany($this->relatedModels['cliente'] ?? \App\Model\Cliente::class,
            $this->pivotTables['perfilCliente'] ?? 'perfiles_clientes',
            $this->localKeys['perfil'] ?? 'perfil_id',
            $this->foreignKeys['cliente'] ?? 'cliente_id');
    }

    public function getObtenerRutas()
    {
        // Configuración específica de la relación "rutas" para "Perfil"
        return $this->belongsToMany($this->relatedModels['ruta'] ?? \App\Model\Ruta::class,
            $this->pivotTables['perfilRuta'] ?? 'perfiles_rutas',
            $this->localKeys['perfil'] ?? 'perfil_id',
            $this->foreignKeys['ruta'] ?? 'ruta_id');
    }
    
}
