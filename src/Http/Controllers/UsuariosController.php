<?php

namespace Fbaconsulting\Aclpackage2\Http\Controllers;

use Fbaconsulting\Aclpackage2\Models\Usuario;
use Fbaconsulting\Aclpackage2\Services\UsuarioService;

class UsuariosController extends Controller
{
    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function edit($id)
    {
        $editedUser = $this->usuarioService->obtenerUsuarioPorId($id);
        return view('edit', ['usuario' => $editedUser]);
    }

    //todo habría que adaptar create y store de users

    public function create()
    {
        return view('admin.crear-usuario');
    }

}

