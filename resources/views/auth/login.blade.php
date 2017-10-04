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
						<a class="btn btn-default submit" href="index.html">Entar</a>
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
