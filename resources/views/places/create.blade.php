@extends('../layouts.admin')

@section('content')

    <div class="card">
        <div class="col-md-12">
            <div class="card-header card-header-primary" style="background:#383131">
                <h4>
                    Nueva oficina
                    <a href="{{ route('places.index') }}" class="btn btn-sm btn-info pull-right">Listar</a>
                </h4>
            </div>
            <div class="card-body">
                @include('places.fragment.error')

                {{  Form::open(['route' => 'places.store']) }}

                    @include('places.fragment.form')

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection