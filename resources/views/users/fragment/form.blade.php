<div class="row">
        <div class=" col-sm form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {{ Form::label('name', 'Nombre Usuario') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}

                @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
        </div>

        <div class=" col-sm form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {{ Form::label('email', 'Email') }}
                @if(isset($userRole))
                        {{ Form::text('email', null, ['class' => 'form-control', 'required', 'id' => 'email' ]) }}
                @else
                        {{ Form::text('email', null, ['class' => 'form-control', 'required', 'id' => 'email' ]) }}
                @endif

                @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
        </div>
</div>

<div class="row">
        <div class="col-sm form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {{ Form::label('password', 'Contraseña') }}
                {{ Form::password('password',  ['class' => 'form-control', 'id' => 'password', 'required']) }}

                @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
        </div>
        
        <div class="col-sm form-group">
                {{ Form::label('password-confirm', 'Confirmar Contraseña') }}
                {{ Form::password('password_confirmation', ['class'=>'form-control','id'=>'password-confirmation', 'required']) }}
        </div>
</div>

<div class="row">
        <div class="col-sm form-group">
        {{ Form::label('role_id', 'Rol usuario') }}
        <select class="form-control" required <?php if(isset($userRole)){ echo "disabled = 'disabled'"; } ?>  name="role_id" id="role_id">
                        <option value="">Seleccione</option>
                @foreach($role as $roles)
                        <option value="<?= $roles->id ?>" <?php if(isset($userRole)){ if($userRole == $roles->id){ echo "selected"; } }?>>{{$roles->descriptionRole}}</option>
                @endforeach
        </select>
        </div>

        <div class="col-sm form-group">
        {{ Form::label('edifice_id', 'Edificio') }}
        <select class="form-control" required disabled = "disabled" name="edifice_id" id="edifice_id">
                        <option value="">Seleccione</option>
                @foreach($edifice as $edifices)
                        <option value="<?= $edifices->id ?>" <?php if(isset($userEdifice)){ if($userEdifice == $edifices->id){ echo "selected"; } }?> >{{$edifices->nameEdifice}}</option>
                @endforeach
        </select>
        </div>

</div>

<div class="form-group">
        {{ Form::submit('guardar', ['class' => 'btn btn-sm btn-warning', 'id' => 'verifyPassword']) }}
</div>