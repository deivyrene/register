@extends('../layouts.admin')

@section('content')

    <div class="card">
        <div class="col-md-12">
            <div class="card-header card-header-primary" style="background: #383131">
                <h4>
                    Editar Visitor
                    <a href="{{ route('visitors.index') }}" class="btn btn-sm btn-info pull-right">Listar</a>
                </h4>
            </div>
            <div class="card-body">
                @include('visitors.fragment.error')

                {{ Form::model($visitor, array('route' => ['visitors.update', $visitor->id], 'method' => 'PUT')) }}

                    @include('visitors.fragment.form')

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection