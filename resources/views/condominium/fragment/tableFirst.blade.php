    <div class="row" style="margin-top: 100px;" id="tableFirst">
        <div class="col-lg" style="padding: 15px; background:#292929; border-radius:10px; " id="visitorsList" ">
            <div class="card-header card-header-primary" style="background:#007bff">
                <h4 class="card-title ">
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