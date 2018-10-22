<div class="row">
<div class="col-sm form-group">
        {{ Form::label('numberPlace', 'N° Oficina: ') }}
        {{ Form::text('numberPlace', null, ['class' => 'form-control']) }}
</div>

<div class=" col-sm form-group">
        {{ Form::label('namePlace', 'Empresa: ') }}
        {{ Form::text('namePlace', null, ['class' => 'form-control']) }}
</div>
</div>

<div class="row">
<div class="col-sm form-group">
        {{ Form::label('phonePlace', 'Phono: ') }}
        {{ Form::text('phonePlace', null, ['class' => 'form-control']) }}
</div>

<div class="col-sm form-group">
        {{ Form::label('mailPlace', 'Email: ') }}
        {{ Form::text('mailPlace', null, ['class' => 'form-control']) }}
</div>
</div>

<div class="row">
<div class="col-sm form-group">
        {{ Form::label('ownerPlace', 'Contacto: ') }}
        {{ Form::text('ownerPlace', null, ['class' => 'form-control']) }}
</div>

@if($preEdifice === "false")
<div class="col-sm form-group">
        {{ Form::label('edifice_id', 'Edificio: ') }}
        <select class="form-control" name="edifice_id" id="edifice_id">
                        <option value="0">Seleccione</option>
                @foreach($edifices as $edifice)
                        <option value="<?= $edifice->id ?>" <?php if(isset($place)){ if($place->edifice_id == $edifice->id){ echo "selected"; } }?>>{{$edifice->nameEdifice}}</option>
                @endforeach
        </select>
</div>
@endif
</div>

<div class="row">
<div class="col-sm-12 form-group text-center">
         {{ Form::submit('GUARDAR', ['class' => 'btn btn-warning']) }}
</div>
</div>