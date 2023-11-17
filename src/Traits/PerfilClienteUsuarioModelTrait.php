<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

use App\Model\Cliente;
use App\Model\Usuario;

trait PerfilClienteUsuarioModelTrait
{

    // Métodos para obtener relaciones
    public function getObenerPerfilCliente()
    {
        return $this->belongsTo(Cliente::class, 'perfil_cliente_id', 'perfil_cliente_usuario_id');
    }

    public function getObtenerUsuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'perfil_cliente_usuario_id');
    }
}
