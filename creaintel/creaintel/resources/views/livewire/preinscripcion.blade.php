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


    @can('crear-preinscripcion')
        <!-- <a id="preinscribir" value='preinscribir' class="btn btn-primary mt-4 mb-4"><i class="fa-solid fa-plus fa-fw"></i>Agregar</a> -->
        <a id="preinscribir" wire:click="checkFechas" class="btn btn-primary mt-4 mb-4 float-end"><i
                class="fa-solid fa-plus fa-fw"></i>Agregar</a>
                 {{-- href="{{ route('preinscribir') }}" --}}
    @endcan

    <div class="pt-3">
        @can('ver-usuarios')
            <livewire:tabla-preinscripcion />
        @endcan
    </div>

</div>
