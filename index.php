<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>login de agenda</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo2.css">
</head>
<body class="centro">
		<header>
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
						<span class="sr-only">Desplegar / Ocultar Menu</span>	
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">CRUD Sys</a>
				</div>
				<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navegacion-fm">
					<ul class="nav navbar-nav">
						<li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>							
						<li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span>Registrarse</a></li>						
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href='#'><span class='glyphicon glyphicon-user'></span></a></li>										      
				    </ul>			
				</div>
				</div>
			</div>
		</nav>
		<div class="container">
		<div class="row">
			<div class="col-md-4">
				<form action="index.php" method="post">
					<div class="form-group" align="center">	
						<label for="usu">Usuario:</label>
						<input class="form-control" id="usu" type="text" placeholder="&#128272; usuario"
						       name="txtlogin" required="true" title="Ingrese su nombre de usuario">
					</div>

					<div class="form-group" align="center">
						<label for="pass">Password:</label>
						<input class="form-control" id="pass" type="password" placeholder="&#128272; contraseña"
						       name="txtpass" required="true" title="ingrese su contraseña">
					</div>
					<center>
						<input type="submit" class="btn btn-primary" value="Ingresar">	
					</center>
					
				</form>
				<br>
				<div class="msg" id="msg">
					
				</div>
			</div>
		</div>
	</div>
	</header>	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/metodos.js"></script>
</body>
</html>

<?php
	if(isset($_POST['txtpass'])) 
	{
		session_start();
		//variable de conexion: recibe dirección del host , usuario, contraseña y el nombre base de datos
		$mysqli = new mysqli("localhost", "root", "1234", "agenda") or die ("Error de conexion porque: ".$mysqli->connect_errno);
		// comprobar la conexión 
		if (mysqli_connect_errno()) 
		{
	    	printf("Falló la conexión: %s\n", mysqli_connect_error());
	   		exit();
		}

		$login = $mysqli->real_escape_string($_POST['txtlogin']);	
		$pass = $mysqli->real_escape_string($_POST['txtpass']);
		
		$resultado = $mysqli->query("SELECT * FROM usuario where login='$login' and pass='$pass' and activo!=0");
		$valida=$resultado->num_rows;
		if($valida != 0)
		{
			$datosUsu = $resultado->fetch_row();
			$_SESSION['nombreusu'] = $datosUsu[3];
			$_SESSION['perfil'] = $datosUsu[4];				
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";
		}
		else
		{
			echo 
			"<script> 
				var textnode = document.createTextNode('Usuario ó Password Incorrecto');
				document.getElementById('msg').appendChild(textnode);
			</script>";
			
		}	
	}
	
	
?>

		