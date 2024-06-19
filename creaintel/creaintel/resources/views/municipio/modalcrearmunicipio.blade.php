    <!-- Modal Guardar -->

    <div class="modal" tabindex="-1" role="dialog" id="modalMunicipio">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title badge badge-primary"><i class="fa-solid fa-plus fa-fw"></i>AGREGAR MUNICIPIO</h5>
                    <!--                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                </div>
                <div class="modal-body">
                    <form action="/municipio" method="POST" id="pnfcrear">
                        @csrf
                        <div class="form-group-row">
                            <label for="nombre_municipio" class="mt-4">Nuevo Municipio</label>
                            <input type="text" class="form-control" id="nombre_municipio" name="nombre_municipio" maxlength="30" tabindex="2" required>
                        </div>
                </div>

                <div class="modal-footer mt-4">
                    <button type="submit" form="pnfcrear" type="button" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
    </form>

    <script>
        function crearMunicipio() {
            $("#modalMunicipio").modal('show');
        }
        //end function validarGuardar
    </script>

    <!-- Modal Guardar-->