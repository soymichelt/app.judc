<?php
	//Si ya ha iniciado sesion
	require("VerifiedSecurity.php");
	$tmp = VerifiedSesion();
	if($tmp == 0) {
		header("Location: Signin.php");
	}
	
	if(isset($_POST['Id'])) {
		if(!empty($_POST['Id'])) {
			$Id = $_POST['Id'];
		}
		else {
			header('Location: ../Index.php');
		}
	}
	else {
		echo "No se ha recibido el trabajo a actualizar";
	}
	require('conexion.php');

	$upload=false;
	$nombrepdf = uniqid('judc_', true).'.pdf';

	$consulta="SELECT trabajoID, salaID FROM trabajos WHERE trabajoID = ".$Id;

	$resultado=$mysqli->query($consulta);

	if($resultado) {
		if($resultado->num_rows==0) {
	  		header("Location: Index.php");
	  	}
	  	else {
	  		if($_FILES) {
				while($item = $resultado->fetch_assoc()) {
					$directorio = '../pdfs/';
					$original = $directorio . basename($_FILES['pdf']['name']);
					$copiarchivo = $directorio . $nombrepdf;
					$image_file_type = pathinfo($original, PATHINFO_EXTENSION);
					if($image_file_type == 'pdf') {
						if(move_uploaded_file($_FILES['pdf']['tmp_name'], $copiarchivo)) {
							$act="UPDATE trabajos SET state=1, pdf = '".$nombrepdf."' WHERE trabajoID = ".$Id;
							$res=$mysqli->query($act);
							if(!$res) {
								header("Location: ../Subir.php?Id=".$item["trabajoID"]."&Err=4");
							}
							else {
								header("Location: ../Trabajo.php?Id=".$item["salaID"]);
							}
						} else {
							header("Location: ../Subir.php?Id=".$item["trabajoID"]."&Err=3");
						}
					}
					else {
						header("Location: ../Subir.php?Id=".$item["trabajoID"]."&Err=2");
					}
				}
			}
			else {
				header("Location: ../Subir.php?Id=".$item["trabajoID"]."&Err=1");
			}
	  	}
	}
	else {
		header("Location: ../Index.php");
	}
?>