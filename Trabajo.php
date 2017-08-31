<?php
	//Si ya ha iniciado sesion
	require("inc/VerifiedSecurity.php");
	$tmp = VerifiedSesion();

	$Title = "Trabajos";
	//se valida que se obtenga el Id de la sala a mostrar
	if(!isset($_GET['Id'])) {
		header("Location: Index.php");
	}
	else {
		if(empty($_GET['Id'])) {
			header("Location: Index.php");
		}
	}

	//Se carga en una variable el Id de la Sala
	$Id = $_GET["Id"];

	//se especifica la conexion a la bd
	require("inc/conexion.php");

	//se crea la consulta
	$res = $mysqli->query("SELECT salas.SalaId, salas.Nombre, salas.Descripcion, salas.Coordinador, salas.Enlace, salas.Local, salas.FileName FROM salas WHERE salas.SalaID = ".$Id." ORDER BY Salas.SalaId");
	
	//Si no encuentra salaID retorna al inicio
	if(!$res) {
		header("Location: Index.php");
	}
	if($res->num_rows==0) {
  		header("Location: Index.php");
  	}
?>
<!DOCTYPE html>
<html>
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
					if(!$res) {
						echo "Ha ocurrido un error recargue la página.";
					}
					else {
						while($item = $res->fetch_assoc()) {
				?>
				<div class="row">
					<div class="col s12">
						<div class="content-title indigo z-depth-2 white-text">
							<?php echo "Sala ".$item["SalaId"].": ".$item["Nombre"]; ?>
							<div class="content-title-action right" style="padding-top:7px;padding-right:7px;">
								<div class="menu-setting fixed-action-btn horizontal click-to-toggle" style="position: relative;">
									<a class="btn-floating btn-flat">
										<i class="material-icons">settings</i>
									</a>
									<ul>
										<?php
											if($tmp == 1) {
										?>
										<li>
											<a href="Inscripcion.php?SalaID=<?php echo $item['SalaId']; ?>" class="btn-floating green">
												<i class="material-icons">add</i>
											</a>
										</li>
										<?php
											}
										?>
										<li>
											<a href="#modal" class="btn-floating blue modal-trigger modal-sala">
												<i class="material-icons">visibility</i>
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
						<div>
							<div class="page custom-page">
					  			<table class="striped custom-table">
					  				<thead>
					  					<tr>
					  						<td>
					  							TITULO
					  						</td>
					  						<td>
					  							N1
					  						</td>
					  						<td>
					  							N2
					  						</td>
					  						<td>
					  							PROM
					  						</td>
					  						<td>
					  							
					  						</td>
					  					</tr>
					  				</thead>
					  				<tbody>
					  					<?php
								  			$resTrab = $mysqli->query("SELECT trabajos.TrabajoId, trabajos.Tema, trabajos.Autor1, trabajos.Autor2, trabajos.Autor3, trabajos.Autor4, trabajos.Autor5, trabajos.nota1, trabajos.nota2, trabajos.promedio, trabajos.pdf FROM trabajos WHERE trabajos.SalaId = ".$item['SalaId']." ORDER BY trabajos.promedio DESC");
								  			if(!$resTrab) {
								  			}
								  			else {
								  				while($itemTrab = $resTrab->fetch_assoc()) {
								  		?>
					  					<tr>
					  						<td class="custom-table-title">
					  							<?php
					  								//AUTORES
					  								//Autor numero 1
					  								$autor = $itemTrab['Autor1'];
					  								if(!empty($itemTrab['Autor2'])) {
					  									//Autor numero 2
					  									$autor = $autor.", ".$itemTrab['Autor2'];
					  									if(!empty($itemTrab['Autor3'])) {
					  										//Autor numero 3
						  									$autor = $autor.", ".$itemTrab['Autor3'];
						  									if(!empty($itemTrab['autor4'])) {
						  										//Autor numero 4
							  									$autor = $autor.", ".$itemTrab['autor4'];
							  									if(!empty($itemTrab['autor5'])) {
							  										//Autor numero 5
								  									$autor = $autor.", ".$itemTrab['autor5'];
								  									
								  								}
							  								}
						  								}
					  								}
					  								echo $autor;
					  								echo "<br />";
					  								echo "<div class='custom-sub-title'>";
					  								echo $itemTrab['Tema'];
					  								echo "</div>";
					  							?>
					  						</td>
					  						<td>
					  							<?php echo $itemTrab['nota1']; ?>
					  						</td>
					  						<td>
					  							<?php echo $itemTrab['nota2']; ?>
					  						</td>
					  						<td>
					  							<?php echo $itemTrab['promedio']; ?>
					  						</td>
					  						<td>
					  							<a class='dropdown-button btn btn-flat btn-floating custom-btn-flat' href='javascript:void(0);' data-activates='dropdown<?php echo $itemTrab['TrabajoId']; ?>'>
					  								<i style="font-size:16px;" class="material-icons">query_builder</i>
					  							</a>
					  							<ul id='dropdown<?php echo $itemTrab['TrabajoId']; ?>' class='dropdown-content'>
					  								<?php
					  									if($tmp == 1) {
					  								?>
													<li>
														<a class="deep-orange-text" href="InscripcionModificar.php?Id=<?php echo $itemTrab['TrabajoId']; ?>">
															Editar
														</a>
													</li>
													<li>
														<a class="deep-orange-text" href="InscripcionEliminar.php?Id=<?php echo $itemTrab['TrabajoId']; ?>">
															Eliminar
														</a>
													</li>
													<?php
														}
													?>
													<li>
														<a class="deep-orange-text" href="MostrarTrabajo.php?Id=<?php echo $itemTrab['TrabajoId']; ?>">
															Mostrar
														</a>
													</li>
													<li class="divider"></li>
													<li>
														<a class="deep-orange-text" target="_blank" href="pdfs/<?php echo $itemTrab['pdf']; ?>">
															Archivo
														</a>
													</li>
													<?php
														if($tmp) {
													?>
													<li class="divider"></li>
													<li>
														<a class="deep-orange-text" href="Calificacion.php?Id=<?php echo $itemTrab['TrabajoId']; ?>">
															Calificar
														</a>
													</li>
													<?php
														}
													?>
												</ul>
					  						</td>
					  					</tr>
					  					<?php
					  							}
					  						}
					  					?>
					  				</tbody>
					  			</table>
							</div>
						</div>
					</div>
				</div>
				<!-- Modal Structure -->
				<div id="modal" class="modal">
					<div class="modal-content">
						<h4 class="center">Información de la Sala</h4>
						<p>
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
												echo $item['Nombre'];
											?>
										</td>
									</tr>
									<tr>
										<td>COORDINADOR</td>
										<td>
											<?php
												echo $item['Coordinador'];
											?>
										</td>
									</tr>
									<tr>
										<td>ENLACE</td>
										<td>
											<?php
												echo $item['Enlace'];
											?>
										</td>
									</tr>
									<tr>
										<td>LOCAL</td>
										<td>
											<?php
												echo $item['Local'];
											?>
										</td>
									</tr>
								</tbody>
							</table>
						</p>
					</div>
					<div class="modal-footer">
						<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
					</div>
				</div>
				<?php
						}
					}
				?>
			</div>
		</div>

		<?php
			require("inc/_Layout/Footer.php");
		?>

		<script type="text/javascript">
			//dropdown
			$(document).ready(function() {
				//inicializa el dropdown
				$('.dropdown-button').dropdown({
					inDuration: 300,
					outDuration: 225,
					constrain_width: false, // Does not change width of dropdown to that of the activator
					hover: true, // Activate on hover
					gutter: 0, // Spacing from edge
					belowOrigin: false, // Displays dropdown below the button
					alignment: 'left' // Displays dropdown with edge aligned to the left of button
				});

				$(".modal-sala").click(function() {
					$("#modal").openModal();
				});
			});
		</script>
		
	</body>
</html>