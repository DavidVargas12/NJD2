<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Accede a tu cuenta</title>
	<link rel="stylesheet" type="text/css" href="estilos/styleLogin.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">﻿
		<script>
		window.onload = function() {

			$('#acceder').click(function(){
				var user = document.getElementById('email').value;
				var pass = document.getElementById('password').value;
				if(user == "" || pass == ""){
					event.preventDefault();
					document.getElementById('error').innerHTML = "*Usuario y/o contraseña incorrectas.*";
				}
			});
		}
		</script>
</head>
<body>
	<div class="panelSuperior">
		<h2>Accede a tu cuenta</h2>
	</div>
	<div class="panelLog">
		<div class="boxLog">
			<form action="loginsql.php" method="POST" class="formulario">
				<div class="form-group">
					<label>Email:</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu email" maxlength="50" required>
				</div>
				<div class="form-group">
					<label>Contraseña:</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Introduce tu contraseña" maxlength="50" required>
				</div>
				<div id="error"></div>
				<div id="logErr">*Usuario y/o contraseña incorrectos.*</div>
				<br>
				<button type="submit" class="btn btn-primary" id="acceder" >Acceder</button>
				<br>
				<br>
			</form>
			<a href="registro.php"><button class="btn btn-warning registro">¿No tienes cuenta?</button></a>
            
            <a href="inicio.php" class="login">Volver</a>
		</div>
	</div>

</body>
</html>