@extends('adminlte::page')

@section('title', 'CreaIntel | Parroquias')

@section('content_header')
    <!-- <h1>Editar Parroquia</h1> -->
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
                                <i class="fa-solid fa-solid fa-file-signature"></i>
                                Editar Parroquia
                            </h3>
                        </div>

                        <div class="card-body ml-3">
                            <form action="/parroquia/{{ $parroquias->id }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-row">
                                    <div class="col">
                                        <label>Nombre de la Parroquia</label>
                                        <input type="text" class="form-control col-md-7" id="nombre_parroquia"
                                            name="nombre_parroquia" maxlength="30"
                                            value="{{ $parroquias->nombre_Parroquia }}" tabindex="2" required>
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
                        <script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>

                    @stop
