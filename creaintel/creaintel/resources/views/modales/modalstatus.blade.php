    <!-- Modal Guardar -->

    <div class="modal" tabindex="-1" role="dialog" id="modalStatus" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title badge badge-success">CONFIRMACIÓN</h5>
                    <!--                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                </div>
                <div class="modal-body">
                    <p class="text-center" id="mensaje2"></p>
                </div>
                <div class="modal-footer" style="justify-content:center">

                    <button type="submit" class="btn btn-primary">Sí</button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">No</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validarStatus() {
            MENSAJE2 = "¿Está seguro de cambiar el Status?";
            $("#mensaje2").html(MENSAJE2);
            $("#modalStatus").modal('show');
            
        }
        //end function validarGuardar
    </script>

    <!-- Modal Guardar-->