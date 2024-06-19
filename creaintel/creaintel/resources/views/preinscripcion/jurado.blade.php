@extends('adminlte::page')

@section('title', 'CreaIntel | Observaciones')

@section('content_header')
    <!-- <h1>Editar preinscripción</h1> -->
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
                                Observaciones
                            </h3>
                        </div>
                        <!--                     value="{{ $preinscripcion->observaciones }}" -->

                        <!--                     /preinscripcion/{{ $preinscripcion->id }} -->
                        <div class="card-body ml-3">

                            <form action="/preinscripcion/{{ $preinscripcion->id }}" method="POST">

                                @method('PUT')
                                @csrf

                                <div class="col">
                                    <label for="especialista1_ci" class="mt-4 required">Especialista 1</label>
                                    <select required name="especialista1_ci" id="especialista1_ci"
                                        class="form-select col-md-9" style="display:flex">
                                        <option value="">-- Escoja una opción --</option>
                                        @foreach ($jurado as $docente1)
                                            <option value="{{ $docente1['docente_ci'] }}">{{ $docente1['docente_ci'] }}
                                                {{ $docente1['nombre'] }} {{ $docente1['apellido'] }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor escoja una opción.
                                    </div>
                                </div>

                                <!--                             <div class="col">
                                            <label for="especialista1_ci" class="mt-4 required">Especialista 2</label>
                                            <select required name="especialista1_ci" id="especialista1_ci" class="form-select col-md-9" style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($jurado as $docente1)
    <option value="{{ $docente1['docente_ci'] }}">{{ $docente1['docente_ci'] }} {{ $docente1['nombre'] }} {{ $docente1['apellido'] }}</option>
    @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="especialista1_ci" class="mt-4 required">Especialista 3</label>
                                            <select required name="especialista1_ci" id="especialista1_ci" class="form-select col-md-9" style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($jurado as $docente1)
    <option value="{{ $docente1['docente_ci'] }}">{{ $docente1['docente_ci'] }} {{ $docente1['nombre'] }} {{ $docente1['apellido'] }}</option>
    @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div> -->
                        </div>


                    </div>


                    <div class=" card-footer">

                        <button type="submit" class="btn btn-primary mr-3" tabindex="4">Guardar</button>
                        <a href="/preinscripcion" class="btn btn-secondary" tabindex="3">Cancelar</a>
                    </div>

                    </form>

                    <!--                     onclick="javascript:return popup_confirmar();" -->
                    <!--                     onclick="javascript:return popup_back();" -->

                @stop

                @section('css')
                    <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">


                    <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">

                @stop

                @section('js')

                    <script type="text/javascript" src="{{ asset('js/jquery-3.6.4.js') }}"></script>
                    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
                    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

                    <script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>

                @stop
