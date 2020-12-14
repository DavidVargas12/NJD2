<?php
include_once 'comprueba-session.php';
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
	$edit = "SELECT * FROM productos WHERE id_producto ='$idProducto'";



	$resultado_edit = mysqli_query($conexion, $edit);

	
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>NJD2-Restaurante</title>
	<link rel="stylesheet" type="text/css" href="estilos/articuloStyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">﻿
</head>
<body>
	<div class="topPanel">
		<p>Disfruta de los mejores productos.</p>
	</div>
	<div class="menu-responsive">
		<div class="headTit">NJD2 System </div>
		<nav class="navResponsive">
			<ul>
				<li><a href="inicio.php">Inicio</a></li>
				<li class="active"><a href="tienda.php">Menu</a></li>
				<li><a href="#">Servicios</a></li>
				<li><a href="contacto.php">Contáctanos</a></li>
			</ul>
		</nav>
	</div>
	<nav class="navBar">
		<h3 class="titulo">NJD2 System</h3>
		<ul>
			<li><a href="inicio.php">Inicio</a></li>
			<li class="active"><a href="tienda.php">Menu</a></li>
			<li><a href="#">Servicios</a></li>
			<li><a href="contacto.php">Contáctanos</a></li>
		</ul>
	</nav>

	<?php while ($fila = $resultado_edit->fetch_assoc()): ?>
		<?php
			$nombreProducto = $fila['nombre'];
			$descripcionProducto = $fila['descripcion'];
			$categoriaProducto = $fila['categoria'];
			$precioProducto = $fila['precio'];
			$nombreTalla = $fila['nombre'];
	?>
<!--
SELECT p.id_producto, p.nombre, t.nombre, t.cantidad 
FROM productos AS p
INNER JOIN tallas AS t ON p.id_producto = t.id_producto
WHERE p.id_producto = 5;
-->

	<div class="articulo">
		<img  src=<?="administrador/imagenes/descargas" . $idProducto . ".jpg"?> >
	</div>
	<div class="panelDerecho">
		<div class="tituloArticulo">
			<h3><?= $nombreProducto ?></h3>
		</div>
		<ul>
			
			<li>Categoria:<a href="filtros/<?=$categoriaProducto?>.php" class="category"> <u><?= $categoriaProducto ?></u></a></li>
			<li>Precio: <?= $precioProducto ?> $</li>
		</ul>
		
		<button class="btnBuy">Realizar pedido</button>
		<br>
		<br>
		
		<br>
		<p><?= $descripcionProducto ?></p>
		<br>
		
	</div>

	<?php endwhile;
			$resultado_edit->free();
	?>

</body>
</html>