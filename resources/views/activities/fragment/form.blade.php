<div class="form-group">
    {{ Form::label('nameActivity', 'Nombre Actividad') }}
    {{ Form::text('nameActivity', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
        {{ Form::label('shortActivity', 'Descripcion Actividad') }}
        {{ Form::text('shortActivity', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
         {{ Form::submit('ENVIAR', ['class' => 'btn btn-warning']) }}
</div>