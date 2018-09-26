<div id="searchVisitor">
<br>
<br>
<div class="row">    
        <div class="col"></div>
                              <div class="col-xs-3">
                                <div class="input-group">
                                  <input type="text" name="rutVisitor" id="rutVisitor" placeholder="Ingrese Run" class="form-control">
                                  <span class="input-group-btn">
                                    <button class="btn btn-sm btn-default" id="searchRun" type="button">Buscar</button>
                                  </span>
                                </div>
                              </div> 
        <div class="col"></div>       
</div>
</div>
<div id="registerVisitor" style="display: none">
        <input type="hidden" name="flag" id="flag" value="0">
        <input type="hidden" name="visitor_id" id="visitor_id" value="0">
        <div class="row">
                <div class="col-sm form-group">
                        <label for="nameVisitor">Nombres</label>
                        <input type="text" name="nameVisitor" id="nameVisitor" class="form-control">
                </div>
                <div class="col-sm form-group">
                        <label for="surnameVisitor">Apellidos</label>
                        <input type="text" name="surnameVisitor" id="surnameVisitor" class="form-control">
                </div>
        </div>
        <div class="row">
                <div class="col-sm form-group">
                        <label for="rutVisitor">Rut</label>
                        <input type="text" name="rutVisitor" id="rutVisitorForm" class="form-control">
                </div>
                <div class="col-sm form-group">
                        <label for="emailVisitor">Email</label>
                        <input type="text" name="emailVisitor" id="emailVisitor" class="form-control">
                </div>
        </div>
        <div class="row">
                <div class="col-sm form-group">
                        <label for="addressVisitor">Direccion</label>
                        <input type="text" name="addressVisitor" id="addressVisitor" class="form-control">
                </div>
                <div class="col-sm form-group">
                        <label for="phoneVisitor">Telefono</label>
                        <input type="text" name="phoneVisitor" id="phoneVisitor" class="form-control">
                </div>
        </div>

        <div class="row">
                <div class="col-sm form-group">
                        <label for="place_id">Oficina</label>
                        <select class="form-control" name="place_id" id="place_id">
                                        <option value="0">Seleccione</option>
                                @foreach($places as $place)
                                        <option value="{{ $place->id }}" >{{$place->namePlace}}</option>
                                @endforeach
                        </select>
                </div>
                <div class="col-sm form-group">
                        <label for="comments">Motivo visita</label>
                        <input type="text" name="comments" id="comments" class="form-control">
                </div>
        </div>
        <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-2">
                        <div class="form-group">
                                <button class="btn btn-danger" id="saveVisitor" type="button">Guardar</button>
                        </div>
                </div>
                <div class="col-sm-5"></div>
        </div>
</div>
        