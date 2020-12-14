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

	if (isset($_REQUEST['Nombre'])){
	        // removes backslashes 

		$Nombre = stripslashes($_REQUEST['Nombre']);
		$Nombre = mysqli_real_escape_string($db,$Nombre); 

		$Telefono = stripslashes($_REQUEST['Telefono']);
		$Telefono = mysqli_real_escape_string($db,$Telefono);

		$Correo = stripslashes($_REQUEST['Correo']);
		$Correo = mysqli_real_escape_string($db,$Correo);
                
                $Fecha_reserva = stripslashes($_REQUEST['Fecha_reserva']);
		$Fecha_reserva = mysqli_real_escape_string($db,$Fecha_reserva);
                
                $Num_personas = stripslashes($_REQUEST['Num_personas']);
		$Num_personas = mysqli_real_escape_string($db,$Num_personas);

		//COMPROBAR SI EL EMAIL INTRODUCIDO YA EXISTE EN LA BD:
		$check = "SELECT Nombre FROM reservaciones WHERE Nombre='$Nombre'";
			$result = mysqli_Nom($db,$check);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			 
			if(mysqli_num_rows($result) == 1) {
				
			}else{
		        $query = "INSERT into `reservaciones` (Nombre, Telefono, Correo, Fecha_reserva, Num_personas) VALUES ('$Nombre', '".($Telefono)."', '$Correo', '$Fecha_reserva','$Num_personas )";
		        $result = mysqli_query($db,$query);
	        if($result){
	            echo "<div class='form'>
	<h3>You are registered successfully.</h3>
	<br/>Click here to <a href='Reservaciones.php'>Reservar</a></div>";
	        }
	    }
            }
     ?>           