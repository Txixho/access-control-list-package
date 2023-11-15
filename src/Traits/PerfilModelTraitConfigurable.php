<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait PerfilModelTraitConfigurable
{
    use ConfigurableRelationsTrait;

    public function getObtenerClientes()
    {

        return $this->belongsToMany(\App\Model\Cliente::class,
            $this->pivotTables['perfilCliente'] ?? 'perfiles_clientes',
            $this->localKeys['perfil'] ?? 'perfil_id',
            $this->foreignKeys['cliente'] ?? 'cliente_id');
    }

    public function getObtenerRutas()
    {

        return $this->belongsToMany(\App\Model\Ruta::class,
            $this->pivotTables['perfilRuta'] ?? 'perfiles_rutas',
            $this->localKeys['perfil'] ?? 'perfil_id',
            $this->foreignKeys['ruta'] ?? 'ruta_id');
    }

}
