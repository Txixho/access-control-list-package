<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

use App\Model\Cliente;
use App\Model\Ruta;

trait PerfilModelTrait
{

    // Métodos para obtener relaciones
    public function getObtenerClientesPerfil()
    {
        return $this->belongsToMany(Cliente::class, 'perfiles_clientes', 'perfil_id', 'cliente_id');
    }

    public function getObtenerRutasPerfil()
    {
        return $this->belongsToMany(Ruta::class, 'perfiles_rutas', 'perfil_id', 'ruta_id');
    }
}

