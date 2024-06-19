@extends('adminlte::page')

@section('title', 'CreaIntel | Roles')

@section('content_header')

    @include('usuarios/roltopmenu')
    <h3>
        <i class="fa-solid fa-layer-group"></i>
        Roles |
        <small class="text-muted">Configuración</small>
    </h3>

@stop

@section('content')

    @can('crear-rol')
        <a href="{{ route('roles.create') }}" class="btn btn-primary mt-4 mb-4"><i class="fa-solid fa-plus fa-fw"></i>Agregar</a>
    @endcan
    <table id="roles" class="table table-striped shadow-lg mt-4" style="width:100%" name="roles">
        <thead class="bg-primary text-white">
            <th>Rol</th>
            <th>Acciones</th>
        </thead>

        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        @can('editar-rol')
                            <a href="{{ route('roles.edit', $role->id) }}" data-toggle="tooltip" data-placement="top"
                                title="Editar" class="btn btn-success mr-2"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>
                        @endcan

                        <!--                 @can('borrar-rol')
        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                                        {!! Form::close() !!}
    @endcan -->

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

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
            $('#roles').DataTable({
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
