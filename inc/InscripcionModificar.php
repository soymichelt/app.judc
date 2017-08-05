<?php
	//Si ya ha iniciado sesion
	require("VerifiedSecurity.php");
	$tmp = VerifiedSesion();
	if($tmp == 0) {
		header("Location: Signin.php");
	}
	else {
		require('conexion.php');
		if(!isset($_POST['tema']) || !isset($_POST['autor1']) || !isset($_POST['tutor1']) || !isset($_POST['asesor1']) || !isset($_POST['jurado1']) || !isset($_POST['jurado2']) || !isset($_POST['anioesc']) || !isset($_POST['tipotrabajo']) || !isset($_POST['departamento']) || !isset($_POST['carrera'])) {
			//header("Location: ../Sala.php");
			echo "error 1";
		}
		else {
			if(empty($_POST['tema']) || empty($_POST['autor1']) || empty($_POST['tutor1']) || empty($_POST['jurado1']) || empty($_POST['jurado2']) || empty($_POST['anioesc']) || empty($_POST['tipotrabajo']) || empty($_POST['departamento']) || empty($_POST['carrera'])) {
				//header("Location: ../Sala.php");
				echo "error 2";
			}
			else {
				$id = $_POST['TrabajoID'];
				$tema=$_POST['tema'];
				$autor1=$_POST['autor1'];
				$autor2=$_POST['autor2'];
				$autor3=$_POST['autor3'];
				$autor4=$_POST['autor4'];
				$autor5=$_POST['autor5'];
				$autor6=$_POST['autor6'];
				$tutor1=$_POST['tutor1'];
				$tutor2=$_POST['tutor2'];
				$tutor3=$_POST['tutor3'];
				$asesor1=$_POST['asesor1'];
				$asesor2=$_POST['asesor2'];
				$jurado1=$_POST['jurado1'];
				$jurado2=$_POST['jurado2'];
				$jurado3="";
				$anioesc=$_POST['anioesc'];
				$tipotrabajo=$_POST['tipotrabajo'];
				$departamento=$_POST['departamento'];
				$carrera=$_POST['carrera'];
				
				$consulta = "UPDATE trabajos SET tema = '".$tema."',autor1 = '".$autor1."', autor2 = '".$autor2."',autor5 = '".$autor3."',autor4 = '".$autor4."', autor5 = '".$autor5."', tutor1 = '".$tutor1."', tutor2 = '".$tutor2."', tutor3 = '".$tutor3."', asesor1 = '".$asesor1."', asesor2 = '".$asesor2."', carrera = '".$carrera."', departamento = '".$departamento."', tipotrabajo = '".$tipotrabajo."', nota1 = '".$nota1."', nota2 = '".$nota2."', nota3 = '".$nota3."' WHERE TrabajoID = ".$id;
				$resultado = $mysqli->query($consulta);
				if($resultado) {
					echo "Modificado correctamente";
					header("Location: ../Subir.php?Id=".$id);
				}
				else {
					header("Location: ../InscripcionModificar.php?Id=".$id."&Err=2");
				}
			}
		}
	}
?>