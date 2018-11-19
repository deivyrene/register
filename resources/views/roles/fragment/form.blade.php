<div class="form-group">
    {{ Form::label('nameRole', 'Nombre rol') }}
    {{ Form::text('nameRole', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
        {{ Form::label('descriptionRole', 'Cargo rol') }}
        {{ Form::text('descriptionRole', null, ['class' => 'form-control', 'required']) }}
</div>


<div class="form-group">
         {{ Form::submit('ENVIAR', ['class' => 'btn btn-warning']) }}
</div>