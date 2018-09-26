@extends('../layouts.admin')

@section('content')

    <div class="card">
        <div class="col-md-12">
            <div class="card-header card-header-primary" style="background:#383131">
                <h2>
                    Nuevo Registro de Visitor
                    <a href="{{ route('visitors.index') }}" class="btn btn-sm btn-info pull-right">Volver</a>
                </h2>
            </div>
            <div class="card-body">
                @include('visitors.fragment.error')

                {{  Form::open(['route' => 'visitors.store']) }}

                    @include('visitors.fragment.form')

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection