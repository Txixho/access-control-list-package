@extends('layouts.app')

@section('content')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 5px;
            border: 1px solid #ddd;
        }

        .radio-label {
            margin-right: 100px;
        }
    </style>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div>
        <h1>Administración de Usuarios</h1>

        <div style="position: absolute; top: 5px; right: 10px;">
            <a href="{{ route('dashboard') }}">Volver a Dashboard</a>
        </div>

        <form method="POST" action="{{ route('actualizar-perfiles-usuarios') }}">
            @csrf
            <table>
                <thead>
                <tr>
                    <th class="usuario-col">Usuario</th>
                    <th class="email-col">Email</th>
                    <th class="perfil-col">Perfiles</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }} {{ $usuario->apellidos }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td class="perfil-cell">
                            @foreach ($perfilesNombres as $perfilId => $perfilNombre)
                                <label class="radio-label">
                                    <input type="radio"
                                           name="perfil_{{ $usuario->usuario_id }}"
                                           value="{{ $perfilId }}"
                                        {{ $perfilesHabilitadosPorUsuario[$usuario->usuario_id] == $perfilId ? 'checked' : '' }}>
                                    {{ $perfilNombre }}
                                </label>
                            @endforeach
                            <label class="radio-label">
                                <input type="radio"
                                       name="perfil_{{ $usuario->usuario_id }}"
                                       value="0"
                                    {{ $perfilesHabilitadosPorUsuario[$usuario->usuario_id] == 0 ? 'checked' : '' }}>
                                Perfil no asignado
                            </label>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection

