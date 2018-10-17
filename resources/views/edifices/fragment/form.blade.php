<div class="row">
        <div class="col-sm form-group">
                {{ Form::label('nameEdifice', 'Nombre edificio') }}
                {{ Form::text('nameEdifice', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-sm form-group">
                {{ Form::label('addressEdifice', 'Dirección edificio') }}
                {{ Form::text('addressEdifice', null, ['class' => 'form-control']) }}
        </div>

</div>

<div class="row">
        <div class="col-sm form-group">
                {{ Form::label('contactEdifice', 'Administrador Edificio') }}
                {{ Form::text('contactEdifice', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-sm form-group">
                {{ Form::label('emailEdifice', 'Email Administrador') }}
                {{ Form::text('emailEdifice', null, ['class' => 'form-control']) }}
        </div>
</div>

<div class="row">
        <div class="col-sm form-group">
                {{ Form::label('password', 'Contraseña') }}
                {{ Form::text('password', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-sm form-group">
                {{ Form::label('password_confirmation', 'Contraseña') }}
                {{ Form::text('password_confirmation', null, ['class' => 'form-control']) }}
        </div>
</div>

<div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-2 form-group">
                {{ Form::submit('Guardar', ['class' => 'btn btn-warning']) }}
        </div>
        <div class="col-sm-5"></div>
</div>