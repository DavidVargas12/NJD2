<?php

	if(!empty($_POST)){
		$nombreProducto = $_POST['nombre'];
		$descripcionProducto = $_POST['descripcion'];
		$categoriaProducto = $_POST['categoria'];
		$precioProducto = $_POST['precio'];
		$cantidadProducto = $_POST['cantidad'];

		$mysqli = new mysqli("localhost", "root", "", "tienda");
		if($mysqli->connect_errno){
			nit("***ERROR: $mysqli->connect_errno");
		}

		$mysqli->set_charset=("utf8");

		$insertar = "INSERT INTO productos (nombre, descripcion, categoria, precio, cantidad) VALUES ('$nombreProducto ', '$descripcionProducto', '$categoriaProducto', '$precioProducto', '$cantidadProducto')";
		
		if(mysqli_query($mysqli, $insertar)){
			echo "articulo Realizar pedido";
			}else{
				echo "ERROR." . mysqli_error($mysqli);
			}
			mysqli_close($mysqli);
		}
	
	


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Añadir</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="scripts/functions.js"></script>
<script type="text/javascript" src="bundle.js"></script>

	<style>
	body {
		background-image: url('img/add.jpg');
	}
	.panel {
		width: 100%;
		height: 6em;
		background-color: #D7BDE2;
		text-align: center;
		opacity: 0.5;
	}

	.cuadroImg {
		width: 50%;
		height: 28em;
		background-color: grey;
		margin: auto;
		border-radius: 8px 8px 8px;
	}

	.imagenArticulo {
		width: 100%;
		height: 14em;
		background-color: #333;
	}

	.uploadImg {
		width: 50%;
		color: white;


	}

	.save {
		width: 100%;
	}

	.success {
		padding: 10px;
        border-radius: 10px;
        background: green;
        color: #fff;
        font-size: 18px;
        text-align: center;
	}

	</style>
</head>
<body>
	<div class="panel"><br><h2>Añade articulos a tu web</h2></div>
	<br>
	<div class="cuadroImg">
		<div class="imagenArticulo">
			
		</div>
			<form enctype="multipart/form-data" class="formulario" method="POST">
				<div class="input-group">
				    <span class="input-group-addon txtAddon"><strong>Nombre Art.</strong></span>
				    <input type="text" class="form-control" name="nombre" placeholder="Ej: Hamburguesas" required>
				    <br>
			    </div>
			    <div class="input-group">
				    <span class="input-group-addon txtAddon"><strong>Descripción</strong></span>
				    <input type="text" class="form-control" name="descripcion" placeholder="Ej: Hamburguesas de carne doble" required>
	 			 </div>
	 			 <div class="input-group">
				    <span class="input-group-addon txtAddon"><strong>Categoría &nbsp  &nbsp</strong></span>
				    <input type="text" class="form-control" name="categoria" placeholder="Ej: Comida rapida" required>
	 			 </div>
	 			<div class="input-group">
				    <span class="input-group-addon txtAddon"><strong>Precio Art.&nbsp&nbsp</strong></span>
				    <input type="number" class="form-control" name="precio" placeholder="Ej: 12 $" required>
	 			 </div>
	 			
	 			<div class="input-group">
				    <span class="input-group-addon txtAddon"><strong>Cantidad &nbsp&nbsp&nbsp&nbsp</strong></span>
				    <input type="number" class="form-control" name="cantidad" placeholder="Ej: 2" required>
	 			 </div>
	 			<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
	 			<input name="archivo" type="file" class="form-control-file uploadImg" id="archivo">
	 			<input type="submit" class="btn btn-success save" value="Guardar">
			</form>
			<div class="showImage"></div>
	</div>

	<br>
	<br>
	<a href="clothes.php"> Volver a la página principal</a>
</body>
</html>