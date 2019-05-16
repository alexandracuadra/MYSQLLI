	<?php
			$mysqli = new mysqli("localhost", "root", "1234", "agenda");	
			$nom = $_GET['nombre'];
			$edad = $_GET['edad'];
			$dir = $_GET['direccion'];	
			$corre=		$_GET['correo'];			
			$tel= $_GET['telefono'];	
			$sql = $mysqli->query("insert into contactos (nombre, edad, direccion,correo,telefono) values ('$nom', $edad, '$dir','$corre','$tel') ");			
			
	?>	

		    <SCRIPT LANGUAGE="javascript"> 
            alert("Contacto Registrado"); 
            </SCRIPT> 
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar.php">
