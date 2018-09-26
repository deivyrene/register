@extends('../layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
       
        @include('roles.fragment.info')
        <div class="card">
                <div class="card-header card-header-primary" style="background:#383131">
                    <h4 class="card-title ">
                        Listado de role
                        <a href="{{ route('roles.create') }}" class="btn btn-sm btn-danger pull-right">Nuevo</a>
                    </h4>
                    
                   <!-- <p class="card-category"> Here is a subtitle for this table</p>-->
                </div>
                <div class="card-body">
                    <div class="material-datatables">
                        <div class="table-responsive">
                        <table id="role" class="table table-striped table-no-bordered table-hover">
                            <thead class="text-default">
                                    <tr>
                                        <th width="20px">ID</th>
                                        <th>Nombre rol</th>
                                        <th>Descripción rol</th>
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

