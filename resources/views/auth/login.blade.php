@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 ml-auto mr-auto">

            <form class="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                <div class="card card-login" style="margin-top: 150px">

                        <div class="card-header card-header-danger  text-center">
                             <h4 class="card-title">INGRESAR</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Contraseña</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                                <!--<div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                            </label>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-12 col-md-offset-4 text-center">
                                        <button type="submit" class="btn btn-success">
                                            Login
                                        </button>

                                        <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                                            Olvido su contraseña?
                                        </a>-->
                                    </div>
                                    </div>
                                </div>
                        </div>
                </div>
             </form>
        </div>
    </div>
</div>
@endsection
