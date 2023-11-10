<?php

namespace Fbaconsulting\Aclpackage2\Http\Controllers;

use Fbaconsulting\Aclpackage2\Services\UsuarioService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    protected $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function index()
    {
        $usuarioAutenticado = Auth::user();

        $usuarioAutenticadoId = $usuarioAutenticado->usuario_id;

        // Obtener el perfil personalizado del usuario
        $userRole = $this->usuarioService->obtenerPerfilPersonalizado($usuarioAutenticadoId);

        // Obtenemos el cliente al que pertenece el usuario
        $cliente = $this->usuarioService->obtenerClientePorUsuario($usuarioAutenticadoId);

        // Obtener usuarios con el mismo cliente_id que el usuario conectado y autenticado
        $usuarios = $this->usuarioService->obtenerUsuariosPorCliente($cliente);

        return view('dashboard', compact('usuarios', 'usuarioAutenticado', 'userRole'));
    }
}

