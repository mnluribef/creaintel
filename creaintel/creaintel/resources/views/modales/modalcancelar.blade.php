                    <!-- Modal Cancelar -->



                    <div class="modal" tabindex="-1" role="dialog" id="modalMensaje">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title badge badge-warning">ALERTA</h5>
                                    <!--                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                                </div>
                                <div class="modal-body">
                                    <p class="text-center" id="mensaje"></p>
                                </div>
                                <div class="modal-footer" style="justify-content:center">
                                    <a href="{{ URL::previous() }}" type="button" class="btn btn-primary" data-dismiss="modal">Sí</a>
                                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <script>
                        function validarCancelar() {

                            MENSAJE = "¿Está seguro que desea cancelar?. <br> No se guardará ningún cambio.";
                            $("#mensaje").html(MENSAJE);
                            $("#modalMensaje").modal('show');
                        }
                        //end function validarSesion
                    </script>

                    <!-- Modal Cancelar-->