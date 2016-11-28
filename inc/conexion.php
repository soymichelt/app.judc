<?php
	$server = "localhost";
	$user = "root";
	$pw = "";
	$bd = "judc";
	$mysqli= new mysqli($server, $user, $pw, $bd);
	if(mysqli_connect_errno()){
		echo 'Conexion fallida:', mysqli_connect_error();
		exit();
	}
	$mysqli->set_charset("utf8");
	// else
	// {
	//  	echo "Conexión exitosa";
	// }

?>