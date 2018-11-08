@extends('../layouts.app')

@section('content')

@extends('condominium.fragment.searchData')
@extends('condominium.fragment.importData')

<header class="masthead text-center text-white d-flex" style="height: 950px;">
        <div class="container my-auto">
           
                    <div class="col-sm" style="margin-top: -100px;">
                        <div id="registerVisitor" style="background:#FFFFFF; margin-top:100px; border: 2px solid #111111; padding: 20px; border-radius: 15px;">
                                <input type="hidden" name="flag" id="flag" value="0">
                                <input type="hidden" name="visitor_id" id="visitor_id" value="0">
                                <div class="row">
                                        <div class="col-md input-group">
                                                <input type="text" name="rutVisitor" title="Run" id="rutVisitorForm" placeholder="Run" maxlength="9"  class="form-control">
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
                                                <input type="text" name="companyVisitor" title="Empresa" id="companyVisitor" placeholder="Empresa" class="form-control">
                                        </div>  
                                        <div class="col-sm form-group">
                                                <select class="form-control" name="place_id" id="place_id">
                                                                <option value="0">Oficina</option>
                                                        @foreach($places as $place)
                                                                <option value="{{ $place->id }}" >{{$place->numberPlace." - ".$place->namePlace}}</option>
                                                        @endforeach
                                                </select>
                                        </div>
                                        <div class="col-sm form-group" style="margin-top: 6px;">
                                                        <button class="btn btn-sm btn-primary" id="saveVisitor" type="button">Guardar</button>
                                        </div>  
                                </div>
                        </div> 

                    </div>
                        
                    
                    <div class="row" style="margin-top: 20px;" id="tableFirst">
                        <div class="col-lg" style="padding: 15px; background:#292929; border-radius:10px; " id="visitorsList" >
                            <div class="card-header card-header-primary" style="background:#e2e2e2; color:black">
                                
                                        Visitas Recientes al {{ Carbon\Carbon::now()->format('d/m/Y')}}
                                
                            </div>
                            <table id="visitor"  class="table table-hover table-striped table-dark" >
                                <thead class="thead-dark text-default">
                                        <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Empresa</th>
                                                <th>N°</th>
                                                <th>Oficina</th>
                                                <th>Entrada</th>
                                        </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px; display: none" id="tableRange">
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
                                                    <th>Oficina</th>
                                                    <th>Entrada</th>
                                            </tr>
                                    </thead>
                                </table>
                            </div>
                    </div>

                    <div class="row" style="margin-top: 20px; display: none" id="tablePlaces">
                            <div class="col-lg" style="padding: 15px; background:#292929; border-radius:10px; " id="visitorsList" >
                                <div class="card-header card-header-primary" style="background:#e2e2e2; color:black">
                                    <h4 class="card-title ">
                                            Listado de Oficinas 
                                    </h4>
                                </div>
                                <table id="place"  class="table table-hover table-striped table-dark" >
                                    <thead class="thead-dark text-default">
                                            <tr>
                                                        <th width="20px">Oficina</th>
                                                        <th>Empresa</th>
                                                        <th>Contacto</th>
                                                        <th>Phono</th>
                                                        <th>Email</th>
                                                        <th>Edificio</th>
                                                        <th>-</th>
                                            </tr>
                                    </thead>
                                </table>
                            </div>
                    </div>

                <div style="margin-top: 20px; background:#292929; border-radius: 15px 15px 15px 15px">    
                    <h4>
                        Edificio: {{ Auth::user()->nameEdifice() }}
                        
                        | {{ Auth::user()->nameRole() }} : {{ Auth::user()->name }}
                                                        
                        | {{ Carbon\Carbon::now()->format('d/m/Y')}}
                        
                    </h4>
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