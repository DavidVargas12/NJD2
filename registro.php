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
	if (isset($_REQUEST['fname'])){
	        // removes backslashes
		$username = stripslashes($_REQUEST['fname']);
		$username = mysqli_real_escape_string($db,$username); 

		$lastname = stripslashes($_REQUEST['lname']);
		$lastname = mysqli_real_escape_string($db,$lastname); 

		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($db,$email);

		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($db,$password);

		//COMPROBAR SI EL EMAIL INTRODUCIDO YA EXISTE EN LA BD:
		$check = "SELECT email FROM users WHERE email='$email'";
			$result = mysqli_query($db,$check);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			 
			if(mysqli_num_rows($result) == 1) {
				echo "<div class='form'>
					<h3>Lo sentimos, el E-mail introducido ya está en uso.</h3></div>";
			}else{
		        $query = "INSERT into `users` (email, password, nombre, apellido) VALUES ('$email', '".($password)."', '$username', '$lastname')";
		        $result = mysqli_query($db,$query);
	        
		        if($result){
		            echo "<div class='form'>
					<h3>Te has registrado satisfactoriamente.</h3>
					<br/>Haz click para acceder <a href='login.php'>Login</a></div>";
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
	<title>Registrate</title>
	<link rel="stylesheet" type="text/css" href="estilos/styleRegistro.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">﻿
		<script>
		window.onload = function() {

			$("#registrarse").click(function() {
				var password = document.getElementById("psw").length;

				if(password <= 7) {
					document.getElementById("error").innerHTML = "Contraseña demasiado corta, al menos 8 caracteres.";
				}

			});
		}
		</script>
</head>
<body>
	<div class="panelSuperior">
		<h2>Crea una cuenta</h2>
	</div>
	<div class="panelLog">
		<div class="boxLog">
			<form  class="form" action="registro.php" method="POST" class="formulario">
				<div class="form-group">
					<label>Nombre</label>
					<input type="text" class="form-control" name="fname" placeholder="Introduce tu nombre" required>
				</div>
				<div class="form-group">
					<label>Apellido</label>
					<input type="text" class="form-control" name="lname" placeholder="Introduce tu apellido" required>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" placeholder="Introduce tu email" required>
				</div>
				<div class="form-group">
					<label>Contraseña:</label>
					<input type="password" class="form-control" name="password" id="psw" placeholder="Introduce tu contraseña" required>
				</div>
				<div class="form-group">
					<label>Confirma tu contraseña:</label>
					<input type="password" class="form-control" name="confirm" placeholder="Repite tu contraseña" required>
				</div>
				<div class="error">Lo sentimos, el "E-mail" introducido ya está en uso.</div>
				<br>
				<button type="submit" name="submit" class="btn btn-success" id="registrarse">Registrarse</button>
			</form>
			<a href="login.php" class="login">¡Ya tengo una cuenta!</a>
            <a href="inicio.php" class="login">Volver</a>
		</div>
	</div>

</body>
</html>