<?php 
//para
include("registro.php");

$email = $_POST['email'];
$password = $_POST['password'];


$link = new mysqli('localhost', 'root', '');
if($link->connect_errno){
	echo "No se ha podido conectar al servidor";
	die("**Error: $link->connect_errno");
}

$link->set_charset('utf8');
$link->select_db('tienda');
$query = 'SELECT password FROM users WHERE email = ?;';
$stmt = $link->prepare($query);
$stmt->bind_param('s', $email);
$stmt->execute();


	if(!$result = $stmt->get_result()) {

		die("Error $link->errno: $link->error.<br/>");
	}

	$esLoginCorrecto = false;

	while ($fila = $result->fetch_assoc()) {
		if ($password == $fila['password']) {
			$esLoginCorrecto = true;
		}

	}
	$result->free();

	if ($esLoginCorrecto) {
		session_start();
		$_SESSION['email'] = $email;
		header('Location: tienda.php');
		exit();
	} else {
		header('Location: login.php');

		}
		
