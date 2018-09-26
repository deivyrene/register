@extends('../layouts.admin')

@section('content')

    <div class="card">
        <div class="col-md-12">
            <div class="card-header card-header-primary" style="background: #383131">
                <h4>
                    Editar Edificio
                    <a href="{{ route('edifices.index') }}" class="btn btn-sm btn-info pull-right">Listar</a>
                </h4>
            </div>
            <div class="card-body">
                @include('edifices.fragment.error')

                {{ Form::model($edifices, array('route' => ['edifices.update', $edifices->id], 'method' => 'PUT')) }}

                    @include('edifices.fragment.form')

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection