@extends('adminlte::page')

@section('title', 'CreaIntel | Período')

@section('content_header')

    @include('usuarios/roltopmenu')
    <h3>
        <i class="fa-solid fa-calendar-days"></i>
        Período Académico |
        <small class="text-muted">Configuración</small>
    </h3>

@stop

@section('content')
    <!-- <a href="pnf/create" class="btn btn-primary mt-4 mb-4"><i class="fa-solid fa-plus fa-fw"></i>Agregar</a> -->

    <table id="estudiante" class=" table table-striped shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Año Académico</th>
                <th scope="col">Fecha Apertura</th>
                <th scope="col">Fecha Cierre</th>
                <th>Acciones</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($periodo as $periodo)
                <tr>
                    <td>{{ $periodo->anio_academico }}</td>
                    <td>{{ $fecha_apertura_format }}</td>
                    <td>{{ $fecha_cierre_format }}</td>
                    <td>

                        @csrf
                        @method('DELETE')

                        @can('editar-periodo')
                            <a href="/periodo/{{ $periodo->id }}/edit" data-toggle="tooltip" data-placement="top"
                                title="Editar" class="btn btn-success mr-2"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>
                        @endcan

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('pnf/modalcrearpnf')


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
            $('#estudiante').DataTable({
                language: {
                    url: '/language/datatables-es-ES.json'
                },
                paging: false,
                searching: false,
                ordering: false,
                info: false
            });
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop
