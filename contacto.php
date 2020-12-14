<?php include_once 'comprueba-session.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>NJD2-Restaurante</title>
	<link rel="stylesheet" type="text/css" href="estilos/contactoStyle.css">
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
				<li class="active"><a href="inicio.php">Inicio</a></li>
				<li><a href="tienda.php">Menu</a></li>
				<li><a href="Reservaciones.php">Reservacion</a></li>
				<li class="active"><a href="contacto.php">Contáctanos</a></li>
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
			<li><a href="tienda.php">Menu</a></li>
			<li><a href="Reservaciones.php">Reservacion</a></li>
			<li class="active"><a href="contacto.php">Contáctanos</a></li>
		</ul>
		<ul class="account">
				<li><a href="" id="usuario"></a></li>
				<li id="acceder"><a href="login.php">Acceder</a></li>
				<li><a href="?destroy">Salir</a></li>
		</ul>
	</nav>
	<div class="contenedor">
		<div class="contactoHead">
			<h3 class="txtH3">Consúltanos<br>No te quedes con la duda</h3>
			<hr class="linea">
			<div class="question"></div>
		</div>
		<div class="contactoTxt">
			<h3 class="txth4">INFORMACIÓN</h3>
			<ol class="lista">
				<li><h5>Horario envios:</h5>&nbsp 9:00 a.m. - 23:00 p.m.</li>
				<li><h5>Tiempo de entrega:</h5>&nbsp 24h antes de las 16:00</li>
				<li><h5>Whatsapp:</h5>&nbsp 300-645-06-48</li>
				<li><h5>Correo electrónico:</h5>&nbsp gaesadsisena@gmail.com</li>
			</ol>
		</div>
		<div class="imagenContacto">
			<img src="imagenes/contact.gif"  >
		</div>
	</div>
</html>