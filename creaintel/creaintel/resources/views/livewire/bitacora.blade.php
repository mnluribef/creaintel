<div>
    @can('ver-configuracion')
        <script defer src="{{ asset('js/alpine.min.js') }}"></script>

        @section('title', 'Noustrack | Bitácora')

        <h3>
            <i class="fas fa-book fa-fw"></i>
            Bitácora

            | <small class="text-muted">Configuración</small>

        </h3>


        <div class="pt-3">
            <livewire:tabla-bitacora>
        </div>
    @endcan


    @section('css')
        <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">

        <link href="{{ asset('/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/toastr.min.css') }}" rel="stylesheet">

        <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">


    @stop

    @section('js')



        <script src="{{ asset('js/toastr.min.js') }}"></script>



        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

        <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>




    @stop

</div>
