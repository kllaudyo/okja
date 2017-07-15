@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2 mr-auto ml-auto">
        <div class="card">
            <div class="card-header">Registre-se</div>
            <div class="card-block">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('empresa') ? ' has-error' : '' }}">
                        <label for="empresa" class="col-md-4 control-label"><strong>Nome de Família:</strong></label>
                        <div class="col-md-12">
                            <input id="empresa" type="text" class="form-control" name="empresa" value="{{ old('empresa') }}" required autofocus />
                            @if ($errors->has('empresa'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('empresa') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                        <label for="usuario" class="col-md-4 control-label"><strong>Nome:</strong></label>

                        <div class="col-md-12">
                            <input id="usuario" type="text" class="form-control" name="usuario" value="{{ old('usuario') }}" required />

                            @if ($errors->has('usuario'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('usuario') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label"><strong>E-Mail:</strong></label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required />

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label"><strong>Senha:</strong></label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" required />

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="col-md-4 control-label"><strong>Confirmar a senha:</strong></label>

                        <div class="col-md-12">
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
