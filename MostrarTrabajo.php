<?php
	//Si ya ha iniciado sesion
	require("inc/VerifiedSecurity.php");
	$tmp = VerifiedSesion();

	//Archivo PHP para la conexion
	$Title = "Trabajo Seleccionado";
	require('inc/conexion.php');
	$mysqli->set_charset("utf8");
    
    //obtener el ID del trabajo a inscribir
    $TrabajoID = "";
    if(!isset($_GET['Id'])){
    	header("Location: index.php");
    }
    else{
    	if($_GET['Id'] == ""){
    		header("Location: index.php");
    	}
    	else{
    		$TrabajoID = $_GET['Id'];
    	}
    }
    $consulta="SELECT trabajos.*, salas.nombre, salas.coordinador, salas.enlace, salas.local FROM trabajos INNER JOIN salas ON trabajos.salaID = salas.salaID WHERE TrabajoID = ".$TrabajoID;
  	$resultado=$mysqli->query($consulta);
  	if(!$resultado) {
  		header("Location: Trabajo.php");
  	}
  	if($resultado->num_rows==0) {
  		header("Location: Trabajo.php");
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
							Mostrar
							<?php
								if($tmp == 1) {
							?>
							<div class="content-title-action right" style="padding-top:7px;padding-right:7px;">
								<div class="menu-setting fixed-action-btn horizontal click-to-toggle" style="position: relative;">
									<a class="btn-floating btn-flat">
										<i class="material-icons">settings</i>
									</a>
									<ul>
										<li>
											<a href="Inscripcion.php?Id=<?php echo $item['trabajoID']; ?>" class="btn-floating purple">
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
							<?php
								}
							?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<h5>
							Información de Trabajo
						</h5>
					</div>
					<div class="col s12">
						<table class="striped">
							<thead>
								<tr>
									<th>Propiedades</th>
									<th>Valores</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>TEMA</td>
									<td>
										<?php
											echo $item['tema'];
										?>
									</td>
								</tr>
								<tr>
									<td>AUTOR(ES)</td>
									<td>
										<?php
											echo $item['autor1'];
											if(!empty($item['autor2'])) {
												echo ', '.$item['autor2'];

												if(!empty($item['autor3'])) {
													echo ', '.$item['autor3'];

													if(!empty($item['autor4'])) {
														echo ', '.$item['autor4'];

														if(!empty($item['autor5'])) {
															echo ', '.$item['autor5'];

															if(!empty($item['autor6'])) {
																echo ', '.$item['autor6'];
															}
														}
													}
												}
											}
										?>
									</td>
								</tr>
								<tr>
									<td>TUTOR(ES)</td>
									<td>
										<?php
											echo $item['tutor1'];
											if(!empty($item['tutor2'])) {
												echo ', '.$item['tutor2'];

												if(!empty($item['tutor3'])) {
													echo ', '.$item['tutor3'];
												}
											}
										?>
									</td>
								</tr>
								<tr>
									<td>ASESOR(ES)</td>
									<td>
										<?php
											echo $item['asesor1'];
											if(!empty($item['asesor2'])) {
												echo ', '.$item['asesor2'];
											}
										?>
									</td>
								</tr>
								<tr>
									<td>TIPO DE TRABAJO</td>
									<td>
										<?php
											echo $item['tipotrabajo'];
										?>
									</td>
								</tr>
								<tr>
									<td>DEPARTAMENTO</td>
									<td>
										<?php
											echo $item['departamento'];
										?>
									</td>
								</tr>
								<tr>
									<td>CARRERA</td>
									<td>
										<?php
											echo $item['carrera'];
										?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col s12">
						<br />
						<br />
						<h5>
							Información de Sala
						</h5>
					</div>
					<div class="col s12">
						<table class="striped">
							<thead>
								<tr>
									<th>Propiedades</th>
									<th>Valores</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>NOMBRE</td>
									<td>
										<?php
											echo $item['nombre'];
										?>
									</td>
								</tr>
								<tr>
									<td>COORDINADOR</td>
									<td>
										<?php
											echo $item['coordinador'];
										?>
									</td>
								</tr>
								<tr>
									<td>ENLACE</td>
									<td>
										<?php
											echo $item['enlace'];
										?>
									</td>
								</tr>
								<tr>
									<td>LOCAL</td>
									<td>
										<?php
											echo $item['local'];
										?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col s12">
						<br />
			            <a target="_blank" href="pdfs/<?php echo $item['pdf']; ?>" class="btn deep-orange" name="Submit" value="Subir" id="dnd_upload">ARCHIVO PDF</a>
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