@extends('../layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
       
        @include('activities.fragment.info')
        <div class="card">
                <div class="card-header card-header-primary" style="background:#383131">
                    <h4 class="card-title ">
                        Listado de Actividades
                        <a href="{{ route('activities.create') }}" class="btn btn-danger pull-right">Nuevo</a>
                    </h4>
                    
                   <!-- <p class="card-category"> Here is a subtitle for this table</p>-->
                </div>
                <div class="card-body">
                    <div class="material-datatables">
                    <div class="table-responsive">
                    <table id="activity" class="table table-striped table-no-bordered table-hover" style="width:100%">
                        <thead class="text-default">
                                <tr>
                                    <th width="20px">ID</th>
                                    <th>Nombre Actividad</th>
                                    <th>Descripción</th>
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