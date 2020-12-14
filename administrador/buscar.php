<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$link = new mysqli('localhost', 'root', '', 'tienda');

	if($link->connect_errno){
		echo "ERROR: $link->connect_errno";
	}

	$link->set_charset("utf8");

	$stmt = $link->prepare('SELECT id_producto, imagen, nombre  FROM productos WHERE nombre LIKE ?');
	$producto = $_POST['cadena'].'%';
	$stmt->bind_param('s', $producto);
	$stmt->execute();
	$resultSet = $stmt->get_result();
	$aResult = $resultSet->fetch_all();

	echo json_encode($aResult);
?>