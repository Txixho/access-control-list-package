<?php

namespace Fbaconsulting\Aclpackage2\Http\Controllers;

use Fbaconsulting\Aclpackage2\Models\PerfilCliente;
use Illuminate\Http\Request;
use Fbaconsulting\Aclpackage2\Services\PerfilService;

class AdministracionPerfilesController
{

    public function __construct(PerfilService $perfilService)
    {
        $this->perfilService = $perfilService;
    }

    public function index()
    {
        $usuario = auth()->user();
        $cliente = $usuario->cliente_id;
        $perfilesCliente = $this->perfilService->obtenerPerfilesPorCliente($cliente);

        return view('admin.administracion-perfiles', compact('perfilesCliente'));
    }

    public function actualizarPerfil(Request $request, $perfil_cliente_id)
    {
        try {
            $request->validate([
                'nombre_personalizado' => 'required|string',
            ]);

            $this->perfilService->actualizarNombrePersonalizado($perfil_cliente_id, $request->input('nombre_personalizado'));

            return redirect()->back()->with('success', 'Nombre personalizado actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hubo un error al actualizar el nombre personalizado.' . $e->getMessage());
        }
    }


}
