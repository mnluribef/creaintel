@extends('adminlte::page')

@section('title', 'CreaIntel | Estudiante')

@section('content_header')

@include('usuarios/roltopmenu')

@include('usuarios/roltopmenu')
<!-- <h1>Estudiante</h1> -->
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa-solid fa-user"></i>
                            Agregar Estudiante
                        </h3>
                    </div>

                    <div class="card-body p-4">
                        <fieldset class="border border-primary border-2 p-3 rounded">
                            <form action="/estudiante" method="POST">
                                @csrf
                                <h4 class="text-center text-primary">Datos del Estudiante</h4>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="estudiante_ci" class="mt-4">Cédula</label>
                                        <input type="number" class="form-control col-md-2" id="estudiante_ci" name="estudiante_ci" placeholder="Ej: 25617543" maxlength="8" tabindex="1" onKeyPress="if(this.value.length==8) return false;" onkeypress="return cedula(event);" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="nombre" class="mt-4">Nombre</label>
                                        <input type="text" class="form-control col-md-9" id="nombre" name="nombre" placeholder="Ej: Juan" maxlength="50" tabindex="2" onkeypress="return txt(event);" required>
                                    </div>

                                    <div class="col">
                                        <label for="apellido" class="mt-4">Apellido</label>
                                        <input type="text" min="1" class="form-control col-md-9" id="apellido" name="apellido" placeholder="Ej: Pérez" maxlength="50" tabindex="3" onkeypress="return txt(event);" required>
                                    </div>

                                    <div class="col">
                                        <label for="correo" class="mt-4">Correo</label>
                                        <input type="email" class="form-control col-md-9" id="correo" name="correo" placeholder="Ej: ejemplo@gmail.com" maxlength="50" tabindex="4" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="telefono" class="mt-4">Teléfono</label>
                                        <div label for="prefijo_id"></label>
                                            <select name="prefijo_id" id="prefijo_id" tabindex="5" class="form-select col-md-3 d-inline-block">
                                                <option value=""></option>
                                                @foreach ($prefijo as $prefijo)
                                                <option value="{{$prefijo['id']}}">{{$prefijo['prefijo']}}</option>
                                                @endforeach
                                            </select>

                                            <input type="number" min="1" class="form-control col-md-4 d-inline-block" id="telefono" name="telefono" placeholder="Ej: 5432132" tabindex="6" maxlength="7" required onKeyPress="if(this.value.length==7) return false;">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="sede_id" class="mt-4">Sede</label>
                                        <select name="sede_id" id="sede_id" tabindex="7" class="form-select col-md-9">
                                            <option value="">-- Escoja una opción --</option>
                                            @foreach ($sedes as $sede)
                                            <option value="{{$sede['id']}}">{{$sede['nombre_Sede']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="lider_id" class="mt-4">¿Es Líder?</label>
                                        <select name="lider_id" id="lider_id" tabindex="7" class="form-select col col-md-3">
                                            <option value="2" selected>No</option>
                                            <option value="1">Sí</option>
                                        </select>
                                    </div>
                                </div>
                    </div>




                    <div class="card-footer mt-4">
                        <button type="submit" class="btn btn-primary mr-3" tabindex="6" onclick="javascript:return popup_confirmar();">Guardar</button>
                        <a href="/estudiante" class="btn btn-secondary" tabindex="5" onclick="javascript:return popup_back();">Cancelar</a>

                    </div>
                    </fieldset>
                    </form>


                    @stop

                    @section('css')
                    <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">


                    <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">

                    @stop

                    @section('js')

                    <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
                    <script type="text/javascript" src="{{asset('js/validaciones.js')}}"></script>

                    @stop