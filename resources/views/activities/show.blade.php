@extends('../layouts.admin')

@section('content')

    <div class="card">
        <div class="col-md-12">
            <div class="card-header card-header-primary" style="background:#383131">
                <h2>
                    Detalle de Actividad
                    <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-warning pull-right">Editar</a>
                </h2>
            </div>

            <div class="card-body">
                <h4 class="card-title">Nombre</h4>
                <p class="card-description"> {{ $activity->nameActivity }} </p>
            </div>

            <div class="card-body">
                <h4 class="card-title">Descripción</h4>
                <p class="card-description"> {{ $activity->shortActivity }} </p>
            </div>

        </div>
    </div>
@endsection