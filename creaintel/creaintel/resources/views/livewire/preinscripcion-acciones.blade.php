<div class="d-flex justify-content-start">
    {{-- <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#miModal"
        wire:click.prevent="accion({{ $user->id }})"><i class="fas fa-edit"></i></a> --}}

    @can('inscribir-preinscripcion')
        <a onclick="validarInscribir();" data-toggle="tooltip" data-placement="top" title="Inscribir"
            class="btn btn-info mr-2"><i class="fa-solid fa-id-card fa-fw"></i></a>
    @endcan

    @can('editar-preinscripcion')
        <a href="/preinscripcion/{{ $row->id }}/edit" data-toggle="tooltip" data-placement="top" title="Editar"
            class="btn btn-success mr-2"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>
    @endcan

    <a href="{{ route('PreinscripcionPDF', ['id' => $row->id]) }}" target="_blank" data-toggle="tooltip"
        data-placement="top" title="Reporte" class="btn btn-danger mr-2"><i class="fa-solid fa-file-pdf fa-fw"></i></a>

    @can('observaciones-preinscripcion')
    <a class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#miModal" data-placement="top"
            title="Observaciones"  wire:click.prevent="accion({{ $row->id }})"><i class="fa-solid fa-comment fa-fw"></i></a>
    @endcan 

    {{-- 
        <a href="{{ url('preinscripcion/observaciones/' . $row->id) }}" data-toggle="tooltip" data-placement="top"
            title="Observaciones" class="btn btn-dark mr-2"><i class="fa-solid fa-comment fa-fw"></i></a>
    --}}


    <div class="modal" tabindex="-1" role="dialog" id="modalInscribir">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title badge badge-success"> <i
                            class="fa-solid fa-fw fa-fw fa-check"></i>CONFIRMACIÓN</h5>
                    <!--                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                </div>
                <div class="modal-body">
                    <p class="text-center" id="mensaje2"></p>
                </div>
                <div class="modal-footer" style="justify-content: center;">
                    <a href="/preinscripcion/{{ $row->id }}/inscribir" form="registro" type="button"
                        class="btn btn-primary">Sí</a>
                    <a class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">No</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validarInscribir() {

            MENSAJE2 = "¿Está seguro de inscribir el proyecto?";
            $("#mensaje2").html(MENSAJE2);
            $("#modalInscribir").modal('show');
        }
    </script>


    @if (session()->has('message'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '',
                text: "{!! session('message') !!}",
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: '',
                text: "{!! session('error') !!}",
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    {{-- @if (session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('error') }}
    </div>
    @endif --}}

    {{-- <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script> --}}
    <script>
        window.addEventListener('close-modal', event => {
            $(".btn-secondary").click();
        });
    </script>

    <div wire:ignore.self class="modal fade" id="miModal" tabindex="-1" aria-labelledby="exampleModal2Label"
        aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="margin-top: 5rem;">
                <div class="modal-header bg-success d-flex justify-content-center text-center" style="height:3rem">
                    <h5 class="modal-title text-center" id="config-titulo">
                        <div wire:ignore>
                            <i class="fa-solid fa-edit fa-fw"></i><label>Observaciones</label>
                        </div>
                    </h5>
                </div>

                <form wire:submit.prevent="updateObservaciones" method="POST">
                    @csrf
                    <div class="modal-body">
                        <fieldset class="border border-success border-2 p-3 rounded">

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-12 mx-auto">
                                    <div class="form-group">
                                        <label for="name" class="mt-4 required">Observaciones</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" wire:model.defer="observaciones" rows="3"></textarea>
                                        {{-- <input type="textarea"  class="form-control"
                                            maxlength="500"> --}}
                                        @error('observaciones')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </fieldset>

                    </div>
                    <div class="modal-footer mt-1 justify-content-center" style="background-color:#f5f5f5">
                        <button type="button" wire:click.prevent="updateObservaciones()" class="btn btn-success"><i
                                class="fa-solid fa-floppy-disk fa-fw"></i>Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                class="fa-solid fa-xmark fa-fw"></i>Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    




</div>
