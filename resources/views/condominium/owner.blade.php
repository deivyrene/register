@extends('../layouts.app')

@section('content')

@extends('condominium.fragment.searchData')
@extends('condominium.fragment.importData')

<header class="masthead text-center text-white d-flex" style="height: 950px;">
        <div class="container my-auto">
           
                  
                    <div class="row" style="margin-top: -200px;" id="tableFirst">
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
                                    
                                            Consulta de visitas
                                    
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