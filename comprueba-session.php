<?php
	session_start();

	if (!empty($_GET) && isset($_GET['destroy'])) {
	  	$_SESSION = '';
	  	session_destroy();
	 }
  if (!empty($_SESSION)) {
  	echo  $_SESSION['email'];

  }
