<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>GPA</title>

	<!-- Bootstrap core CSS -->

	<link href="css/bootstrap.min.css" rel="stylesheet">

	<link href="fonts/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">

	<!-- Custom styling plus plugins -->
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/icheck/flat/green.css" rel="stylesheet">

	<script src="js/jquery.min.js"></script>

</head>

<body style="background:#F7F7F7;">
	
	<div class="">
		<a class="hiddenanchor" id="toregister"></a>
	
		<div id="wrapper">
			<div class="animate form">
				<section class="login_content">
			 		<form method="post" action="{{url('register')}}">
			 		{{csrf_field()}}
						<h1>Registro</h1>
						<div>
				  			<input type="text" class="form-control" placeholder="Nombre de Usuario" required="" name="name" />
						</div>
						<div>
				  			<input type="email" class="form-control" placeholder="correo" required="" name="email"/>
						</div>
						<div>
				  			<input type="password" class="form-control" placeholder="Contraseña" required="" name="password" />
						</div>
						<div>
							<button type="submit" class="btn btn-default submit" >Registrar</button>
				  	
						</div>
						<div class="clearfix"></div>

						<div class="separator">

				  			<p class="change_link">Ya eres miembro ?
							<a href="/login" class="to_register"> Entrar </a>
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
	</div>

</body>

</html>