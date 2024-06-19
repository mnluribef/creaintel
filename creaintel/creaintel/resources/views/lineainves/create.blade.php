@extends('adminlte::page')

@section('title', 'CreaIntel | Líneas de Investigación')

@section('content_header')

    @include('usuarios/roltopmenu')
    <!-- <h1>Líneas de Investigación</h1> -->
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
                                <i class="fa-solid fa-folder-open"></i>
                                Agregar Línea de Investigación
                            </h3>
                        </div>

                        <div class="card-body">
                            <form action="/lineainves" method="POST">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="nombre_lineainves" class="mt-4">Nueva Línea de Investigación</label>
                                        <input type="text" class="form-control" id="nombre_lineainves"
                                            name="nombre_lineainves" maxlength="50" tabindex="2" required>
                                    </div>

                                    <div class="col">
                                        <label for="descripcion" class="mt-4">Descripción</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                                            maxlength="50" tabindex="2" required>
                                    </div>




                                </div>
                        </div>

                        <div class="card-footer mt-4">
                            <button type="submit" class="btn btn-primary mr-3" tabindex="3"
                                onclick="validarGuardar();">Guardar</button>
                            <a class="btn btn-secondary" tabindex="4" onclick="validarCancelar();">Cancelar</a>
                        </div>
                        </form>

                        @include('modales/modalcancelar')
                        @include('modales/modalguardar')


                    @stop

                    @section('css')
                        <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">


                        <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">

                    @stop

                    @section('js')

                        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

                    @stop
