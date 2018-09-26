
@extends('../layouts.admin')

@section('content')
<div class="row">
   <div class="col-md-12">
        @include('places.fragment.info')
        <div class="card">
                <div class="card-header card-header-primary" style="background:#383131">
                    <h4 class="card-title ">
                        Listado de Oficinas
                        <a href="{{ route('places.create') }}" class="btn btn-sm btn-danger pull-right">Nuevo</a>
                        <a href="{{ url('import/get') }}" class="btn btn-sm btn-default pull-right">Importar</a>
                    </h4>
                    
                   <!-- <p class="card-category"> Here is a subtitle for this table</p>-->
                </div>
                <div class="card-body">
                    <div class="material-datatables">
                    <div class="table-responsive">
                    <table id="place" class="table table-striped table-no-bordered table-hover" style="width:100%">
                        <thead class="text-default">
                                <tr>
                                    <th width="20px">Oficina</th>
                                    <th>Empresa</th>
                                    <th>Contacto</th>
                                    <th>Phono</th>
                                    <th>Email</th>
                                    <th>Edificio</th>
                                    <th>Acción</th>
                                </tr>
                        </thead>
                    </table>
                    </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection