<?php
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
	<link rel="stylesheet" type="text/css" href="clothes_style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title></title>
		<script>
		
		function check(value){
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
					url: 'buscar.php',
					data: {'cadena': cadena},
					success: function(respuesta) {
						var resp = $.parseJSON(respuesta);
						window.document.getElementById("mostrar").innerHTML="";
						for(var k in resp){
							window.document.getElementById("mostrar").innerHTML+=`
							<div class="result-line"><a href="edit.php?id=${resp[k][0]}"><img src="imagenes/descargas${resp[k][0]}.jpg" /><div>${resp[k][2]}</div>`
							
						}
					}
				});
		}
		</script>
</head>
<body>


	<div class="container">
		  <h2>Menu</h2>
		  <p>Aquí podrás <kbd>Añadir/Editar o Eliminar</kbd> cualquiér artículo de tu restaurante online:</p> 
		  <br>
			  	<div id="contenedorPrincipal">
					<form class="form-inline">
						<div class="form-group mx-sm-3 mb-2">
							<label><strong>Busca aquí el articulo que necesitas &nbsp</strong></label>
						<input type="text" class="form-control" id="buscador" name="buscar" onkeyup="check(this.value);" placeholder="Tu articulo">
						</div>
						<br>
						<div id="mostrar">
							<div id="mensaje">Sin resultados</div>
						</div>
					</form>          
			<br>
			<br>
					<div class="addPanel">
						<h3>Pulsa aquí para añadir un articulo <a href="add.php" class="btn btn-info btn-lg">Añadir</a></h3>
					</div>
					  <table class="table table-striped">
					    <thead>
					      <tr>
				      	 	<th>id</th>
					        <th>Nombre</th>
					        <th>Descripción</th>
					        <th>Precio</th>
					        <th>Imagen</th>
					        <th>Editar</th>
					        <th>Eliminar</th>
					      </tr>
					    </thead>
					    <?php while ($fila = $result->fetch_assoc()): ?>
						<?php
							$idProducto = $fila['id_producto'];
							$nombreProducto = $fila['nombre'];
							$descripcionProducto = $fila['descripcion'];
							$precioProducto = $fila['precio'];
							$idImagenProducto = $fila['imagen'];
						?>

					    <tbody>
					      <tr>
					      	<td><?= $idProducto ?></td>
					        <td><?= $nombreProducto ?></td>
					        <td class="desc"><?= $descripcionProducto ?></td>
					        <td><?= $precioProducto ?> €</td>
					        <td class="imagenes"> <img src=<?="imagenes/descargas" . $idImagenProducto . ".jpg"?> alt="..."></td>
					       <td>
					        	<form action="edit.php" method="get">
									<input  type="hidden" value="<?=$idProducto?>"  name="id"> 
									<input type="submit" class="btn btn-primary" value="Editar" id="<?=$idProducto?>" />
					        	</form>
					        </td>	    	
					        
					        <td>
					        	<form action="delete.php" method="get">
									<input  type="hidden" value="<?=$idProducto?>"  name="id"> 
									<input type="submit" class="btn btn-danger" value="Borrar" id="<?=$idProducto?>" />
					        	</form>
					        </td>	    	
					      </tr>

						<?php endwhile;
							$result->free();
							$link->close(); ?>
						
					      

					    </tbody>
					  </table>
				</div>
		
	</div>

</body>
</html>