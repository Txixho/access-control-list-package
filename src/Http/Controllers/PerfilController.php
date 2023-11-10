<?php

namespace Fbaconsulting\Aclpackage2\Http\Controllers;

use Illuminate\Http\Request;
use Fbaconsulting\Aclpackage2\Services\PerfilService;
use Fbaconsulting\Aclpackage2\Services\RutaService;

class PerfilController extends Controller
{

    public function __construct(PerfilService $perfilService, RutaService $rutaService)
    {
        $this->perfilService = $perfilService;
        $this->rutaService = $rutaService;
    }


    public function index()
    {

        $rutas = $this->rutaService->obtenerTodasLasRutas();

        return view('admin.crear-perfil', compact('rutas'));
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|unique:perfiles',
            ]);

            $rutasSeleccionadas = $request->input('rutas', []);

            $this->perfilService->crearPerfilConRutas($request->input('nombre'), $rutasSeleccionadas);

            return redirect()->back()->with('success', 'Perfil creado con éxito.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error al crear el perfil: ' . $e->getMessage());
        }
    }

    public function select() {

        $perfiles = $this->perfilService->obtenerTodosLosPerfiles();

        return view('admin.seleccion-perfil', compact('perfiles'));
    }
}
