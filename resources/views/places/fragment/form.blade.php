<div class="row">
<div class="col-sm form-group">
        {{ Form::label('numberPlace', 'N° Oficina: ') }}
        {{ Form::text('numberPlace', null, ['class' => 'form-control', 'required']) }}
</div>

<div class=" col-sm form-group">
        {{ Form::label('namePlace', 'Empresa: ') }}
        {{ Form::text('namePlace', null, ['class' => 'form-control' , 'required']) }}
</div>
</div>

<div class="row">
<div class="col-sm form-group">
        {{ Form::label('phonePlace', 'Phono: ') }}
        {{ Form::text('phonePlace', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="col-sm form-group">
        {{ Form::label('mailPlace', 'Email: ') }}
        {{ Form::email('mailPlace', null, ['class' => 'form-control', 'required']) }}
</div>
</div>

<div class="row">
<div class="col-sm form-group">
        {{ Form::label('ownerPlace', 'Contacto: ') }}
        {{ Form::text('ownerPlace', null, ['class' => 'form-control', 'required']) }}
</div>

@if($preEdifice === "false")
<div class="col-sm form-group">
        {{ Form::label('edifice_id', 'Edificio: ') }}
        <select required class="form-control" <?php if(isset($place)){ echo "disabled = 'disabled'"; } ?> name="edifice_id" id="edifice_id">
                        <option value="">Seleccione</option>
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