@extends('adminlte::page')

@section('title', 'CreaIntel | Docente')

@section('content_header')

    @include('usuarios/roltopmenu')

    @include('usuarios/roltopmenu')
    <h3>
        <i class="fa-solid fa-user-tie"></i>
        Docente |
        <small class="text-muted">Proyecto Sociotecnológico</small>
    </h3>

@stop

@section('content')

    @can('crear-docente')
        <a onclick="crearDocente();" class="btn btn-primary mt-4 mb-4"><i class="fa-solid fa-plus fa-fw"></i>Agregar</a>
    @endcan

    <table id="docente" class=" table table-striped shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Cédula</th>
                <th scope="col">Nombre y Apellido</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Sede</th>
                <th scope="col">PNF</th>
                <!--             <th scope="col">Tiempo de Servicio</th> -->
                <th scope="col">Acciones</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($docentes as $docente)
                <tr>
                    <td>{{ $docente->docente_ci }}</td>
                    <td>{{ $docente->nombre }} {{ $docente->apellido }}</td>
                    <td>{{ $docente->prefijo['prefijo'] }}{{ $docente->telefono }}</td>
                    <!-- <td>{{ $docente->telefono }}</td> -->
                    <td>{{ $docente->sedes['nombre_Sede'] }}</td>
                    <td>{{ $docente->docente_PNF['nombre_PNF'] }}</td>

                    <!--             <td>{{ $docente->tiempo_servicio }}</td> -->
                    <td>
                        @csrf
                        @method('DELETE')

                        @can('editar-docente')
                            <a href="/docente/{{ $docente->docente_ci }}/edit" data-toggle="tooltip" data-placement="top"
                                title="Editar" class="btn btn-success mr-2"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>
                        @endcan

                        <!--                 <a href="/docente/{{ $docente->docente_ci }}/edit" data-toggle="tooltip" data-placement="top" title="Reporte" class="btn btn-danger mr-2"><i class="fa-solid fa-file-pdf fa-fw"></i></a> -->

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('docente/create')

@stop

@section('css')
    <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">


    <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">


@stop

@section('js')

    <!-- <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> -->



    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>






    <script>
        $(function() {
            $('#docente').DataTable({
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
