<?php

namespace FbaConsulting\AccessControlListPackage\Traits;

trait PerfilClienteUsuarioModelTrait
{
    protected $perfilClienteModel = \App\Model\Cliente::class;
    protected $usuarioModel = \App\Model\Usuario::class;

    protected $perfilClienteForeignKey = 'perfil_cliente_id';
    protected $usuarioForeignKey = 'usuario_id';
    protected $localKey = 'perfil_cliente_usuario_id';


    // Métodos para obtener relaciones
    public function getObenerPerfilCliente()
    {
        return $this->belongsTo($this->perfilClienteModel, $this->perfilClienteForeignKey, $this->localKey);
    }

    public function getObtenerUsuario()
    {
        return $this->belongsTo($this->usuarioModel, $this->usuarioForeignKey, $this->localKey);
    }
}
