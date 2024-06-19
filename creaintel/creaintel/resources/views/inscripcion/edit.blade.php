@extends('adminlte::page')

@section('title', 'CreaIntel | Editar')

@section('content_header')

    @include('usuarios/roltopmenu')
    <!-- <h1>Editar preinscripción</h1> -->
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa-solid fa-solid fa-file-signature"></i>
                                Editar Inscripción
                            </h3>
                        </div>

                        <div class="card-body p-4">
                            <fieldset class="border border-primary border-2 p-3 rounded">
                                <form action="/inscripcion/{{ $inscripcion->id }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <b>Cédula: </b><span class="mr-4">{{ $inscripcion->estudiante_ci }}</span>
                                    <b>Nombre: </b><span class="mr-4">{{ $inscripcion->estudiantes['nombre'] }}</span>
                                    <b>Apellido: </b><span class="mr-4">{{ $inscripcion->estudiantes['apellido'] }}</span>
                                    <b>Trayecto: </b><span
                                        class="mr-4">{{ $inscripcion->trayectos['nombre_Trayecto'] }}</span>
                                    <b>Sección: </b><span
                                        class="mr-4">{{ $inscripcion->secciones['nombre_Seccion'] }}</span>
                                    <br>
                                    <div class="mt-3">
                                        <b>PNF: </b><span class="mr-4">{{ $inscripcion->pnfs['nombre_PNF'] }}</span>
                                        <b>Sede: </b><span class="mr-4">{{ $inscripcion->sedes['nombre_Sede'] }}</span>
                                        <b>Turno: </b><span class="mr-4">{{ $inscripcion->turnos['nombre_Turno'] }}</span>
                                        <b>Tipo de Estudio: </b><span
                                            class="mr-4">{{ $inscripcion->tipo_estudios['nombre_Tipo_Estudio'] }}</span>
                                    </div>

                                    <div class="mt-3">
                                        <b>Estado: </b><span
                                            class="mr-4">{{ $inscripcion->estados['nombre_Estado'] }}</span>
                                        <b>Municipio: </b><span
                                            class="mr-4">{{ $inscripcion->municipios['nombre_Municipio'] }}</span>
                                        <b>Parroquia: </b><span
                                            class="mr-4">{{ $inscripcion->parroquias['nombre_Parroquia'] }}</span>
                                        <b>Sector: </b><span
                                            class="mr-4">{{ $inscripcion->sectores['nombre_Sector'] }}</span>
                                    </div>

                                    <div class="mt-3">
                                        <b>Titulo Tentativo: </b><span
                                            class="mr-4">{{ $inscripcion->titulo_tentativo }}</span>
                                    </div>


                                    <div class=" form-group">
                                        <label for="objetivo" class="mt-3">Objetivo</label>
                                        <input type="text" class="form-control" id="objetivo" name="objetivo"
                                            placeholder="Ej: " style="width: 75%" maxlength="100"
                                            value="{{ $inscripcion->objetivo }}">
                                    </div>

                                    <div class=" form-group">
                                        <label for="alcance" class="mt-3">Alcances</label>
                                        <input type="text" class="form-control" id="alcance" name="alcance"
                                            placeholder="Ej: " style="width: 75%" maxlength="100"
                                            value="{{ $inscripcion->alcance }}">
                                    </div>

                                    <div class=" form-group">
                                        <label for="limitacion" class="mt-3">Limitaciones</label>
                                        <input type="text" class="form-control" id="limitacion" name="limitacion"
                                            placeholder="Ej: " style="width: 75%" maxlength="100"
                                            value="{{ $inscripcion->limitacion }}">
                                    </div>

                                    <div class=" form-group">
                                        <label for="aportes_comu" class="mt-3">Aportes a la Comunidad</label>
                                        <input type="text" class="form-control" id="aportes_comu" name="aportes_comu"
                                            placeholder="Ej: " style="width: 75%" maxlength="100"
                                            value="{{ $inscripcion->aportes_comu }}">
                                    </div>

                                    <div class=" form-group">
                                        <label for="acciones_integra" class="mt-3">Acciones de Integración</label>
                                        <input type="text" class="form-control" id="acciones_integra"
                                            name="acciones_integra" placeholder="Ej: " style="width: 75%" maxlength="100"
                                            value="{{ $inscripcion->acciones_integra }}">
                                    </div>

                                    <div class=" form-group">
                                        <label for="plan_patria" class="mt-3">Plan de la Patria</label>
                                        <input type="text" class="form-control" id="plan_patria" name="plan_patria"
                                            placeholder="Ej: " style="width: 75%" maxlength="100"
                                            value="{{ $inscripcion->plan_patria }}">
                                    </div>

                        </div>
                        <div class="card-footer mt-3">
                            <button type="submit" class="btn btn-primary mr-3" tabindex="4"
                                onclick="javascript:return popup_confirmar();">Guardar</button>
                            <a href="/inscripcion" class="btn btn-secondary" tabindex="3"
                                onclick="javascript:return popup_back();">Cancelar</a>
                        </div>
                        </fieldset>
                        </form>


                    @stop

                    @section('css')
                        <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">



                        <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">

                    @stop

                    @section('js')

                        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
                        <script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>

                    @stop
