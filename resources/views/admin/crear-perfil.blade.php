@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Perfil y Asignar Rutas</h1>
        <div style="position: absolute; top: 5px; right: 10px;">
            <a href="{{ route('dashboard') }}">Volver a Dashboard</a>
        </div>
        <div style="position: absolute; top: 30px; right: 10px;">
            <a href="{{ route('seleccion-perfil') }}">Atrás</a>
        </div>
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

        <!-- Formulario para crear un nuevo perfil y asignar rutas -->
        <form method="post" action="#">
            @csrf

            <!-- Campo de texto para el nombre del perfil -->
            <div class="form-group">
                <label for="nombre">Nombre del Nuevo Perfil:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div><h4>Seleccionar rutas para el perfil</h4></div>

            <!-- Lista de todas las rutas -->
            <ul class="list-group">
                @foreach($rutas as $ruta)
                    <li class="list-group-item">
                        <div class="row">
                            <!-- Columna para mostrar la ruta -->
                            <div class="col-md-6">
                                {{ $ruta->path }}
                            </div>

                            <!-- Columna para el checkbox -->
                            <div class="col-md-6">
                                <div class="form-check float-right">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        name="rutas[]"
                                        value="{{ $ruta->ruta_id }}"
                                    >
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <button type="submit" class="btn btn-primary mt-4">Crear Nuevo Perfil</button>
        </form>
    </div>
@endsection
