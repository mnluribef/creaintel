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
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa-solid fa-solid fa-file-signature"></i>
                            Editar Preinscripción
                        </h3>
                    </div>

                    <div class="card-body p-4">
                        <fieldset class="border border-primary border-2 p-3 rounded">
                            <form action="/preinscripcion/{{$preinscripcion->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <h4 class="text-center text-primary">Planilla de Preinscripción</h4>
                                <div class="form-group">

                                    <label>Cédula del Líder</label>
                                    <input type="number" min="1" class="form-control" id="ci_Estudiante" name="ci_Estudiante" placeholder="Ej: 25617543" style="width: 16%" maxlength="100" value="{{$preinscripcion->estudiante_ci}}" disabled>
                                    <div class="mt-3">
                                        <b>Nombre y Apellido:</b>
                                        @foreach ($estudiantes as $estudiante)
                                        <span>{{$estudiante['nombre']}} {{$estudiante['apellido']}}</span>
                                        @endforeach
                                    </div>
                                </div>


                                <div class="col">
                                    <label for="sede_id" class="mt-4">Sede</label>
                                    <select name="sede_id" id="sede_id" class="form-select col-md-9" style="display: flex">
                                        <option value="">-- Escoja una opción --</option>
                                        @foreach ($sedes as $Sede)
                                        <option value="{{$Sede['id']}}">{{$Sede['nombre_Sede']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="tipo_estudio_id" class="mt-4">Tipo de Estudio</label>
                                    <select name=" tipo_estudio_id" id="tipo_estudio_id" class="form-select col-md-9">

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
                            <label for="trayecto_id" class="mt-4">Trayecto</label>
                            <select name="trayecto_id" id="trayecto_id" class="form-select col-md-9" style="display:flex">
                                <option value="">-- Escoja una opción --</option>
                                @foreach ($trayectos as $trayecto)
                                <option value="{{$trayecto['id']}}">{{$trayecto['nombre_Trayecto']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <label for="seccion_id" class="mt-4">Sección</label>
                            <select name="seccion_id" id="seccion_id" class="form-select col-md-9" style="display:flex">
                                <option value="">-- Escoja una opción --</option>
                                @foreach ($seccion as $seccion)
                                <option value="{{$seccion['id']}}">{{$seccion['nombre_Seccion']}}</option>
                                @endforeach
                            </select>
                        </div>
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
                        <select name="sector_id" id="sector_id" class="form-select col-md-9" style="display:flex">
                            <option value="">-- Escoja una opción --</option>
                            @foreach ($sector as $sector)
                            <option value="{{$sector['id']}}">{{$sector['nombre_Sector']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <label for="asesor_ci" class="mt-4">Docente Asesor</label>
                        <select name="asesor_ci" id="asesor_ci" class="form-select col-md-9" style="display:flex">
                            <option value=""></option>
                            @foreach ($docente as $docente)
                            <option value="{{$docente['docente_ci']}}"></option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class=" form-group">
                    <label for="titulo_Tentativo">Titulo del Proyecto</label>
                    <input type="text" class="form-control" id="titulo_Tentativo" name="titulo_Tentativo" placeholder="Ej: Componente de software para el control inventario de la UPT Aragua (máx 100 palabras)" style="width: 75%" maxlength="100" value="{{$preinscripcion->titulo_tentativo}}">
                </div>

                <!--                                 <div class="form-group">
                                    <label for="breve_Descripcion">Breve Descripción</label>
                                    <textarea class="form-control" id="breve_Descripcion" name="breve_Descripcion" placeholder="En pocas palabras, describa su proyecto (máx 300 palabras)" rows="5" cols="20" maxlength="300">{{$preinscripcion->breve_descripcion}}</textarea>
                                </div> -->

                <div class="form-group">
                    <label for="objetivo" class="mt-4">Objetivo</label>
                    <input type="text" class="form-control col-md-11" id="objetivo" name="objetivo" maxlength="100" required value="{{$preinscripcion->objetivo}}">
                </div>

                <div class=" form-group">
                    <label for="alcance" class="mt-4">Alcance</label>
                    <input type="text" class="form-control col-md-11" id="alcance" name="alcance" maxlength="100" required value="{{$preinscripcion->alcance}}">
                </div>

                <div class=" form-group">
                    <label for="limitacion" class="mt-4">Limitaciones</label>
                    <input type="text" class="form-control col-md-11" id="limitacion" name="limitacion" maxlength="100" required value="{{$preinscripcion->limitacion}}">
                </div>

                <b>Líneas de Investigación</b>


                <div class="form-group">
                    <label for="aportes_comu" class="mt-4">Aportes a la Comunidad, Personas Beneficiadas</label>
                    <input type="text" class="form-control col-md-11" id="aportes_comu" name="aportes_comu" maxlength="100" required value="{{$preinscripcion->aportes_comu}}">
                </div>

                <div class="form-group">
                    <label for="acciones_integra" class="mt-4">Acciones de Integración con la Comunidad</label>
                    <input type="text" class="form-control col-md-11" id="acciones_integra" name="acciones_integra" maxlength="100" required value="{{$preinscripcion->acciones_integra}}">
                </div>

                <div class=" form-group">
                    <label for="plan_patria" class="mt-4">Vinculación de la investigación con el Plan de la Patria 2013-2019</label>
                    <input type="text" class="form-control col-md-11" id="plan_patria" name="plan_patria" maxlength="100" required value="{{$preinscripcion->plan_patria}}">
                </div>

                <!--  -->
                <h5 class="text-primary">Datos Personales</h5>
                <div class="form-row">
                    <div class="col">
                        <label for="estudiante_ci" class="mt-4 ">Líder del Equipo</label>
                        <select name="estudiante_ci" id="estudiante_ci" class="form-select col-md-9" required style="display:flex">
                            <option value="">-- Escoja una opción --</option>
                            @foreach ($estudiantes as $estudiante)
                            @if($estudiante->lider_id=='1')
                            <option value="{{$estudiante['estudiante_ci']}}">{{$estudiante['estudiante_ci']}} {{$estudiante['nombre']}} {{$estudiante['apellido']}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="estudiante2_ci" class="mt-4 ">Estudiante 2</label>
                        <select name="estudiante2_ci" id="estudiante2_ci" class="form-select col-md-9" required style="display:flex">
                            <option value="">-- Escoja una opción --</option>
                            @foreach ($estudiantes as $estudiante)
                            @if($estudiante->lider_id=='2')
                            <option value="{{$estudiante['estudiante_ci']}}">{{$estudiante['estudiante_ci']}} {{$estudiante['nombre']}} {{$estudiante['apellido']}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <label for="estudiante3_ci" class="mt-4 ">Estudiante 3</label>
                        <select name="estudiante3_ci" id="estudiante3_ci" class="form-select col-md-9" required style="display:flex">
                            <option value="">-- Escoja una opción --</option>
                            @foreach ($estudiantes as $estudiante)
                            @if($estudiante->lider_id=='2')
                            <option value="{{$estudiante['estudiante_ci']}}">{{$estudiante['estudiante_ci']}} {{$estudiante['nombre']}} {{$estudiante['apellido']}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="sede_id" class="mt-4">Sede</label>
                        <select name="sede_id" id="sede_id" class="form-select col-md-9" style="display: flex">
                            <option value="">-- Escoja una opción --</option>
                            @foreach ($sedes as $Sede)
                            <option value="{{$Sede['id']}}">{{$Sede['nombre_Sede']}}</option>
                            @endforeach
                        </select>
                    </div>



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
                        <label for="tipo_estudio_id" class="mt-4">Tipo de Estudio</label>
                        <select name=" tipo_estudio_id" id="tipo_estudio_id" class="form-select col-md-9">

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
                        <label for="trayecto_id" class="mt-4">Trayecto</label>
                        <select name="trayecto_id" id="trayecto_id" class="form-select col-md-9" style="display:flex">
                            <option value="">-- Escoja una opción --</option>
                            @foreach ($trayectos as $trayecto)
                            <option value="{{$trayecto['id']}}">{{$trayecto['nombre_Trayecto']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <label for="seccion_id" class="mt-4">Sección</label>
                        <select name="seccion_id" id="seccion_id" class="form-select col-md-9" style="display:flex">
                            <option value="">-- Escoja una opción --</option>
                            @foreach ($seccion as $seccion)
                            <option value="{{$preinscripcion->$seccion['id']}}">{{$preinscripcion->$seccion['nombre_Seccion']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <h5 class="text-primary mt-4">Datos de la Comunidad</h5>
                <div class="form-row">
                    <div class="col">
                        <label for="estado_id" class="mt-4">Estado</label>
                        <select name="estado_id" id="estado_id" class="form-select col-md-9" style="display:flex">
                            <option value="">-- Escoja una opción --</option>
                            @foreach ($estado as $estado)
                            <option value="{{$preinscripcion->$estado['id']}}">{{$estado['nombre_Estado']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <label for="municipio_id" class="mt-4">Municipio</label>
                        <select name="municipio_id" id="municipio_id" class="form-select col-md-9" style="display:flex">
                            <option value="">-- Escoja una opción --</option>
                            @foreach ($municipio as $municipio)
                            <option value="{{$preinscripcion->$municipio['id']}}">{{$preinscripcion->$municipio['nombre_Municipio']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <label for="parroquia_id" class="mt-4">Parroquia</label>
                        <select name="parroquia_id" id="parroquia_id" class="form-select col-md-9" style="display:flex">
                            <option value="">-- Escoja una opción --</option>
                            @foreach ($parroquia as $parroquia)
                            <option value="{{$preinscripcion->$parroquia['id']}}">{{$preinscripcion->$parroquia['nombre_Parroquia']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="sector_id" class="mt-4">Sector</label>
                        <select name="sector_id" id="sector_id" class="form-select col-md-9" style="display:flex">
                            <option value="">-- Escoja una opción --</option>
                            @foreach ($sector as $sector)
                            <option value="{{$preinscripcion->$sector['id']}}">{{$preinscripcion->$sector['nombre_Sector']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <label for="asesor_ci" class="mt-4">Docente Asesor</label>
                        <select name="asesor_ci" id="asesor_ci" class="form-select col-md-9" style="display:flex">
                            <option value="">-- Escoja una opción --</option>
                            @foreach ($docente as $docente)
                            <option value="{{$preinscripcion->$docente['asesor_ci']}}"></option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <label for="tutor_ci" class="mt-4">Tutor</label>
                        <select name="tutor_ci" id="tutor_ci" class="form-select col-md-9" style="display:flex">
                            <option value="">-- Escoja una opción --</option>
                            @foreach ($preinscripcion as $docente)
                            <option value="{{$preinscripcion->$docente['docente_ci']}}"></option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="titulo_Tentativo" class="mt-4">Título del Proyecto </label>
                    <textarea class="form-control col-md-11" id="titulo_Tentativo" name="titulo_Tentativo" maxlength="400" rows="2" placeholder="Ej: Componente de software para el control de suministros de la UPT Aragua" required></textarea>

                </div>

                <!--                                 <div class="form-group">
                                    <label for="breve_Descripcion" class="mt-4">Breve Descripción</label>
                                    <textarea class="form-control col-md-11" id="breve_Descripcion" name="breve_Descripcion" placeholder="En pocas palabras, describa su proyecto (máx 300 palabras)" rows="5" cols="20" maxlength="300" required></textarea>
                                </div> -->

                <div class="form-group">
                    <label for="objetivo" class="mt-4">Objetivo</label>
                    <textarea class="form-control col-md-11" id="objetivo" name="objetivo" maxlength="400" rows="2" placeholder="Ej: Objetivo principal del proyecto, comenzar con verbo en infinitivo" required></textarea>
                </div>

                <div class=" form-group">
                    <label for="alcance" class="mt-4">Alcance</label>
                    <textarea class="form-control col-md-11" id="alcance" name="alcance" maxlength="800" rows="3" placeholder="Ej: La investigación abarcará las siguientes áreas..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="limitacion" class="mt-4">Limitaciones</label>
                    <textarea class="form-control col-md-11" id="limitacion" name="limitacion" maxlength="400" rows="3" placeholder="Ej: Inestabilidad del servicio eléctrico del país. Problemas con el servicio de internet." required></textarea>

                </div>

                <div class="form-group">
                    <label for="aportes_comu" class="mt-4">Aportes a la Comunidad, Personas Beneficiadas</label>
                    <textarea class="form-control col-md-11" id="aportes_comu" name="aportes_comu" maxlength="400" rows="3" placeholder="Ej: Serán beneficiados directamente los estudiantes de la escuela y el personal del Departamento de Recursos Humanos, debido a que..." required></textarea>


                </div>

                <div class="form-group">
                    <label for="acciones_integra" class="mt-4">Acciones de Integración con la Comunidad</label>
                    <textarea class="form-control col-md-11" id="acciones_integra" name="acciones_integra" maxlength="400" rows="3" placeholder="Ej: Reuniones con el Jefe del Departamento y el Tutor del Proyecto sobre la funcionalidad y requerimientos de la aplicación." required></textarea>
                </div>

                <div class="form-group">
                    <label for="plan_patria" class="mt-4">Vinculación de la investigación con el Plan de la Patria 2013-2019</label>
                    <textarea class="form-control col-md-11" id="plan_patria" name="plan_patria" maxlength="400" rows="3" placeholder="Ej: 1.6. Desarrollar las capacidades científico-tecnológicas que hagan viable, potencien y blinden la protección y atención de las necesidades del pueblo y el desarrollo del país potencia." required></textarea>
                </div>

            </div>


            <!--  -->


        </div>
        <div class="card-footer mt-4">
            <button type="submit" class="btn btn-primary mr-3" tabindex="7" onclick="validarGuardar();">Guardar</button>
            <a class="btn btn-secondary" tabindex="8" onclick="validarCancelar();">Cancelar</a>
        </div>
        </fieldset>
        </form>

        @include('modales/modalcancelar')
        @include('modales/modalguardar')



        @stop

        @section('css')
        <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">



        <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">

        @stop

        @section('js')

        <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/validaciones.js')}}"></script>

        @stop