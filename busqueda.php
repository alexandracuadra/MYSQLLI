<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>lista y insercion de datos</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo3.css">	
	<script src="js/metodos.js"></script>
</head>
<body>
			
			
			
			<table class='table'>
				<tr>
					<th>Id</th><th>Nombre</th><th>Edad</th><th>Direccion</th><th>Correo</th><th>Telefono</th><th><span class='glyphicon glyphicon-wrench'></span></th>
				</tr>			
<?php
			$mysqli = new mysqli("localhost", "root", "1234", "agenda");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
				
				}
			$nombre = $mysqli->real_escape_string($_POST['buscar']);
			$consulta= "SELECT * FROM contactos where nombre like'$nombre%' ";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td>";	
					echo"<td>";						
				    echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-nombre='" .$fila[1] ."' data-edad='" .$fila[2] ."' data-direccion='" .$fila[3] ."' data-correo='" .$fila[4]."' data-direccion='" .$fila[5]."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
					echo "<a class='btn btn-danger' href='elimina.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
					echo "</td>";
					echo "</tr>";
				}
				$resultado->close();
			}
			$mysqli->close();			
			
	

?>
	        </table>
		</div> 


<div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Contacto</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="actualiza.php" method="POST">                       		
                       		        
                       		        <input  id="id" name="id" type="hidden" ></input>   		
		                       		<div class="form-group">
		                       			<label for="nombre">Nombre:</label>
		                       			<input class="form-control" id="nombre" name="nombre" type="text" require=""></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="edad">Edad:</label>
		                       			<input class="form-control" id="edad" name="edad" type="text" require=""></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="direccion">Direccion:</label>
		                       			<input class="form-control" id="direccion" name="direccion" type="text" require=""></input>
									   </div>
									   <div class="form-group">
		                       			<label for="correo">Correo</label>
		                       			<input class="form-control" id="correo" name="correo" type="text" require=""></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="telefono">Direccion:</label>
		                       			<input class="form-control" id="telefono" name="telefono" type="text" require=""></input>
		                       		</div>

									<input type="submit" class="btn btn-success">							
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
</div> 



	</div>
	<a href="listar.php">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>		
	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('nombre')
		  var recipient2 = button.data('edad')
		  var recipient3 = button.data('direccion')
		  var recipient4 = button.data('correo')
		  var recipient5 = button.data('telefono')
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #nombre').val(recipient1)
		  modal.find('.modal-body #edad').val(recipient2)
		  modal.find('.modal-body #direccion').val(recipient3)		 
		  modal.find('.modal-body #correo').val(recipient4)
		  modal.find('.modal-body #telefono').val(recipient5)		
		});
		
	</script>
Pagina principal
    </a>
</body>
</html>