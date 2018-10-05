@extends('../layouts.app')

@section('content')

@extends('condominium.fragment.searchRun')
@extends('condominium.fragment.searchData')

<header class="masthead text-center text-white d-flex">
        <div class="container my-auto">
            <div class="row" >
                   
                    <div class="col-md">
                        <div id="registerVisitor" style="display: none; background:#FFFFFF; margin-top:100px; border: 2px solid #fb6816; padding: 20px; border-radius: 15px;">
                            <br><br>
                                <h4 style="color:black">
                                        Datos Básicos
                                </h4><br>
                                <input type="hidden" name="flag" id="flag" value="0">
                                <input type="hidden" name="visitor_id" id="visitor_id" value="0">
                                <div class="row">
                                        <div class="col-sm form-group">
                                                <input type="text" name="nameVisitor" id="nameVisitor" placeholder="Nombres" class="form-control">
                                        </div>
                                        <div class="col-sm form-group">
                                                <input type="text" name="surnameVisitor" id="surnameVisitor" placeholder="Apellidos" class="form-control">
                                        </div>
                                        <div class="col-sm form-group">
                                                <input type="text" name="rutVisitor" id="rutVisitorForm" placeholder="Run" maxlength="9"  class="form-control">
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm form-group">
                                                <input type="text" name="emailVisitor" id="emailVisitor" placeholder="Email" class="form-control">
                                        </div>
                                        <div class="col-sm form-group">
                                                <input type="text" name="addressVisitor" id="addressVisitor" placeholder="Direccion" class="form-control">
                                        </div>
                                        
                                        <div class="col-sm form-group">
                                                <input type="text" name="phoneVisitor" id="phoneVisitor" placeholder="Fono" class="form-control">
                                        </div>   
                                                   
                                        <div class="col-sm form-group">
                                                <input type="text" name="companyVisitor" id="companyVisitor" placeholder="Empresa" class="form-control">
                                        </div>
                                </div><br>
                                <h4 style="color:black">
                                        Información interna
                                </h4><br>
                                <div class="row">  
                                        <div class="col-sm form-group">
                                                <select class="form-control" name="place_id" id="place_id">
                                                                <option value="0">Oficina</option>
                                                        @foreach($places as $place)
                                                                <option value="{{ $place->id }}" >{{$place->numberPlace." - ".$place->namePlace}}</option>
                                                        @endforeach
                                                </select>
                                        </div>
                                        <div class="col-sm form-group">
                                                <input type="text" name="comments" id="comments"  placeholder="Motivo visita" class="form-control">
                                        </div>
                                </div><br>
                                <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">
                                                <div class="form-group">
                                                        <button class="btn btn-primary" id="saveVisitor" type="button">Guardar</button>
                                                        <button class="btn btn-danger" id="backRun" type="button">Regresar</button>
                                                </div>
                                        </div>
                                        <div class="col-sm-4"></div>
                                </div><br>
                        </div> 

                    </div>
                        
            </div>
                    
                    <div class="row" style="margin-top: 100px;" id="tableFirst">
                        <div class="col-lg" style="padding: 15px; background:#292929; border-radius:10px; " id="visitorsList" >
                            <div class="card-header card-header-primary" style="background:#e2e2e2; color:black">
                                <h4 class="card-title">
                                        Visitas Recientes al {{ Carbon\Carbon::now()->format('d/m/Y')}}
                                </h4>
                            </div>
                            <table id="visitor"  class="table table-hover table-striped table-dark" >
                                <thead class="thead-dark text-default">
                                        <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Empresa</th>
                                                <th>N°</th>
                                                <th>Oficina</th>
                                                <th>Motivo</th>
                                                <th>Entrada</th>
                                        </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 100px; display: none" id="tableRange">
                            <div class="col-lg" style="padding: 15px; background:#292929; border-radius:10px; " id="visitorsList" >
                                <div class="card-header card-header-primary" style="background:#e2e2e2; color:black">
                                    <h4 class="card-title ">
                                            Consulta de visitas
                                    </h4>
                                </div>
                                <table id="visitorRange"  class="table table-hover table-striped table-dark" >
                                    <thead class="thead-dark text-default">
                                            <tr>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Empresa</th>
                                                    <th>N°</th>
                                                    <th>Oficina</th>
                                                    <th>Motivo</th>
                                                    <th>Entrada</th>
                                            </tr>
                                    </thead>
                                </table>
                            </div>
                    </div>
        </div>
      </header>
  
  
      <!-- Footer -->
      <footer class="page-footer bg-dark text-white">
  
          <!-- Copyright -->
          <div class="footer-copyright text-center py-3"><img class="logo" src="landing/img/footer-logo.png" alt="Asesorias Computacionales Sipcom Limitada"></div>
          <!-- Copyright -->
      
      </footer>
      <!-- Footer -->

@endsection