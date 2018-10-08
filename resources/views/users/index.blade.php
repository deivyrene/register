@extends('../layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
       
        @include('activities.fragment.info')
        <div class="card">
                <div class="card-header card-header-primary" style="background:#383131">
                    <h4 class="card-title ">
                        Listado de Usuarios de Sistema
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-danger pull-right">Nuevo</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="material-datatables">
                    <div class="table-responsive">
                    <table id="usersystem" class="table table-striped table-no-bordered table-hover" style="width:100%">
                        <thead class="text-default">
                                <tr>
                                    <th width="20px">ID</th>
                                    <th>Nombre Usuario</th>
                                    <th>Correo</th>
                                    <th>Rol Usuario</th>
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