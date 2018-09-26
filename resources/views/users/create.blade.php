@extends('../layouts.admin')

@section('content')

    <div class="card">
        <div class="col-md-12">
            <div class="card-header card-header-primary" style="background:#383131">
                <h4>
                    Nuevo Usuario de Sistema
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-info pull-right">Listar</a>
                </h4>
            </div>
            <div class="card-body">
                @include('users.fragment.error')

                {{  Form::open(['route' => 'users.store']) }}
                    {{ csrf_field() }}
                    @include('users.fragment.form')

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection