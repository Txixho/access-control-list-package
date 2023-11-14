@extends('layouts.app')

@section('content')
    <div class="pageheader">
        <h1>@lang('Crear Usuario')</h1>
    </div>
    <div class="conexion px-4 py-2 mb-2 text-dark d-none d-md-flex align-items-center border-bottom" style="background-color: #fbfbbf !important;">
        <i class="fas fa-exclamation-triangle mr-2"></i>
        <div class="message">
            <p class="mb-0">
                El campo <b>login</b> será deprecado en futuras versiones. Este campo será reemplazado por el campo email.
                Por favor, téngalo en cuenta para la edición/creación del usuario.
            </p>
        </div>
    </div>
    <div class="accordion acordeon-usuario" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h4 class="mb-0" data-toggle="collapse" data-target="#tab_datos_usuario" aria-expanded="true" aria-controls="tab_datos_usuario">
                    <div class="d-flex justify-content-between">
                        <span>Datos usuario</span>
                        <span><i class="fas fa-arrow-down"></i></span>
                    </div>
                </h4>
            </div>
            <div id="tab_datos_usuario" class="collapse multi-collapse show" aria-labelledby="headingOne">
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">@lang('Nombre')</label>
                                    <input id="nombre" type="text" name="nombre" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="apellidos" class="control-label">@lang('Apellidos')</label>
                                    <input id="apellidos" type="text" name="apellidos" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-12 col-md-3">
                                <label for="email" class="control-label">@lang('Email'): </label>
                                <div class="">
                                    <div class="">
                                        <input id="email" type="text" name="email" class="form-control" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="login" class="control-label">@lang('Login')</label>
                                    <input id="login" type="text" name="login" class="form-control" value="">
                                    <small class="text-muted">credencial de acceso a ecosistema <b>Indaga</b></small>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="pass" class="control-label">@lang('Contraseña')</label>
                                    <span> / </span>
                                    <div class="input-group">
                                        <input id="pass" type="password" name="pass" class="form-control" value="">
                                        <div class="input-group-append">
                                            <button class="btn" type="button" id="mostrar-ocultar-pass">
                                                <i id="icono-pass" class="fas fa-eye-slash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="passConfirm" class="control-label">@lang('Confirmar Contraseña')</label>
                                    <input id="passConfirm" type="password" name="passConfirm" class="form-control" value="">
                                    <p id="errorPass"></p>
                                </div>
                            </div>
                            <div>
                                <label for="envio" class="control-label">@lang('Perfil de usuario (escoger uno)')</label>
                                <select id="envio" name="envio" class="form-control" style="width: 200px;">
                                    <option value="1">Administrador</option>
                                    <option value="2">Usuario</option>
                                    <option value="3">Doctor</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
