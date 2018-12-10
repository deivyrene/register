@extends('../layouts.app')

@section('content')

@extends('condominium.fragment.searchData')


<header style="height: 60px; background-color:#292929">
                
</header>
<section style="background-image: url('landing/img/header.jpg'); background-repeat: no-repeat;
background-size: 100% 100%; display: flex; flex-direction: column; height: 100%;">
<div class="container my-auto" style="text-align:center">
        <div class="col-sm" >
                <div id="registerVisitor" style="display: none; margin-top:-50px;  background:#FFFFFF; border: 2px solid #111111; padding: 20px; border-radius: 15px;">
                        <input type="hidden" name="flag" id="flag" value="0">
                        <input type="hidden" name="visitor_id" id="visitor_id" value="0">
                        <div class="row">
                                <div class="col-md input-group">
                                        <input type="text" name="rutVisitor" style="text-transform:uppercase" title="Run" id="rutVisitorForm" placeholder="Run" maxlength="9"  class="form-control">
                                        <div class="input-group-append">
                                                <button class="form-control" id="searchRun" type="button">Send</button>
                                        </div>
                                </div>
                                <div class="col-md form-group">
                                        <input type="text" disabled name="nameVisitor" title="Nombres" id="nameVisitor" placeholder="Nombres" class="form-control">
                                </div>
                                <div class="col-md form-group">
                                        <input type="text" disabled name="surnameVisitor" title="Apellidos" id="surnameVisitor" placeholder="Apellidos" class="form-control">
                                </div>
                       
                                <div class="col-sm form-group">
                                        <input type="text" disabled name="companyVisitor" title="Empresa" id="companyVisitor" list="huge_list" placeholder="Empresa" class="form-control">
                                        <datalist id="huge_list"></datalist>
                                </div>  
                                <div class="col-sm form-group">
                                        <select disabled class="form-control" name="place_id" id="place_id">
                                                        <option value="0">Oficina</option>
                                        </select>
                                </div>
                                <div class="col-sm form-group" style="margin-top: 6px;">
                                                <button disabled class="btn btn-sm btn-primary" id="saveVisitor" type="button">Registrar</button>
                                </div>  
                        </div>
                </div> 
        </div>
                  
        
        <div class="row" style="margin-top: 20px;" id="tableFirst">
            <div class="col-lg" style="padding: 15px; background:#292929; border-radius:10px; " id="visitorsList" >
                <div class="card-header card-header-primary" style="background:#e2e2e2; color:black">
                    
                            Visitas Recientes al {{ Carbon\Carbon::now()->format('d/m/Y')}}

                            <a href="#" id="viewForm" class="btn btn-sm btn-danger pull-right">Ingresar</a>     
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

        <div class="row" style="margin-top: 20px; display: none" id="tablePlaces">
                <div class="col-lg" style="padding: 15px; background:#292929; border-radius:10px; " id="visitorsList" >
                    <div class="card-header card-header-primary" style="background:#e2e2e2; color:black">
                        
                                Listado de Oficinas 
                        
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

    <div style="margin-top: 20px; background:#292929; background-color:#FFFFFF; border-radius: 15px 15px 15px 15px">    
        <h4>
            Edificio: {{ Auth::user()->nameEdifice() }}
            
            | {{ Auth::user()->nameRole() }} : {{ Auth::user()->name }}
                                            
            | {{ Carbon\Carbon::now()->format('d/m/Y')}}
            
        </h4>
    </div>
</div>
</section>
<!-- Footer -->
<footer class="page-footer bg-dark text-white">
  
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3"><img class="logo" src="landing/img/footer-logo.png" alt="Asesorias Computacionales Sipcom Limitada"></div>
        <!-- Copyright -->
      
</footer>
<!-- Footer -->

@endsection