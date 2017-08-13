<?php
	if(isset($_POST['UserName']) && isset($_POST['UserPassword'])) {
		if(empty($_POST['UserName']) || empty($_POST['UserPassword'])) {
			header("Location: ../Signin.php?Err=1");
		}
	}
	else {
		header("Location: ../Signin.php?Err=1");
	}

	session_start();
	require("conexion.php");
	$consulta = "SELECT fullname, email, rol FROM usuarios WHERE email = '".$mysqli->real_escape_string($_POST['UserName'])."' AND password = '".$mysqli->real_escape_string($_POST['UserPassword'])."'";
	echo $consulta;
	
	$res = $mysqli->query($consulta);
	if(!$res) {
		header("Location: ../Signin.php?Err=2");
	}
	else {
		while($item=$res->fetch_assoc()) {
			$_SESSION['UserName'] = $item['fullname'];
			$_SESSION['UserEmail'] = $item['email'];
			$_SESSION['Rol'] = $item['rol'].'michel';
			//header("Location: ../Index.php");
		}
		if (!isset($_SESSION['UserName']) || !isset($_SESSION['UserEmail']) || !isset($_SESSION['Rol'])) {
			header("Location: ../Signin.php?Err=3");
			//echo $_SESSION["Rol"];
		}
		else {
			if(empty($_SESSION['UserName']) || empty($_SESSION['UserEmail']) || empty($_SESSION['Rol'])) {
				header("Location: ../Signin.php?Err=3");
				//echo $_SESSION["Rol"];
			}
			else {
				header("Location: ../Sala.php");
			}
		}
	}
	
?>