@extends('../layouts.admin')

@section('content')

    <div class="card">
        <div class="col-md-12">
            <div class="card-header card-header-primary" style="background:#383131">
                <h4>
                    Nuevo Rol
                    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-info pull-right">Listar</a>
                </h4>
            </div>
            <div class="card-body">
                @include('roles.fragment.error')

                {{  Form::open(['route' => 'roles.store']) }}

                    @include('roles.fragment.form')

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection