@extends('../layouts.admin')

@section('content')

    <div class="card">
        <div class="col-md-12">
            <div class="card-header card-header-primary" style="background:#383131">
                <h2>
                    Detalle de Edificio
                    <a href="{{ route('edifices.edit', $edifices->id) }}" class="btn btn-warning pull-right">Editar</a>
                </h2>
            </div>

            <div class="card-body">
                <h4 class="card-title">Nombre</h4>
                <p class="card-description"> {{ $edifices->nameEdifice }} </p>
            </div>

            <div class="card-body">
                <h4 class="card-title">Encargado</h4>
                <p class="card-description"> {{ $edifices->contactEdifice}} </p>
            </div>

            <div class="card-body">
                <h4 class="card-title">Dirección</h4>
                <p class="card-description"> {{ $edifices->addressEdifice }} </p>
            </div>

            <div class="card-body">
                <h4 class="card-title">Email</h4>
                <p class="card-description"> {{ $edifices->emailEdifice }} </p>
            </div>


        </div>
    </div>
@endsection