<div>
    {{-- @can('crear-usuarios')
        <a type="button" data-bs-toggle="modal" data-bs-target="#config" class="btn btn-primary mt-4 ml-1 mb-4 float-end">
            <i class="fa-solid fa-plus fa-fw"></i>Agregar</a>
    @endcan --}}


    @section('content_top_nav_left')
        <div class="mt-2 ml-2">

            <b>Período:</b>
            {{ $fecha_apertura }}
            hasta
            {{ $fecha_cierre }}

        </div>
    @endsection


    <div class="pt-3">
        @can('ver-usuarios')
            <livewire:tabla-inscripcion />
        @endcan
    </div>

</div>
