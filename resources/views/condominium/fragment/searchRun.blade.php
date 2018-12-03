<div class="col-sm" >
        <div id="registerVisitor" style="display: none; margin-top:-50px;  background:#FFFFFF; border: 2px solid #111111; padding: 20px; border-radius: 15px;">
                <input type="hidden" name="flag" id="flag" value="0">
                <input type="hidden" name="visitor_id" id="visitor_id" value="0">
                <div class="row">
                        <div class="col-md input-group">
                                <input type="text" name="rutVisitor" style="text-transform:uppercase" title="Run" id="rutVisitorForm" placeholder="Run" maxlength="9"  class="form-control">
                                <div class="input-group-append">
                                        <button class="form-control" id="searchRun" type="button">Buscar</button>
                                </div>
                        </div>
                        <div class="col-md form-group">
                                <input type="text" name="nameVisitor" title="Nombres" id="nameVisitor" placeholder="Nombres" class="form-control">
                        </div>
                        <div class="col-md form-group">
                                <input type="text" name="surnameVisitor" title="Apellidos" id="surnameVisitor" placeholder="Apellidos" class="form-control">
                        </div>
               
                        <div class="col-sm form-group">
                                <input type="text" name="companyVisitor" title="Empresa" id="companyVisitor" list="huge_list" placeholder="Empresa" class="form-control">
                                <datalist id="huge_list"></datalist>
                        </div>  
                        <div class="col-sm form-group">
                                <select class="form-control" name="place_id" id="place_id">
                                                <option value="0">Oficina</option>
                                </select>
                        </div>
                        <div class="col-sm form-group" style="margin-top: 6px;">
                                        <button class="btn btn-sm btn-primary" id="saveVisitor" type="button">Registrar</button>
                        </div>  
                </div>
        </div> 
</div>