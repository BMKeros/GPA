<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
=======
<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body style="background:#F7F7F7;">

    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
    	<div class="animate form">
	        <section class="login_content">
				<form>
					<h1>Inicio de seción</h1>
					<div>
						<input type="text" class="form-control" placeholder="Usuario" required="" />
					</div>
					<div>
						<input type="password" class="form-control" placeholder="Contraseña" required="" />
					</div>
					<div>
						<a class="btn btn-default submit" href="index.html">Entrar</a>
						<a class="reset_pass" href="#">Olvidaste tu contraseña</a>
					</div>
					<div class="clearfix"></div>
					<div class="separator">
						<p class="change_link">Eres nuevo en el sitio?
						<a href="/register" class="to_register"> Crea una cuenta </a>
						</p>
						<div class="clearfix"></div>
						<br />
						<div>
							<p>©2017 Todos lo derechos reservados.</p>
						</div>
					</div>
				</form>
	        </section>
        
    	</div>
  </div>

</body>

</html>
>>>>>>> bf2ad80cf8f889aa3d6a5de8f464efb8c7124842
