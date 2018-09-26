<div class="row">
        <div class="col-sm form-group">
                {{ Form::label('dateRegisterActivities', 'Fecha Registro') }}
                {{ Form::date('dateRegisterActivities', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
        </div>
        <input type="hidden" name="codActivity" id="codActivity" value="{{ $clave }}">
        
        <div class="col-sm form-group">
                {{ Form::label('consultants_id', 'Consultor') }}
                <select class="form-control" name="consultants_id" id="consultants_id">
                                <option value="0">Seleccione</option>
                        @foreach($consultants as $consultant)
                                <option value="{{ $consultant->id }}" >{{$consultant->nameConsultant}}</option>
                        @endforeach
                </select>
        </div>

        <div class="col-sm form-group">
                {{ Form::label('companies_id', 'Empresa') }}
                <select class="form-control" name="companies_id" id="companies_id">
                                <option value="0">Seleccione</option>
                        @foreach($companies as $company)
                                <option value="{{ $company->id }}" >{{$company->nameCompany}}</option>
                        @endforeach
                </select>
        </div>
</div>
<div class="row">
        <div class="col-sm-3 form-group">
                {{ Form::label('businessuser', 'Usuarios') }}
                <select class="form-control" name="businessuser_id" id="businessuser_id">
                                <option value="0">Seleccione</option>
                </select>
        </div>

        <div class="col-sm-2 form-group">
                {{ Form::label('activities_id', 'Actividad') }}
                <select class="form-control" name="activities_id" id="activities_id">
                                <option value="0">Seleccione</option>
                        @foreach($activities as $activity)
                                <option value="{{ $activity->id }}" >{{$activity->nameActivity}}</option>
                        @endforeach
                </select>
        </div>
        <div class="col-sm-3 form-group">
                {{ Form::label('desRegisterActivity', 'Estatus') }}
                {{ Form::text('desRegisterActivity',null, ['class' => 'form-control']) }}
        </div>

        <div class="col-sm-2 form-group">
                {{ Form::label('dateRegisterActivity', 'Fecha') }}
                {{ Form::date('dateRegisterActivity', \Carbon\Carbon::now(), ['class' => 'form-control']) }}               
        </div>

        <div class="col-sm-2 form-group">
                <br>
                <a href="#" id="saveActivity" class="btn btn-success pull-right"><i class="material-icons">save</i></a>
        </div>

</div>
<hr>
<div class="row card-body">
        <div class="col-sm-1"></div>
        <div class="table-responsive col-sm-10">
        <table class="table table-hover">
            <thead class="text-default">
                <tr>
                    <td>Nombre Usuario</td>
                    <td>Actividad</td>
                    <td>Estatus</td>
                    <td>Fecha</td>
                    <td>Acción</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
        <div class="col-sm-1"></div>
</div>

<center>
<div class="form-group">
                <a href="{{ route('registeractivities.index') }}" class="btn btn-info ">GUARDAR</a>
</div>
</center>
        