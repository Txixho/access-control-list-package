@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="position: absolute; top: 5px; right: 10px;">
            <a href="{{ route('dashboard') }}">Volver a Dashboard</a>
        </div>

        <div class="user__buttons d-flex flex-wrap justify-content-between align-items-center">
            <div class="user__buttons user__buttons--right">
                <a class="btn btn-outline-primary py-0 my-1 mx-md-1" href="{{ route('crearPerfil') }}">
                    <i class="fas fa-plus"></i>
                    @lang('Crear nuevo perfil')
                </a>
            </div>
        </div>
        <div>
            <h1>Selecciona un Perfil</h1>
        </div>

        <!-- Lista de todos los perfiles -->
        <ul class="list-group">
            @foreach($perfiles as $perfil)
                <li class="list-group-item">
                    <a href="{{ route('perfil-rutas.index', $perfil) }}">{{ $perfil->nombre }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection


