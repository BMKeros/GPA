<!DOCTYPE html>
<html lang="en">

@section('title')
Login
@stop
@include('layouts.head')

<body style="background:#F7F7F7;">

    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
    	<div class="animate form">
	        <section class="login_content">
				<form method="POST" action="{{ route('login') }}">

                    {{csrf_field()}}
				
                	<h1>Inicio de seción</h1>
					<div>
						<input id="email" type="email" class="form-control" placeholder="Correo" name="email" required="" />
					</div>
					<div>
						<input id="password" type="password" class="form-control" placeholder="Contraseña" name="password" required="" />
					</div>
					<div>
                        <button type="submit" class="btn btn-default" >Entrar</button>
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