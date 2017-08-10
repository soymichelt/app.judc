<?php
	//Si ya ha iniciado sesion
	require("inc/VerifiedSecurity.php");
	$tmp = VerifiedSesion();

	
	//Archivo PHP para la conexion
	$Title = "Calificar Trabajo";
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
			<?php
				while($item = $resultado->fetch_assoc()) {
			?>
			<div class="container white z-depth-1">
				<div class="row">
					<div class="col s12">
						<div class="content-title indigo white-text">
							Calificar
							<div class="content-title-action right" style="padding-top:7px;padding-right:7px;">
								<div class="menu-setting fixed-action-btn horizontal click-to-toggle" style="position: relative;">
									<a class="btn-floating btn-flat">
										<i class="material-icons">settings</i>
									</a>
									<ul>
										<li>
											<a href="Inscripcion.php?Id=<?php echo $item['SalaId']; ?>" class="btn-floating green">
												<i class="material-icons">add</i>
											</a>
										</li>
										<li>
											<a href="InscripcionEliminar.php?Id=<?php echo $TrabajoID; ?>" class="btn-floating red modal-trigger modal-sala">
												<i class="material-icons">delete</i>
											</a>
										</li>
										<li>
											<a href="Sala.php" class="btn-floating blue modal-trigger">
												<i class="material-icons">library_books</i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<h5>
							Calificar
						</h5>
					</div>
					<form id="formulario" method="POST" action="inc/Calificar.php">
						<input type="hidden" name="Id" value="<?php echo $TrabajoID; ?>" required="required" />
						<div class="col s12 m6">
							<h5 class="center custom-h5">
								<?php
									echo $item['Jurado1'];
									echo "<br />";
									echo "<span>(".$item['Cargo1'].")</span>";
								?>
							</h5>
							<input type="number" value="<?php echo $item['nota1']; ?>" step="any" name="nota1" min="0" max="100" required="required" placeholder="Ingresar nota" validate="" class="validate" />
						</div>
						<div class="col s12 m6">
							<h5 class="center custom-h5">
								<?php
									echo $item['Jurado2'];
									echo "<br />";
									echo "<span>(".$item['Cargo2'].")</span>";
								?>
							</h5>
							<input type="number" value="<?php echo $item['nota2']; ?>" step="any" name="nota2" min="0" max="100" required="required" placeholder="Ingresar nota" validate="" class="validate" />
						</div>

						<div class="col s12">
							<br />
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
												echo $item['Tema'];
											?>
										</td>
									</tr>
									<tr>
										<td>AUTOR(ES)</td>
										<td>
											<?php
												echo $item['Autor1'];
												if(!empty($item['Autor2'])) {
													echo ', '.$item['Autor2'];

													if(!empty($item['Autor3'])) {
														echo ', '.$item['Autor3'];

														if(!empty($item['Autor4'])) {
															echo ', '.$item['Autor4'];

															if(!empty($item['Autor5'])) {
																echo ', '.$item['Autor5'];

																if(!empty($item['Autor6'])) {
																	echo ', '.$item['Autor6'];
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
												echo $item['Tutor1'];
												if(!empty($item['Tutor2'])) {
													echo ', '.$item['Tutor2'];

													if(!empty($item['Tutor3'])) {
														echo ', '.$item['Tutor3'];
													}
												}
											?>
										</td>
									</tr>
									<tr>
										<td>ASESOR(ES)</td>
										<td>
											<?php
												echo $item['Asesor1'];
												if(!empty($item['Asesor2'])) {
													echo ', '.$item['Asesor2'];
												}
											?>
										</td>
									</tr>
									<tr>
										<td>TIPO DE TRABAJO</td>
										<td>
											<?php
												echo $item['Tipotrabajo'];
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
				            <button type="submit" class="btn deep-orange" name="Submit" value="Subir" id="dnd_upload">
				            	Calificar
				            </button>
				            <a class="btn btn-flat" href="Trabajo.php?Id=<?php echo $item['SalaId']; ?>">
				            	Cancelar
				            </a>
						</div>
					</form>
				</div>
			</div>
			<?php
				}
			?>
		</div>
		<br />
		<br />
		<br />

    	<?php
			require("inc/_Layout/Footer.php");
		?>
	</body>
</html>