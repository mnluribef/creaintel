@extends('adminlte::page')

@section('title', 'CreaIntel | Parroquias')

@section('content_header')
    <h3>
        <i class="fa-solid fa-folder-open "></i>
        Parroquias |
        <small class="text-muted">Parámetros</small>
    </h3>

@stop
@section('content')
    <a onclick="crearParroquia();" class="btn btn-primary mt-4 mb-4"><i class="fa-solid fa-plus fa-fw"></i>Agregar</a>

    <table id="parroquia" class=" table table-striped shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Parroquia</th>
                <th scope="col">Acciones</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($parroquias as $parroquias)
                <tr>
                    <td>{{ $parroquias->id }}</td>
                    <td>{{ $parroquias->nombre_Parroquia }}</td>
                    <td>

                        @csrf
                        @method('DELETE')
                        <a href="/parroquia/{{ $parroquias->id }}/edit" data-toggle="tooltip" data-placement="top"
                            title="Editar" class="btn btn-success mr-2"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>

                        <!-- <a href="/parroquia/{{ $parroquias->id }}/edit" data-toggle="tooltip" data-placement="top" title="Reporte" class="btn btn-danger mr-2"><i class="fa-solid fa-file-pdf fa-fw"></i></a>-->

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('parroquia/modalcrearparroquia')

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
        $(document).ready(function() {
            $('#parroquia').DataTable({
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
