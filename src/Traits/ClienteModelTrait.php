<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait ClienteModelTrait
{
    protected $perfilModel = \FbaConsulting\AccessControlListPackage\Models\Perfil::class;

    public function setPerfilModel($model)
    {
        $this->perfilModel = $model;
    }

    public function perfiles()
    {
        return $this->belongsToMany($this->perfilModel, 'perfiles_clientes', 'cliente_id', 'perfil_id')
            ->withPivot('nombre_personalizado');
    }
}
