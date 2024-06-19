    <!-- Modal Guardar -->

    <div class="modal" tabindex="-1" role="dialog" id="modalLineaInves">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title badge badge-primary"><i class="fa-solid fa-plus fa-fw"></i>AGREGAR LÍNEA DE INVESTIGACIÓN</h5>

                    <!--                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                </div>
                <div class="modal-body">
                    <form action="/lineainves" method="POST" id="lineainvescrear">
                        @csrf
                        <div class="form-group">

                            <div class="col">
                                <label for="nombre_lineainves" class="mt-4">Código</label>
                                <input type="text" class="form-control col-md-7" id="nombre_lineainves" name="nombre_lineainves" maxlength="50" tabindex="2" required>
                            </div>

                            <div class="col">
                                <label for="descripcion" class="mt-4">Nombre Línea Investigación</label>
                                <input type="text" class="form-control col-md-7" id="descripcion" name="descripcion" maxlength="50" tabindex="2" required>
                            </div>

                            <div class="col">
                                <label for="PNF_id" class="mt-4">PNF</label>
                                <select name="PNF_id" id="PNF_id" class="form-select col-md-9" style="display:flex">
                                    <option value="">-- Escoja una opción --</option>
                                    @foreach ($pnf as $pnf)
                                    <option value="{{$pnf['id']}}">{{$pnf['nombre_PNF']}}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                </div>

                <div class="modal-footer mt-4">
                    <button type="submit" form="lineainvescrear" type="button" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
    </form>

    <script>
        function crearLineaInves() {
                        $("#modalLineaInves").modal('show');
                    }
                    //end function validarGuardar
    </script>

    <!-- Modal Guardar-->