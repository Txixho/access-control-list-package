@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div style="position: absolute; top: 5px; right: 10px;">
            <a href="{{ route('dashboard') }}">Volver a Dashboard</a>
        </div>

        <h1>Rutas de la Aplicación</h1>

        <div class="row">
            <div class="col-md-6">
                <h2>Rutas en la aplicación</h2>
                <ul>
                    @foreach ($rutasAplicacion as $nombre => $ruta)
                        <li>{{ $nombre }} - {{ $ruta->uri }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Rutas en la aplicación pero no en la base de datos</h2>
                <ul>
                    @foreach ($rutasSoloAplicacion as $nombre)
                        <li>{{ $nombre }} - {{ $rutasAplicacion[$nombre]->uri }}</li>
                    @endforeach
                </ul>
                <h2>Rutas en la base de datos pero no en la aplicación</h2>
                <ul>
                    @foreach ($rutasSoloTabla as $ruta)
                        <li>{{ $ruta }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <form action="{{ route('almacenar-rutas') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Almacenar Rutas</button>
        </form>
    </div>
@endsection


