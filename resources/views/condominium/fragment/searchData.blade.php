<div class="modal fade" id="buscarFecha" tabindex="-1" role="dialog" aria-labelledby="fechaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="fechaModalLabel">Consultar Rango Fecha</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <div id="searchVisitor" class="row">
                                <div class="col-sm form-group">
                                        <label for="dateIn">Desde: </label>
                                        <input type="date" title="Desde" name="dateIn" id="dateIn" class="form-control" >
                                </div>
                                <div class="col-sm form-group">
                                        <label for="dateOf">Hasta: </label>
                                        <input type="date" title="Hasta" name="dateOf" id="dateOf" class="form-control" >
                                </div>
                        </div> 
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <button class="btn bt-sm btn-primary" id="searchDateRange">Consultar</button>
                            </div>
                        </div>
                </div>
        </div>
</div>