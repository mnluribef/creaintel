@extends('adminlte::page')

@section('title', 'CreaIntel | Inscripción')

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
                                <i class="fa-solid fa-solid fa-file-signature"></i>
                                Inscripción
                            </h3>
                        </div>

                        <div class="card-body p-4">
                            <fieldset class="border border-primary border-2 p-3 rounded">
                                <form action="/inscripcion" method="POST">
                                    @csrf

                                    <label>Cédula</label>

                                    <label for="estudiante_ci" class="mt-4">Estudiante</label>
                                    <select name="estudiante_ci" id="estudiante_ci" disabled class="form-control col-md-2"
                                        required style="display:flex">
                                        @foreach ($estudiantes as $estudiante)
                                            <option value="{{ $estudiante['estudiante_ci'] }}">
                                                {{ $estudiante['estudiante_ci'] }}</option>
                                        @endforeach
                                    </select>

                                    <!--                             @foreach ($inscripciones as $inscripcion)
    @WHERE
                                        <p>{{ $inscripcion->id }}</p>
                                        <p>{{ $inscripcion->titulo_tentativo }}</p>
    @endforeach -->

                                    <div class=" form-group">
                                        <label for="titulo_Tentativo">Titulo Tentativo</label>
                                        <input type="text" class="form-control" id="titulo_Tentativo"
                                            name="titulo_Tentativo"
                                            placeholder="Ej: Componente de software para el control inventario de la UPT Aragua (máx 100 palabras)"
                                            style="width: 75%" maxlength="100" value="{{ $inscripcion->titulo_tentativo }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="objetivo" class="mt-4">Objetivos</label>
                                        <input type="text" class="form-control" id="objetivo" name="objetivo"
                                            placeholder="Ej: " style="width: 75%" maxlength="100" required>
                                    </div>

                                    <div class=" form-group">
                                        <label for="alcance" class="mt-4">Alcances</label>
                                        <input type="text" class="form-control" id="alcance" name="alcance"
                                            placeholder="Ej: " style="width: 75%" maxlength="100" required>
                                    </div>

                                    <div class=" form-group">
                                        <label for="limitacion" class="mt-4">Limitaciones</label>
                                        <input type="text" class="form-control" id="limitacion" name="limitacion"
                                            placeholder="Ej: " style="width: 75%" maxlength="100" required>
                                    </div>



                                    <div class="form-group">
                                        <label for="aportes_comu" class="mt-4">Aportes a la Comunidad</label>
                                        <input type="text" class="form-control" id="aportes_comu" name="aportes_comu"
                                            placeholder="Ej: " style="width: 75%" maxlength="100" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="acciones_integra" class="mt-4">Acciones de Integración</label>
                                        <input type="text" class="form-control" id="acciones_integra"
                                            name="acciones_integra" placeholder="Ej: " style="width: 75%" maxlength="100"
                                            required>
                                    </div>

                                    <div class=" form-group">
                                        <label for="plan_patria" class="mt-4">Plan de la Patria</label>
                                        <input type="text" class="form-control" id="plan_patria" name="plan_patria"
                                            placeholder="Ej: " style="width: 75%" maxlength="100" required>
                                    </div>




                                    <div class="card-footer">
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

                        @stop
