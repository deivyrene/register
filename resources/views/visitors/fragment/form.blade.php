<div class="row">
        <div class="col-sm form-group">
        {{ Form::label('nameVisitor', 'Nombres') }}
        {{ Form::text('nameVisitor', null, ['class' => 'form-control']) }}
        </div>

        <div class="col-sm form-group">
                {{ Form::label('surnameVisitor', 'Apellidos') }}
                {{ Form::text('surnameVisitor', null, ['class' => 'form-control']) }}
        </div>
</div>

<div class="row">
        <div class="col-sm form-group">
                {{ Form::label('rutVisitor', 'Rut') }}
                {{ Form::text('rutVisitor', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-sm form-group">
                {{ Form::label('emailVisitor', 'Email') }}
                {{ Form::text('emailVisitor', null, ['class' => 'form-control']) }}
        </div>
</div>

<div class="row">
        <div class="col-sm form-group">
                {{ Form::label('phoneVisitor', 'Fono') }}
                {{ Form::text('phoneVisitor', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-sm form-group">
                {{ Form::label('addressVisitor', 'Dirección') }}
                {{ Form::text('addressVisitor', null, ['class' => 'form-control']) }}
        </div>
</div>

<div class="row">
        <div class="col-sm form-group">
                {{ Form::label('companyVisitor', 'Empresa') }}
                {{ Form::text('companyVisitor', null, ['class' => 'form-control']) }}
        </div>
</div>

<div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-2 form-group">
                {{ Form::submit('Guardar', ['class' => 'btn btn-warning']) }}
        </div>
        <div class="col-sm-5"></div>
</div>