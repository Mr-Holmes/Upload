<?php 
	$host='localhost';
	$user = 'root';
	$pass = '';
	$banco = 'upload';

	$mysqli = new mysqli($host, $user, $pass, $banco);

	if ($mysqli->connect_errno)
		echo "falha no banco (".$mysqli ->connect_errno.")".$mysqli->connect_erro;
	
 ?>