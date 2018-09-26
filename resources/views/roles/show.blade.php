@extends('../layouts.admin')

@section('content')

    <div class="card">
        <div class="col-md-12">
            <div class="card-header card-header-primary" style="background:#383131">
                <h2>
                    Detalle Rol
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning pull-right">Editar</a>
                </h2>
            </div>
            
            <div class="card-body">
                <h4 for="card-title">Nombre:</h4>
                <p class="card-description"> {{ $role->nameRole }} </p>
            </div>
            
            <div class="card-body">
                <h4 for="card-title">Descricion:</h4>
                <p class="card-description"> {{ $role->descriptionRole }} </p>
            </div>

        </div>
    </div>
@endsection