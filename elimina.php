<?php

session_start();
if(isset($_SESSION['nombreusu']))
{
	$id = $_GET['id'];
	$mysqli = new mysqli("localhost", "root", "1234", "agenda");		
	$sql = $mysqli->query("delete from contactos where id='$id'");	
	echo "<script language='javascript'> alert('Contacto eliminado'); </script>";
	echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";
}
else
	{
			echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
	}		 

?>
 