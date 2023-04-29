  <!-- Modal -->
  <div class="modal fade" id="modelId" name="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title ">Proceso de confirmar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Desea eliminar el siguiente registro <h2 id="ids">...</h2> <label for="" id="names"></label>
                    <input id="idsdelete" type="hidden" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" onclick="eliminarDatosGeneral('users/<?php echo $this->mensajeAccion; ?>/')">Si</button>
                </div>
            </div>
        </div>
    </div>