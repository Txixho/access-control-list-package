<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait ClienteModelTraitConfigurable
{
    use ConfigurableRelationsTrait;

    public function getObtenerPerfiles()
    {
        return $this->belongsToMany(\App\Model\Perfil::class,
            $this->pivotTables['clientePerfil'] ?? 'perfiles_clientes',
            $this->localKeys['cliente'] ?? 'cliente_id',
            $this->foreignKeys['perfil'] ?? 'perfil_id')
            ->withPivot($this->pivotExtraColumns['clientePerfil'] ?? ['nombre_personalizado']);
    }
}
