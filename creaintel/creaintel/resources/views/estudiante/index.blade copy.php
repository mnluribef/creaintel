@extends('adminlte::page')

@section('title', 'CreaIntel | Estudiante')

@section('content_header')

@include('usuarios/roltopmenu')
<h3>
    <i class="fa-solid fa-user"></i>
    Estudiante |
    <small class="text-muted">Proyecto Sociotecnológico</small>
</h3>

@stop

@section('content')
<a onclick="crearEstudiante();" class="btn btn-primary mt-4 mb-4"><i class="fa-solid fa-plus fa-fw"></i>Agregar</a>

<table id="estudiante" class=" table table-striped shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Cédula</th>
            <th scope="col">Nombre y Apellido</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            <th scope="col">Sede</th>
            <th scope="col">Líder</th>
            <th scope="col">Acciones</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($estudiante as $estudiante)
        <tr>
            <td>{{$estudiante->estudiante_ci}}</td>
            <td>{{$estudiante->nombre}} {{$estudiante->apellido}}</td>
            <td>{{$estudiante->prefijo['prefijo']}}{{$estudiante->telefono}}</td>
            <td>{{$estudiante->correo}}</td>
            <td>{{$estudiante->sedes['nombre_Sede']}}</td>
            <td>{{$estudiante->lider['decision_lider']}}</td>
            <td>

                @csrf
                @method('DELETE')
                <a href="/estudiante/{{$estudiante->estudiante_ci}}/edit" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-success mr-2"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>

                <!--                 <a href="/estudiante/{{$estudiante->estudiante_ci}}/edit" data-toggle="tooltip" data-placement="top" title="Reporte" class="btn btn-danger mr-2"><i class="fa-solid fa-file-pdf fa-fw"></i></a> -->

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('estudiante/create')
@include('estudiante/modaleditarestudiante')

@stop

@section('css')
<link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">
<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">

<link href="{{ asset('/css/fontawesome-free/css/fontawesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/solid.css') }}" rel="stylesheet">


@stop

@section('js')

<!-- <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script> -->



<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

<script src="{{ asset('js/validaciones.js') }}"></script>

<script>
    $(function() {
        $('#estudiante').DataTable({
            language: {
                url: '/language/datatables-es-ES.json'
            }
        });
    });

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@stop