@extends('adminlte::page')

@section('title', 'CreaIntel | Parroquias')

@section('content_header')
    <!-- <h1>Parroquia</h1> -->
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
                                Agregar Parroquia
                            </h3>
                        </div>

                        <div class="card-body">
                            <form action="/parroquia" method="POST">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="nombre_parroquia" class="mt-4">Nueva Parroquia</label>
                                        <input type="text" class="form-control col-md-7" id="nombre_parroquia"
                                            name="nombre_parroquia" maxlength="30" tabindex="2" required>
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
