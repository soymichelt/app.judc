<?php
	//Si ya ha iniciado sesion
	require("inc/VerifiedSecurity.php");
	$tmp = VerifiedSesion();
	if($tmp == 0) {
		header("Location: Signin.php");
	}


	//Archivo PHP para la conexion
	$Title = "Eliminar";
	require('inc/conexion.php');
	$mysqli->set_charset("utf8");
    
    //obtener el ID del trabajo a inscribir
    $TrabajoID = "";
    if(!isset($_GET['Id'])){
    	header("Location: Index.php");
    }
    else{
    	if($_GET['Id'] == ""){
    		header("Location: Index.php");
    	}
    	else{
    		$TrabajoID = $_GET['Id'];
    	}
    }
    $SalaID = "";
    if(isset($_GET['SalaID'])) {
    	if(!empty($_GET['SalaID'])) {
    		$SalaID = "?Id="-$_GET['SalaID'];
    	}
    }
    $consulta="SELECT trabajos.*, salas.nombre, salas.coordinador, salas.enlace, salas.local FROM trabajos INNER JOIN salas ON trabajos.salaID = salas.salaID WHERE TrabajoID = ".$TrabajoID;
  	$resultado=$mysqli->query($consulta);
  	if(!$resultado) {
  		header("Location: Trabajo.php".$SalaID);
  	}
  	if($resultado->num_rows==0) {
  		header("Location: Trabajo.php".$SalaID);
  	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<!--STYLES-->
		<?php
			require("inc/_Layout/Styles.php");
		?>
		<!--SCRIPTS-->
		<?php
			require("inc/_Layout/Scripts.php");
		?>
	</head>

	<body class="blue-grey lighten-5">
		<?php
			require("inc/_Layout/MenuAside.php");
		?>
		<div class="bg indigo"></div>
		<div style="height: 72px;"></div>

		<div class="content">
			<div class="container white z-depth-1">
				<?php
					while($item = $resultado->fetch_assoc()) {
				?>
				<div class="row">
					<div class="col s12">
						<div class="content-title indigo z-depth-2 white-text">
							Eliminar
							<div class="content-title-action right" style="padding-top:7px;padding-right:7px;">
								<div class="menu-setting fixed-action-btn horizontal click-to-toggle" style="position: relative;">
									<a class="btn-floating btn-flat">
										<i class="material-icons">settings</i>
									</a>
									<ul>
										<li>
											<a href="InscripcionModificar.php?Id=<?php echo $item['trabajoID']; ?>" class="btn-floating purple">
												<i class="material-icons">mode_edit</i>
											</a>
										</li>
										<li>
											<a href="InscripcionEliminar.php?Id=<?php echo $item['trabajoID']; ?>" class="btn-floating red">
												<i class="material-icons">delete</i>
											</a>
										</li>
									</ul>
								</div>
							</div>
							<!--<div class="content-action right">
								<a href="Trabajo.php" class="btn-floating btn-flat">
									<i class="material-icons">assignment</i>
								</a>
							</div>-->
						</div>
					</div>
				</div>
				<div class="col s12">
					<?php
						if(isset($_GET['Err'])) {
							if(!empty($_GET['Err'])) {
					?>
					<div class="chip red">
						Error al eliminar intente nuevamente
						<i class="close material-icons">close</i>
					</div>
					<br />
					<?php
							}
						}
					?>
				</div>
				<div class="row">
					<div class="col s12">
						<h5>
							¿Esta seguro que desea eliminar este trabajo?
						</h5>
						<?php
							echo $item['Tema'];
						?>
					</div>
					<div class="col s12">
						<br />
						<form action="inc/InscripcionEliminar.php" method="POST">
							<input type="hidden" name="Id" value="<?php echo $item['TrabajoId']; ?>">
							<button class="btn deep-orange" name="Submit" value="Subir" id="dnd_upload">
				            	Eliminar
				            </button>
				            <a href="Trabajo.php?Id=<?php echo $item['SalaId']; ?>" class="btn btn-flat">
				            	Cancelar
				            </a>
						</form>
					</div>
				</div>
				<?php
					}
				?>
			</div>
		</div>
		<br />
		<br />
		<br />

    	<?php
			require("inc/_Layout/Footer.php");
		?>
	</body>
</html>