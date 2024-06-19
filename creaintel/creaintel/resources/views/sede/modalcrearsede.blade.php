    <!-- Modal Guardar -->

    <div class="modal" tabindex="-1" role="dialog" id="modalSede">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title badge badge-primary"><i class="fa-solid fa-plus fa-fw"></i>AGREGAR SEDE</h5>


                    <!--                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                </div>
                <div class="modal-body">
                    <form action="/sede" method="POST" id="sedecrear">
                        @csrf
                        <div class="col">
                            <label for="nombre_sede" class="mt-4">Nueva Sede</label>
                            <input type="text" class="form-control" id="nombre_sede" name="nombre_sede" maxlength="50" tabindex="2" required>
                        </div>
                </div>

                <div class="modal-footer mt-4" style="justify-content: center;">
                    <button type="submit" form="sedecrear" type="button" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
    </form>

    <script>
        function crearSede() {
            $("#modalSede").modal('show');
        }
        //end function validarGuardar
    </script>

    <!-- Modal Guardar-->