@extends('../layouts.admin')

@section('content')

    <div class="card">
        <div class="col-md-12">
            <div class="card-header card-header-primary" style="background:#383131">
                <h2>
                    Detalle de Usuario de Sistema
                    <a href="{{ route('users.edit', $users->id) }}" class="btn btn-warning pull-right">Editar</a>
                </h2>
            </div>

            <div class="card-body">
                <h4 class="card-title">Nombre</h4>
                <p class="card-description"> {{ $users->name }} </p>
            </div>

            <div class="card-body">
                <h4 class="card-title">Email</h4>
                <p class="card-description"> {{ $users->email }} </p>
            </div>

        </div>
    </div>
@endsection