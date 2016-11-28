<?php
	//Si ya ha iniciado sesion
	require("VerifiedSecurity.php");
	$tmp = VerifiedSesion();
	if($tmp == 0) {
		header("Location: Signin.php");
	}


	if(!isset($_POST["Id"])){
		header("Location: ../Trabajo.php");
	}
	else {
		if(empty($_POST["Id"])) {
			header("Location: ../Trabajo.php");
		}
	}
	require("conexion.php");
	$consulta = $mysqli->query("DELETE FROM trabajos WHERE trabajoID = ".$_POST["Id"]);
	if($consulta) {
		header("Location: ../Trabajo.php");
	}
	else {
		header("Location: ../InscripcionEliminar.php?Id=".$_POST["Id"]."&Err=1");
	}
?>