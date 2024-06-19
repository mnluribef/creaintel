   <div class="modal" tabindex="-1" role="dialog" id="modalObservaciones">
       <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title badge badge-success"> <i class="fa-solid fa-fw fa-fw fa-table-columns"></i>FORMULARIO</h5>
                   <!--                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
               </div>
               <!--                                 /preinscripcion/{{$preinscripcion->id}} -->
               <div class="modal-body">
                   <p class="text-center" id="mensaje2"></p>

                   <form action="preinscripcion.observaciones" method="POST" id="observacionesmodal">
                       <table>
                           @csrf
                           <tr>
                               <div class="form-group">
                                   <label for="observaciones">Observaciones</label>
                                   <textarea class="form-control col-md-11" id="observaciones" name="observaciones" maxlength="200" rows="2" placeholder="Ej: " value="{{$preinscripcion->observaciones}}"></textarea>
                               </div>
                           </tr>
                       </table>

               </div>

               <div class="modal-footer" style="justify-content: center;">

                   <button type="submit" form="seccioncrear" type="button" class="btn btn-primary">Guardar</button>
                   
                   <button type="submit" onclick="handleSubmit()" form="observacionesmodal" class="btn btn-primary">Guardar</button>
                   <a class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">Salir</a>
                   </form>
               </div>

               <script>
                   function validarObservaciones() {

                       $("#modalObservaciones").modal('show');
                   }
                   //end function validarGuardar
               </script>