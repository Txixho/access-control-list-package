<?php

namespace Fbaconsulting\Aclpackage2\Http\Controllers;

use Fbaconsulting\Aclpackage2\Models\Cliente;
use Fbaconsulting\Aclpackage2\Models\Perfil;
use Fbaconsulting\Aclpackage2\Models\PerfilCliente;
use Fbaconsulting\Aclpackage2\Services\PerfilService;
use Illuminate\Http\Request;


class AdministracionPerfilesClientesController extends Controller
{
    protected $perfilService;

    public function __construct(PerfilService $perfilService)
    {
        $this->perfilService = $perfilService;
    }

    /**
     * Muestra la vista de administración de rutas por perfil.
     *
     * @param Cliente $cliente
     * @param Perfil $perfil
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $clientes = Cliente::all();
        $perfiles = Perfil::all();
        $relaciones = PerfilCliente::all();

        return view('admin.administracion-clientes', compact('relaciones', 'clientes', 'perfiles'));
    }

    public function update(Request $request, PerfilService $PerfilService)
    {
        try {
            $data = $request->input('cliente_perfil', []);

            foreach ($data as $clienteId => $perfilesSeleccionados) {
                $PerfilService->actualizarRelacionesClientePerfil($clienteId, $perfilesSeleccionados);
            }

            return back()->with('success', 'Perfiles de clientes actualizados con éxito.');
        } catch (\Exception $e) {
            return back()->with('error', 'Ocurrió un error durante la actualización de perfiles de clientes.'. $e->getMessage());
        }
    }


}
