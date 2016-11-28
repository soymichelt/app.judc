<?php
	$Id = "";
	//Validación de Id Trabajo
	if(isset($_POST['Id'])) {
		if(!empty($_POST['Id'])) {
			header('Location: ../Trabajo.php');
		}
	}
	else {
		header('Location: ../Trabajo.php');
	}

	//Validación de campos de notas
	if(isset($_POST['nota1']) && isset($_POST['nota2'])) {
		if(!empty($_POST['nota1']) && !empty($_POST['nota2'])) {
			$Id = $_POST['Id'];
			$nota1 = number_format($_POST['nota1'], 2, ".", ",");
			$nota2 = number_format($_POST['nota2'], 2, ".", ",");
			$promedio = number_format(($nota1 + $nota2) / 2, 2, '.', ',');
		}
		else {
			header('Location: ../Trabajo.php');
		}
	}
	else {
		header('Location: ../Trabajo.php');
	}
	require('conexion.php');

	$consulta="SELECT trabajoID, salaID FROM trabajos WHERE trabajoID = ".$Id;

	$resultado=$mysqli->query($consulta);

	if($resultado) {
		while($item = $resultado->fetch_assoc()) {
			$act="UPDATE trabajos SET nota1 = ".$nota1.", nota2 = ".$nota2.", promedio = ".$promedio." WHERE trabajoID = ".$Id;
			echo $act;
			$res=$mysqli->query($act);
			if(!$res) {
				echo "No se han podido actualizar la información. Intente de nuevo.";
			}
			else {
				header("Location: ../Trabajo.php?Id=".$item["salaID"]);
			}
		}
	}
	else {
		header("Location: ../Trabajo.php");
	}
?>