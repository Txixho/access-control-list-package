<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait PerfilRutaModelTraitConfigurable
{
    use ConfigurableRelationsTrait;

    public function getObtenerPerfil()
    {
        return $this->belongsTo($this->relatedModels['perfil'] ?? \App\Model\Perfil::class,
            $this->foreignKeys['perfilRutaPerfil'] ?? 'perfil_id',
            $this->localKeys['perfilRuta'] ?? 'perfil_ruta_id');
    }

    public function getObtenerRuta()
    {
        return $this->belongsTo($this->relatedModels['ruta'] ?? \App\Model\Ruta::class,
            $this->foreignKeys['perfilRutaRuta'] ?? 'ruta_id',
            $this->localKeys['perfilRuta'] ?? 'perfil_ruta_id');
    }
}
