<?php
include_once 'comprueba-session.php';

$link = new mysqli('localhost', 'root', '');
if($link->connect_errno){
  echo "No se ha podido conectar al servidor";
  die("**Error: $link->connect_errno");
}

$link->set_charset('utf8');
$link->select_db('tienda');
$query = 'SELECT * FROM productos;';
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
	<title>NJD2 System</title>
	<link rel="stylesheet" type="text/css" href="estilos/tiendaStyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">﻿
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<script>
		function busqueda(value){
			if(value.length<=0){
				window.document.getElementById("mostrar").innerHTML="Sin resultados";
			}else{
				buscador(value);
				$("#mensaje").hide();
			}
		}

		function buscador(cadena){
			if(cadena.length>0)
				$.ajax({
					type: 'POST',
					url: 'administrador/buscar.php',
					data: {'cadena': cadena},
					success: function(respuesta) {
						var resp = $.parseJSON(respuesta);
						window.document.getElementById("mostrar").innerHTML="";
						for(var k in resp){
							window.document.getElementById("mostrar").innerHTML+=`
							<div class="result-line"><a href="buy.php?id=${resp[k][0]}"><img src="administrador/imagenes/descarga${resp[k][0]}.jpg" /><div>${resp[k][2]}</div>`
							
						}
					}
				});
		}
		</script>
</head>
<body>
		<div class="menu-responsive">
		<div class="headTit">NJD2 System</div>
		<nav class="navResponsive">
			<ul>
				<li><a href="inicio.php">Inicio</a></li>
				<li class="active"><a href="tienda.php">Menu</a></li>
				<li><a href="Reservaciones.php">Reservacion</a></li>
				<li><a href="contacto.php">Contáctanos</a></li>
			</ul>
			<ul class="account">
				<li><a href="login.php">Acceder</a></li>
				<li><a href="?destroy">Salir</a></li>
			</ul>
		</nav>
	</div>
	<nav class="navBarMenu">
		<h3 class="titulo">NJD2 System</h3>
		<ul>
			<li><a href="inicio.php">Inicio</a></li>
			<li class="active"><a href="tienda.php">Menu</a></li>
                        <li><a href="Reservaciones.php">Reservacion</a></li>
			<li><a href="contacto.php">Contáctanos</a></li>
		</ul>
		<ul class="account">
				<li><a href="" id="usuario"></a></li>
				<li id="acceder"><a href="login.php">Acceder</a></li>
				<li><a href="?destroy">Salir</a></li>
		</ul>
	</nav>
	<div class="contenedor">
		<div class="flex-wrapper">
			<a href="">Todo</a>
			<a href="filtros/comidasr.php">Comidas rapidas</a>
			<a href="filtros/Bebidas.php">Bebidas</a>
			<a href="filtros/Platillos.php">Platillos</a>
			<a href="filtros/Postres.php">Postres</a>

		</div>
		<div class="photo">
			<img src="imagenes/1.jpg" width="100%">
		</div>
		<div class="articulos">
			<h4 class="headTxt">Todos los productos</h4>
				<form class="form-inline busqueda">
							<div class="form-group mx-sm-3 mb-2">
								<label><strong>¿Qué estás buscando? &nbsp</strong></label>
							<input type="text" class="form-control" id="buscador" name="buscar" onkeyup="busqueda(this.value);" placeholder="Buscar">
							</div>
							<br>
							<div id="mostrar">
								<div id="mensaje">Sin resultados</div>
							</div>
				</form>
				<br>
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
				            <a href="buy.php?id=<?=$idProducto?>"><img src=<?="administrador/imagenes/descargas" . $idImagenProducto . ".jpg"?> alt="..."></a>
				            <h4><?= $nombreProducto ?></h4>
				            <p><?= $descripcionProducto ?></p>
				            <hr class="line">
				            <div class="row">
					              <div class="divPrecio">
					                <p class="price"><b>Precio:</b> <?= $precioProducto ?> $</p>
					              </div>
				              <div class="col-md-6 col-sm-6">
				              	<form action="buy.php" action="POST">
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