@extends('../layouts.admin')

@section('content')

    <div class="card">
        <div class="col-md-12">
            <div class="card-header card-header-primary" style="background: #383131">
                <h4>
                    Editar Rol
                    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-info pull-right">Listar</a>
                </h4>
            </div>
            <div class="card-body">
                @include('roles.fragment.error')

                {{ Form::model($role, array('route' => ['roles.update', $role->id], 'method' => 'PUT')) }}

                    @include('roles.fragment.form')

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection