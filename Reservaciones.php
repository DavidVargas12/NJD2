<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);
	$db = new mysqli('localhost', 'root', '');
		if($db->connect_errno){
		  echo "No se ha podido conectar al servidor";
		  die("**Error: $db->connect_errno");
		}
	$db->select_db('tienda');
	$db->set_charset="utf8";

	// If form submitted, insert values into the database.
	if (isset($_REQUEST['Nombre'])){
	        // removes backslashes 

		$Nombre = stripslashes($_REQUEST['Nombre']);
		$Nombre = mysqli_real_escape_string($db,$Nombre); 

		$Telefono = stripslashes($_REQUEST['Telefono']);
		$Telefono = mysqli_real_escape_string($db,$Telefono);

		$Correo = stripslashes($_REQUEST['Correo']);
		$Correo = mysqli_real_escape_string($db,$Correo);
                
                $Fecha_reserva = stripslashes($_REQUEST['Fecha_reserva']);
		$Fecha_reserva = mysqli_real_escape_string($db,$Fecha_reserva);
                
                $Num_personas = stripslashes($_REQUEST['Num_personas']);
		$Num_personas = mysqli_real_escape_string($db,$Num_personas);

		//COMPROBAR SI EL EMAIL INTRODUCIDO YA EXISTE EN LA BD:
		$check = "SELECT email FROM reservaciones WHERE Nombre='$Nombre'";
			$result = mysqli_query($db,$check);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			 
			if(mysqli_num_rows($result) == 1) {
				
			}else{
		        $query = "INSERT into `reservaciones` (Nombre, Telefono, Correo, Fecha_reserva, Num_personas) VALUES ('$Nombre', '".($Telefono)."', '$Correo', '$Fecha_reserva','$Num_personas )";
		        $result = mysqli_query($db,$query);
	        
		        if($result){
		            echo "<div class='form'>
					<h3>Se ha realizado tu reserva.</h3>
					<br/>Haz click para reservar <a href='Reservaciones.php'>Reservar</a></div>";
		        }else{
		        	echo "<div class='form'>
					<h3>ERROR.</h3>
					</div>";
				}
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Realiza tu reserva</title>
	<link rel="stylesheet" type="text/css" href="estilos/styleRegistro.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">﻿

</head>
<body>
	<div class="panelSuperior">
		<h2>Realiza tu reserva</h2>
	</div>
	<div class="panelLog">
		<div class="boxLog">
                    <form  class="form" action="Reservacionessql.php" method="POST" class="formulario">
				<div class="form-group">
					<label>Nombre</label>
					<input type="text" class="form-control" name="Nombre" placeholder="Introduce tu nombre" required>
				</div>
				<div class="form-group">
					<label>Telefono</label>
					<input type="text" class="form-control" name="Telefono" placeholder="Introduce tu contacto" required>
				</div>
				<div class="form-group">
					<label>Correo</label>
                                        <input type="text" class="form-control" name="Correo" placeholder="Introduce tu correo" required>
				</div>
				<div class="form-group">
					<label>Fecha de reserva</label>
                                        <input type="date" class="form-control" name="Fecha_reserva" id="psw" placeholder="Introduce una fecha" required>
				</div>
				<div class="form-group">
					<label>Numero de personas</label>
                                        <input type="text" class="form-control" name="Num_personas" placeholder="Cantidad de personas" required>
				</div>
				
				<button type="Nombre" name="Nombre" class="btn btn-success" id="reserva">Reservar</button>
			</form>
                    <a href="tienda.php" class="login">Volver</a>
           
		</div>
	</div>

</body>
</html>