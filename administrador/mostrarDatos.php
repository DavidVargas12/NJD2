<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

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
	$resultSet = $stmt->get_result();
	$showP = $resultSet->fetch_all();

	echo json_encode($showP);
?>