<?php
//header("Location: clothes.php");

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
//1. Establecemos la conexion:
$conexion = new mysqli("localhost", "root", "", "tienda");

//2. Comprobamos la conexion:

	if($conexion->connect_errno){
		exit("***ERROR: $mysqli->connect_errno");
	}
	$conexion->set_charset('utf8');


	$idProducto = $_GET['id'];
	$eliminar = "DELETE FROM productos WHERE id_producto ='$idProducto'";
	$resultado_eliminar = mysqli_query($conexion, $eliminar);

	
mysqli_close($conexion);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Delete</title>
	<style>
	body {
		background-image: url('img/del.jpg');
	}

	.titulo {
		text-align: center;
	}
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body>
	<h2 class="titulo">Has eliminado el producto con exito, a continuación serás redirigida a la pagina principal.
		<br>
                <b><a href="clothes.php">Volver</a></b></h2>

</body>
</html>