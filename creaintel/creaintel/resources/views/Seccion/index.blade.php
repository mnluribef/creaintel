@extends('adminlte::page')

@section('title', 'CreaIntel | Sección')

@section('content_header')

    @include('usuarios/roltopmenu')
    <h3>
        <i class="fa-solid fa-folder-open "></i>
        Sección |
        <small class="text-muted">Parámetros</small>
    </h3>

@stop

@section('content')
    <a onclick="crearSeccion();" class="btn btn-primary mt-4 mb-4"><i class="fa-solid fa-plus fa-fw"></i>Agregar</a>

    <table id="seccion" class=" table table-striped shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Sección</th>
                <th scope="col">Acciones</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($secciones as $secciones)
                <tr>
                    <td>{{ $secciones->id }}</td>
                    <td>{{ $secciones->nombre_Seccion }}</td>
                    <td>

                        @csrf
                        @method('DELETE')
                        <a href="/seccion/{{ $secciones->id }}/edit" data-toggle="tooltip" data-placement="top"
                            title="Editar" class="btn btn-success mr-2"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>

                        <!--<a href="/seccion/{{ $secciones->id }}/edit" data-toggle="tooltip" data-placement="top" title="Reporte" class="btn btn-danger mr-2"><i class="fa-solid fa-file-pdf fa-fw"></i></a>-->

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('seccion/modalcrearseccion')

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
            $('#seccion').DataTable({
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
