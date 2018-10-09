<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="fechaModalLabel">Consultar Rango Fecha</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                <form method="POST" action="{{ url('import') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                            <input type="file" name="excel"><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 form-group text-center">
                                            <button class="btn btn-danger" >Guardar</button>
                                    </div>
                                </div>
                                </form>
                        </div>
                </div>
        </div>
</div>