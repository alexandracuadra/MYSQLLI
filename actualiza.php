
<?php

session_start();

	$mysqli = new mysqli("localhost", "root", "1234", "agenda");	
	
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$edad =  $_POST['edad'];
	$direccion =  $_POST['direccion'];
	$correo =  $_POST['correo'];
	$tel =  $_POST['telefono'];


	$sql = $mysqli->query("update tbcontactos set nombre='$nombre', edad=$edad, direccion='$direccion',correo='$correo',telefono='$tel' where id=$id");
?>	

	 <SCRIPT LANGUAGE="javascript"> 
         alert("Contacto Actualizado"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar.php">


