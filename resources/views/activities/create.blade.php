@extends('../layouts.admin')

@section('content')

    <div class="card">
        <div class="col-md-12">
            <div class="card-header card-header-primary" style="background:#383131">
                <h2>
                    Nueva Actividad
                    <a href="{{ route('activities.index') }}" class="btn btn-info pull-right">Listar</a>
                </h2>
            </div>
            <div class="card-body">
                @include('activities.fragment.error')

                {{  Form::open(['route' => 'activities.store']) }}

                    @include('activities.fragment.form')

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection