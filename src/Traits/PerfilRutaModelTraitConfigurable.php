<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait PerfilRutaModelTraitConfigurable
{
    use ConfigurableRelationsTrait;

    public function getObtenerPerfil()
    {
        return $this->belongsTo(\App\Model\Perfil::class,
            $this->foreignKeys['perfilRutaPerfil'] ?? 'perfil_id',
            $this->localKeys['perfilRuta'] ?? 'perfil_ruta_id');
    }

    public function getObtenerRuta()
    {
        return $this->belongsTo(\App\Model\Ruta::class,
            $this->foreignKeys['perfilRutaRuta'] ?? 'ruta_id',
            $this->localKeys['perfilRuta'] ?? 'perfil_ruta_id');
    }
}
