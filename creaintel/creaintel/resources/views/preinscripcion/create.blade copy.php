@extends('adminlte::page')

@section('title', 'CreaIntel | Preinscripción')

@section('content_header')

@include('usuarios/roltopmenu')
<!-- <h1>Preinscripción</h1> -->
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
                            <i class="fa-solid fa-file-signature"></i>
                            Nueva Preinscripción de Proyecto
                        </h3>
                    </div>

                    <div class="card-body p-4">
                        <fieldset class="border border-primary border-2 p-3 rounded">
                            <form action="/preinscripcion" method="POST" class="ml-3">
                                @csrf

                                <label>Cédula</label>

                                <label for="estudiante_ci" class="mt-4">Estudiante</label>
                                <select name="estudiante_ci" id="estudiante_ci" class="form-select col-md-2" required style="display:flex">
                                    <option value="">-- Escoja una opción --</option>
                                    @foreach ($estudiantes as $estudiante)
                                    @if($estudiante->lider_id=='1')
                                    <option value="{{$estudiante['estudiante_ci']}}">{{$estudiante['estudiante_ci']}}</option>
                                    @endif
                                    @endforeach
                                </select>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="PNF_id" class="mt-4">PNF</label>
                                        <select name="PNF_id" id="PNF_id" class="form-select col-md-9" style="display:flex">
                                            <option value="">-- Escoja una opción --</option>
                                            @foreach ($pnfs as $pnf)
                                            <option value="{{$pnf['id']}}">{{$pnf['nombre_PNF']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="Sede_id" class="mt-4">Sede</label>
                                        <select name="Sede_id" id="Sede_id" class="form-select col-md-9" style="display: flex">
                                            <option value="">-- Escoja una opción --</option>
                                            @foreach ($sedes as $Sede)
                                            <option value="{{$Sede['id']}}">{{$Sede['nombre_Sede']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="Tipo_Estudio_id" class="mt-4">Tipo de Estudio</label>
                                        <select name=" Tipo_Estudio_id" id="Tipo_Estudio_id" class="form-select col-md-9">

                                            <option value="">-- Escoja una opción --</option>
                                            @foreach ($tipo_estudios as $tipo_Estudio)
                                            <option value="{{$tipo_Estudio['id']}}">{{$tipo_Estudio['nombre_Tipo_Estudio']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="turno_id" class="mt-4">Turno</label>
                                        <select name=" turno_id" id="turno_id" class="form-select col-md-9">

                                            <option value="">-- Escoja una opción --</option>
                                            @foreach ($turnos as $turno)
                                            <option value="{{$turno['id']}}">{{$turno['nombre_Turno']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="Trayecto_id" class="mt-4">Trayecto</label>
                                        <select name="Trayecto_id" id="Trayecto_id" class="form-select col-md-9" style="display:flex">
                                            <option value="">-- Escoja una opción --</option>
                                            @foreach ($trayectos as $trayecto)
                                            <option value="{{$trayecto['id']}}">{{$trayecto['nombre_Trayecto']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="Seccion_id" class="mt-4">Sección</label>
                                        <select name="Seccion_id" id="Seccion_id" class="form-select col-md-9" style="display:flex">
                                            <option value="">-- Escoja una opción --</option>
                                            @foreach ($seccion as $seccion)
                                            <option value="{{$seccion['id']}}">{{$seccion['nombre_Seccion']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="estado_id" class="mt-4">Estado</label>
                                        <select name="estado_id" id="estado_id" class="form-select col-md-9" style="display:flex">
                                            <option value="">-- Escoja una opción --</option>
                                            @foreach ($estado as $estado)
                                            <option value="{{$estado['id']}}">{{$estado['nombre_Estado']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="municipio_id" class="mt-4">Municipio</label>
                                        <select name="municipio_id" id="municipio_id" class="form-select col-md-9" style="display:flex">
                                            <option value="">-- Escoja una opción --</option>
                                            @foreach ($municipio as $municipio)
                                            <option value="{{$municipio['id']}}">{{$municipio['nombre_Municipio']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="parroquia_id" class="mt-4">Parroquia</label>
                                        <select name="parroquia_id" id="parroquia_id" class="form-select col-md-9" style="display:flex">
                                            <option value="">-- Escoja una opción --</option>
                                            @foreach ($parroquia as $parroquia)
                                            <option value="{{$parroquia['id']}}">{{$parroquia['nombre_Parroquia']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="sector_id" class="mt-4">Sector</label>
                                        <select name="sector_id" id="sector_id" class="form-select col-md-2" style="display:flex">
                                            <option value="">-- Escoja una opción --</option>
                                            @foreach ($sector as $sector)
                                            <option value="{{$sector['id']}}">{{$sector['nombre_Sector']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="titulo_Tentativo" class="mt-4">Titulo Tentativo</label>
                                    <input type="text" class="form-control col-md-11" id="titulo_Tentativo" name="titulo_Tentativo" placeholder="Ej: Componente de software para el control inventario de la UPT Aragua (máx 100 palabras)" style="display:flex;" maxlength="100" required>
                                </div>

                                <div class="form-group">
                                    <label for="breve_Descripcion" class="mt-4">Breve Descripción</label>
                                    <textarea class="form-control col-md-11" id="breve_Descripcion" name="breve_Descripcion" placeholder="En pocas palabras, describa su proyecto (máx 300 palabras)" rows="5" cols="20" maxlength="300" required></textarea>
                                </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-3" tabindex="4" onclick="javascript:return popup_confirmar();">Guardar</button>
                        <a href="/preinscripcion" class="btn btn-secondary" tabindex="3" onclick="javascript:return popup_back();">Cancelar</a>
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