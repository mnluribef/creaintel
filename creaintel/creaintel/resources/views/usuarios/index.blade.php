@extends('adminlte::page')

@section('title', 'CreaIntel | Usuarios')

@section('content_header')

    @include('usuarios/roltopmenu')
    <!-- <h1>Editar preinscripción</h1> -->

    <h3>
        <i class="fa-solid fa-circle-user"></i>
        Usuarios |
        <small class="text-muted">Configuración</small>
    </h3>

@stop

@section('content')
    <!--   <div class="section-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="card">
                                      <div class="card-body"> -->


    <a href="{{ route('usuarios.create') }}" class="btn btn-primary mt-4 mb-4"><i
            class="fa-solid fa-plus fa-fw"></i>Agregar</a>

    <table id="usuarios" class="table table-striped shadow-lg mt-4" style="width:100%" name="usuarios">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Cédula</th>
                <th scope="col">Nombre y Apellido</th>
                <th scope="col">E-mail</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>

                    <td>{{ $usuario->Ci }}</td>
                    <td>{{ $usuario->name }} {{ $usuario->apellido }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        @if (!empty($usuario->getRoleNames()))
                            @foreach ($usuario->getRoleNames() as $rolNombre)
                                <h5><span class="badge">{{ $rolNombre }}</span></h5>
                            @endforeach
                        @endif
                    </td>
                    <style>
                        .badge {
                            background-color: teal;
                        }
                    </style>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" data-toggle="tooltip" data-placement="top"
                            title="Editar" class="btn btn-success mr-2"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>

                        <!--
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['usuarios.destroy', $usuario->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!} -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
@endsection


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
            $('#usuarios').DataTable({
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
