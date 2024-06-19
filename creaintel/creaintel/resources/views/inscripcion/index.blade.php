@extends('adminlte::page')

@section('title', 'CreaIntel | Inscripción')

@section('content_header')

    @include('usuarios/roltopmenu')


@section('content_top_nav_left')

    @foreach ($periodo as $perio2)
        <div class="mt-2 ml-2">
            <tr>
                <b>Período</b>

                {{ $perio2['fecha_apertura'] }}
            </tr>

            hasta
            <tr>

                <td>{{ $perio2['fecha_cierre'] }}</td>
            </tr>
        </div>
    @endforeach
@endsection

<h3>
    <i class="fa-solid fa-id-card"></i>
    Inscripción |
    <small class="text-muted">Proyecto Sociotecnológico</small>
</h3>


@stop

@section('content')

<!-- <a href="inscripcion/create" class="btn btn-primary mt-4 mb-4"><i class="fa-solid fa-plus fa-fw"></i>Agregar</a> -->

<table id="inscripcion" class=" table table-striped shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Código</th>
            <th scope="col">Cédula Líder</th>
            <th scope="col">Nombre y Apellido</th>
            <th scope="col">PNF</th>
            <th scope="col">Trayecto</th>
            <th scope="col">Sede</th>
            <th scope="col">Tipo de Estudios</th>
            <th scope="col">Título del Proyecto</th>
            <th scope="col">Status Proyecto</th>
            <th scope="col">Motivo</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Acciones</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($preinscripcion as $preinscripcion)
            @if ($preinscripcion->preins == '0')
                <tr>
                    <td>{{ $preinscripcion->id }}</td>
                    <td>{{ $preinscripcion->pnfs['abreviatura'] }}{{ $preinscripcion->sedes['abreviatura'] }}-{{ $preinscripcion->trayectos['nombre_Trayecto'] }}-{{ $preinscripcion->anio }}-{{ $preinscripcion->correlativo }}
                    </td>
                    <td>{{ $preinscripcion->estudiante_ci }}</td>
                    <td>{{ $preinscripcion->estudiantes['nombre'] }} {{ $preinscripcion->estudiantes['apellido'] }}
                    </td>
                    <td>{{ $preinscripcion->pnfs['nombre_PNF'] }}</td>
                    <td>{{ $preinscripcion->sedes['nombre_Sede'] }}</td>
                    <td>{{ $preinscripcion->trayectos['nombre_Trayecto'] }}</td>
                    <td>{{ $preinscripcion->tipo_estudios['nombre_Tipo_Estudio'] }}</td>
                    <td>{{ $preinscripcion->titulo_tentativo }}</td>

                    <td>

                        @if ($preinscripcion->status_proyecto == 1)
                            <a href="{{ url('status-proyecto/' . $preinscripcion->id) }}"
                                onclick="return confirm('¿Está seguro de cambiar el Status?')"
                                class="btn btn-sm btn-secondary">Pendiente</a>
                        @elseif ($preinscripcion->status_proyecto == 2)
                            <a href="{{ url('status-proyecto/' . $preinscripcion->id) }}"
                                onclick="return confirm('¿Está seguro de cambiar el Status?')"
                                class="btn btn-sm btn-danger">Reprobado</a>
                        @else
                            ($$preinscripcion->status_proyecto==3)
                            <a href="{{ url('status-proyecto/' . $preinscripcion->id) }}"
                                onclick="return confirm('¿Está seguro de cambiar el Status?')"
                                class="btn btn-sm btn-success">Aprobado</a>
                        @endif

                    </td>
                    <td></td>
                    <td></td>

                    <td>
                        <form method="POST"
                            id="miFormulario">

                            @csrf
                            @method('DELETE')

                            <!--                     @can('editar-inscripcion')
    <a href="/inscripcion/{{ $preinscripcion->id }}/edit" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-success mr-2"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>
@endcan -->

                            <a href="/inscripcion/{{ $preinscripcion->id }}/edit" data-toggle="tooltip"
                                data-placement="top" title="Status de Proyecto" class="btn btn-success mr-2"><i
                                    class="fa-solid fa-file-invoice fa-fw"></i></a>


                            <!-- <a href="preinscripcion.planilla_Inscripcion" target="_blank" data-toggle="tooltip" data-placement="top" title="Reporte" class="btn btn-danger mr-2"><i class="fa-solid fa-file-pdf fa-fw"></i></a> -->

                            <a href="{{ route('InscripcionPDF', ['id' => $preinscripcion->id]) }}" target="_blank"
                                data-toggle="tooltip" data-placement="top" title="Reporte"
                                class="btn btn-danger mr-2"><i class="fa-solid fa-file-pdf fa-fw"></i></a>


                            <!--                     {{ url('preinscripcion/observaciones/' . $preinscripcion->id) }} -->
                            @can('observaciones-preinscripcion')
                                <a href="/preinscripcion/{{ $preinscripcion->id }}/observaciones" data-toggle="tooltip"
                                    data-placement="top" title="Observaciones" class="btn btn-dark mr-2"><i
                                        class="fa-solid fa-comment fa-fw"></i></a>
                            @endcan

                            <!--                     <button type="submit" data-toggle="tooltip" data-placement="top" title="Inactivar" class="btn btn-warning" onclick="javascript:return popup_inactivar();"><i class="fa-solid fa-ban fa-fw"></i>
                    </button> -->
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach

    </tbody>
</table>

<!-- @include('modales/modalstatus') -->

@stop

@section('css')
<link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">
<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/sweetalert2.min.css') }}" rel="stylesheet">

<link href="{{ asset('/css/fontawesome-free/css/fontawesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/solid.css') }}" rel="stylesheet">



@stop

@section('js')



<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

<script src="{{ asset('js/validaciones.js') }}"></script>

<script>
    $(function() {
        $('#inscripcion').DataTable({
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
