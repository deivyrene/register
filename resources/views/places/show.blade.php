@extends('../layouts.admin')

@section('content')

    <div class="card">
        <div class="col-md-12">
            <div class="card-header card-header-primary" style="background:#383131">
                <h4>
                    Importar Excel
                    <a href="{{ route('places.index') }}" class="btn btn-sm btn-info pull-right">Listar</a>
                </h4>
            </div>
            <div class="card-body">
                    <br><br>
                <form method="POST" action="{{ url('import') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2>Cargar archivo excel</h2>
                    </div>
                    <div class="col-sm-12 text-center">
                            <input type="file" onchange="return fileValidation()" id="file" name="excel">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group text-center">
                            <button class="btn btn-danger" >Guardar</button>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>
@endsection