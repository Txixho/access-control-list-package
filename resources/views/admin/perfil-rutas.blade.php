@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Administración de Rutas para el Perfil: {{ $perfil->nombre }}</h1>
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

        <!-- Formulario para actualizar las rutas asociadas al perfil -->
        <form method="post" action="{{ route('perfil-rutas.update', $perfil->perfil_id) }}">
            @csrf
            @method('PUT')

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
                                        {{ in_array($ruta->ruta_id, $perfilRutas) ? 'checked' : '' }}
                                    >
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <button type="submit" class="btn btn-primary mt-4">Actualizar Rutas</button>
        </form>
    </div>
@endsection



