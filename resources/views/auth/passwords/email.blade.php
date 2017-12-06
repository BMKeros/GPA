<!DOCTYPE html>
<html lang="es">

@section('title')
    Cambiar Contraseña
@stop
@include('layouts.head')

<body style="background:#F7F7F7;">

<div class="">
    <a class="hiddenanchor" id="toregister"></a>

    <div id="wrapper">
        <div class="animate form">
            <section class="login_content">
                @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}        
                        </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                     <h1>Cambiar Contraseña</h1>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Correo</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Enviar
                            </button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

</body>

</html>