<?php
include_once 'comprueba-session.php';
$link = new mysqli('localhost', 'root', '');
if($link->connect_errno){
  echo "No se ha podido conectar al servidor";
  die("**Error: $link->connect_errno");
}

$link->set_charset('utf8');
$link->select_db('tienda');
$query = "SELECT * FROM productos WHERE categoria = 'Postres'";
$stmt = $link->prepare($query);
$stmt->execute();


if(!$result = $stmt->get_result()) {
  die("Error $link->errno: $link->error.<br/>");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>NJD2-Restaurante</title>
	<link rel="stylesheet" type="text/css" href="../estilos/tiendaStyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">﻿
</head>
<body>
		<div class="menu-responsive">
		<div class="headTit">NJD2 System</div>
		<nav class="navResponsive">
			<ul>
				<li><a href="inicio.php">Inicio</a></li>
				<li class="active"><a href="tienda.php">Menu</a></li>
				<li><a href="Reservaciones.php">Servicios</a></li>
				<li><a href="contacto.php">Contáctanos</a></li>
			</ul>
		</nav>
	</div>
	<nav class="navBarMenu">
		<h3 class="titulo">NJD2 System</h3>
		<ul>
			<li><a href="../inicio.php">Inicio</a></li>
			<li class="active"><a href="../tienda.php">Menu</a></li>
                        <li><a href="../Reservaciones.php">Reservas</a></li>
			<li><a href="../contacto.php">Contáctanos</a></li>
		</ul>
	</nav>
	<div class="contenedor">
		<div class="flex-wrapper">
			<a href="../tienda.php">Todo</a>
			<a href="comidasr.php">Comidas rapidas</a>
			<a href="Bebidas.php">Bebidas</a>
			<a href="Platillos.php">Platillos</a>
			<a href="Postres.php">Postres</a>
			
		</div>
		<div class="photo">
			<img src="../imagenes/1.jpg" width="100%">
		</div>
		<div class="articulos">
			<h4 class="headTxt">Todos los productos</h4>
			<!--cuadro de productos-->
				<div class="contenedorProductos">
				      <!-- BEGIN PRODUCTS -->
				      <?php while ($fila = $result->fetch_assoc()): ?>
				      <?php
				      	$idProducto = $fila['id_producto'];
				        $nombreProducto = $fila['nombre'];
				        $descripcionProducto = $fila['descripcion'];
				        $precioProducto = $fila['precio'];
				        $idImagenProducto = $fila['imagen'];
				      ?>
				      <!-- <div class="col-md-3 col-sm-6"> -->
				        <div class="imgProducto rowproduct">
				            <a href="../buy.php?id=<?=$idProducto?>"><img src=<?="../administrador/imagenes/descargas" . $idImagenProducto . ".jpg"?> alt="..."></a>
				            <h4><?= $nombreProducto ?></h4>
				            <p><?= $descripcionProducto ?></p>
				            <hr class="line">
				            <div class="row">
					              <div class="divPrecio">
					                <p class="price"><b>Precio:</b> <?= $precioProducto ?> $</p>
					              </div>
				              <div class="col-md-6 col-sm-6">
				              	<form action="../../buy.php" action="POST">
				              		<input  type="hidden" value="<?=$idProducto?>"  name="id"> 
									<input type="submit" class="btn btn-success" value="COMPRAR" id="<?=$idProducto?>">
				                	
				                </form>
				              </div>
				            </div>
				        </div>
				      <!-- </div> -->
				    <?php endwhile;
				    $result->free();
				    $link->close(); ?>
				      <!-- END PRODUCTS -->
				</div>
		</div>
	</div>

</body>
</html>