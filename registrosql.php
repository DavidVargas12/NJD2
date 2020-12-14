<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);
	$db = new mysqli('localhost', 'root', '');
		if($db->connect_errno){
		  echo "No se ha podido conectar al servidor";
		  die("**Error: $db->connect_errno");
		}
	$db->select_db('tienda');
	$db->set_charset="utf8";

	if (isset($_REQUEST['fname'])){
		$username = stripslashes($_REQUEST['fname']);
		$username = mysqli_real_escape_string($db,$username); 

		$lastname = stripslashes($_REQUEST['lname']);
		$lastname = mysqli_real_escape_string($db,$lastname); 

		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($db,$email);

		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($db,$password);
	        $query = "INSERT into `users` (email, password, nombre, apellido) VALUES ('$email', '".($password)."', '$username', '$lastname')";
	        $result = mysqli_query($db,$query);
	        if($result){
	            echo "<div class='form'>
	<h3>You are registered successfully.</h3>
	<br/>Click here to <a href='login.php'>Login</a></div>";
	        }
	    }
     ?>           