<?php
	
	$id = $_POST['id'];
	$tema = $_POST['tema'];
	$autor1 = $_POST['autor1'];
	$autor2 = $_POST['autor2'];
	$autor3 = $_POST['autor3'];
	$autor4 = $_POST['autor4'];
	$autor5 = $_POST['autor5'];
	$tutor1 = $_POST['tutor1'];
	$tutor2 = $_POST['tutor2'];
	$tutor3 = $_POST['tutor3'];
	$asesor1 = $_POST['asesor1'];
	$asesor2 = $_POST['asesor2'];
	$tipotrabajo = $_POST['tipotrabajo'];
	$departamento = $_POST['departamento'];
	$carrera = $_POST['carrera'];
	$nota1 = $_POST['nota1'];
	$nota2 = $_POST['nota2'];
	$nota3 = $_POST['nota3'];
	

	require('conexion.php');
	$consulta = "UPDATE trabajos SET tema = '".$tema."',autor1 = '".$autor1."', autor2 = '".$autor2."',autor5 = '".$autor3."',autor4 = '".$autor4."', autor5 = '".$autor5."', tutor1 = '".$tutor1."', tutor2 = '".$tutor2."', tutor3 = '".$tutor3."', asesor1 = '".$asesor1."', asesor2 = '".$asesor2."', carrera = '".$carrera."', departamento = '".$departamento."', tipotrabajo = '".$tipotrabajo."', nota1 = '".$nota1."', nota2 = '".$nota2."', nota3 = '".$nota3."' WHERE TrabajoID = ".$id;
	$resultado = $mysqli->query($consulta);
	if($resultado){
		echo "Modificado correctamente";
		header("Location: ../ver.php");
	}
	else
	{
		echo "Error: ";
	}
?>