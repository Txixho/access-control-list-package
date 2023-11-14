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

        .cliente_id-cell {
            text-align: center;
        }

        .cliente_id-col {
            padding-right: 10px;
        }
        .checkbox-label {
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
        <h1>Administración de Clientes</h1>

        <div style="position: absolute; top: 5px; right: 10px;">
            <a href="{{ route('dashboard') }}">Volver a Dashboard</a>
        </div>

        <form method="POST" action="{{ route('actualizar-perfiles-clientes') }}">
            @csrf
            <table>
                <thead>
                <tr>
                    <th class="cliente_id-col">Cliente_id</th>
                    <th class="nombre-col">Nombre</th>
                    <th class="perfil-col">Perfiles</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td class="cliente_id-cell">{{ $cliente->cliente_id }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td class="perfil-cell">
                            @foreach ($perfiles as $perfil)
                                <label class="checkbox-label">
                                    <input
                                        type="checkbox"
                                        name="cliente_perfil[{{ $cliente->cliente_id }}][]"
                                        value="{{ $perfil->perfil_id }}"
                                        {{ $relaciones->contains(function ($item) use ($cliente, $perfil) {
                                            return $item->cliente_id == $cliente->cliente_id && $item->perfil_id == $perfil->perfil_id && $item->habilitado;
                                        }) ? 'checked' : '' }}
                                    >
                                    {{ $perfil->nombre }}
                                    @foreach ($relaciones as $relacion)
                                        @if ($relacion->cliente_id == $cliente->cliente_id && $relacion->perfil_id == $perfil->perfil_id)
                                            ({{ $relacion->nombre_personalizado }})
                                        @endif
                                    @endforeach
                                </label>
                            @endforeach
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Actualizar Perfiles</button>
        </form>
    </div>
@endsection

