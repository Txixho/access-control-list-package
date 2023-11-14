@extends('layouts.app')

@section('content')

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

    <h1>Perfiles disponibles:</h1>

    <div style="position: absolute; top: 5px; right: 10px;">
        <a href="{{ route('dashboard') }}">Volver a Dashboard</a>
    </div>
    
    <table class="table">
        <thead>
        <tr>
            <th>Nombre del Perfil Actual</th>
            <th>Nuevo Nombre del Perfil</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($perfilesCliente as $perfil)
            <tr>
                <td>{{ $perfil->nombre_personalizado }}</td>
                <td>
                    <form action="{{ route('actualizarPerfil', $perfil->perfil_cliente_id) }}" method="POST" class="perfil-form">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="hidden" name="perfil_id" value="{{ $perfil->perfil_cliente_id }}">
                            <input type="text" name="nombre_personalizado" placeholder="Nuevo nombre de perfil" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Modificar nombre</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection




