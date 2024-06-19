@extends('adminlte::page')

@section('title', 'CreaIntel | Período')

@section('content_header')

    @include('usuarios/roltopmenu')
    <!-- <h1>PNF</h1> -->
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
                                <i class="fa-solid fa-solid fa-calendar-days"></i>
                                Editar Período Académico
                            </h3>
                        </div>

                        <link href="{{ asset('/css/flatpickr.min.css') }}" rel="stylesheet">
                        <script type="text/javascript" src="{{ asset('js/flatpickr.js') }}"></script>
                        <script type="text/javascript" src="{{ asset('js/flatpickr_language_es.js') }}
                                                                                            "></script>

                        <div class="card-body">
                            <fieldset class="border border-primary border-2 p-3 rounded">
                                <form action="/periodo/{{ $periodo->id }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-row">

                                        <label for="anio_academico" class="mt-4 ">Año Académico</label>
                                        <select class="form-select" id='anio_academico' name="anio_academico">
                                        </select>

                                        <script>
                                            let dateDropdown = document.getElementById('anio_academico');

                                            let currentYear = new Date().getFullYear();
                                            let earliestYear = 2000;

                                            while (currentYear >= earliestYear) {
                                                let dateOption = document.createElement('option');
                                                dateOption.text = currentYear;
                                                dateOption.value = currentYear;
                                                dateDropdown.add(dateOption);
                                                currentYear -= 1;
                                            }
                                        </script>



                                        <div class="col">
                                            <label for="fecha_apertura" class="mt-4">Fecha Apertura</label>
                                            <input type="date" id="fecha_apertura" class="form-control col-md-7"
                                                name="fecha_apertura" maxlength="50" tabindex="2" required
                                                value="{{ $periodo['fecha_apertura'] }}">
                                        </div>

                                        <div class="col">
                                            <label for="fecha_cierre" class="mt-4">Fecha Cierre</label>
                                            <input type="date" class="form-control col-md-7" id="fecha_cierre"
                                                name="fecha_cierre" maxlength="50" tabindex="2" required
                                                value="{{ $periodo['fecha_cierre'] }}">
                                        </div>

                                        <script>
                                            flatpickr("#fecha_apertura", {
                                                "locale": "es",
                                                "altInput": true,
                                                "altFormat": 'd/m/Y'
                                            });
                                            flatpickr("#fecha_cierre", {
                                                "locale": "es",
                                                "altInput": true,
                                                "altFormat": 'd/m/Y'

                                            });
                                        </script>
                                    </div>
                        </div>


                        <div class="card-footer mt-4">
                            <button type="submit" class="btn btn-primary mr-3" tabindex="4"
                                onclick="javascript:return popup_confirmar();">Guardar</button>
                            <a class="btn btn-secondary" tabindex="4" onclick="validarCancelar();">Cancelar</a>
                        </div>
                        </fieldset>
                        </form>


                        @include('modales/modalcancelar')
                        @include('modales/modalguardar')
                        @include('pnf/modalcrearpnf')


                    @stop

                    @section('css')
                        <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">


                        <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">

                    @stop

                    @section('js')
                        <script type="text/javascript" src="{{ asset('js/jquery-3.6.4.js') }}"></script>
                        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

                    @stop
