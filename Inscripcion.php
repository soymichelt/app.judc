<?php
	//Si ya ha iniciado sesion
	require("inc/VerifiedSecurity.php");
	$tmp = VerifiedSesion();
	if($tmp == 0) {
		header("Location: Signin.php");
	}

	//Se valida que se ingrese SalaID
	if(!isset($_GET['SalaID'])) {
		header('Location: Index.php');
	}
	else {
		if(empty($_GET['SalaID'])) {
			header('Location: Index.php');
		}
	}

	//Se carga la conexion
	require('inc/conexion.php');
	$mysqli->set_charset("utf8");

	//Se valida que la Sala exista en la BD
	$resSala = $mysqli->query("SELECT * FROM salas WHERE salaID = ".$_GET['SalaID']);
	if(!$resSala) {
		header('Location: Trabajo.php');
	}
	else {
		if($resSala->num_rows == 0) {
			header('Location: Trabajo.php');
		}
	}

	//Archivo PHP para la conexion
	$Title = "Inscripción de Trabajos";
  	$consulta="SELECT * FROM trabajos";
  	$resultado=$mysqli->query($consulta);    
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
				while($item = $resSala->fetch_assoc()) {

			?>
			<div class="container white z-depth-1">
				<div class="row">
					<div class="col s12">
						<div class="content-title z-depth-2 indigo white-text">
							Inscripci&oacute;n
							<div class="content-action right">
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
												<a href="Sala.php" class="btn-floating blue">
													<i class="material-icons">library_books</i>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<form method="POST" action="inc/Inscripcion.php">

					<input name="salaID" type="hidden" value="<?php echo $item['SalaId']; ?>">
					
					<div class="custom-input-field col s12">
				 		<label>Docente a asignar *</label>
				 		<br><br>
						<select class="browser-default" class="validate" name="encargadorevision">
							
						</select>
						<br>
					</div>

					<div class="row">
						<div class="custom-input-field col s12">
			 				<label for="icon_prefix">Tema del trabajo *</label>
			 				<br />
							<textarea name="tema" type="text" rows="10" cols="40" style="height: 80px; resize: none;"></textarea>
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Autor 1 *</label>
							<br />
							<input name="autor1" type="text" class="validate" validate="">
						</div>
						
						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Autor 2</label><br>
							<input name="autor2" type="text" validate="">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Autor 3</label>
							<br />
							<input name="autor3" type="text">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Autor 4</label>
							<br />
							<input name="autor4" type="text" class="validate">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Autor 5</label>
							<br />
							<input name="autor5" type="text" class="validate">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Autor 6</label>
							<br />
							<input name="autor6" type="text" class="validate">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Tutor 1 *</label>
							<br />
							<input name="tutor1" type="text" class="validate">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Tutor 2</label>
							<br />
							<input name="tutor2" type="text" class="validate">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Tutor 3</label>
							<br />
							<input name="tutor3" type="text" class="validate">
						</div>

						<div class="custom-input-field col s12 m6">
							<label for="icon_prefix">Asesor 1</label>
							<br />
							<input name="asesor1" type="text" class="validate">
						</div>

						<div class="custom-input-field col s12 m6">
							<label for="icon_prefix">Asesor 2</label>
							<br />
							<input name="asesor2" type="text" class="validate">
						</div>

						<div class="col s12 m6">
							<div class="row">
								<div class="custom-input-field col s12">
									<label for="icon_prefix">Jurado 1</label>
									<br />
									<input name="jurado1" type="text" class="validate">	
								</div>
							</div>
						</div>

						<div class="col s12 m6">
							<div class="row">
								<div class="custom-input-field col s12">
									<label for="icon_prefix">Jurado 2</label>
									<br />
									<input name="jurado2" type="text" class="validate">	
								</div>
							</div>
						</div>

						<div class="custom-input-field col s12 m6">
				 			<label>Tipo de trabajo *</label>
				 			<br><br>
					  		<select class="browser-default" class="validate" name="tipotrabajo" >
								<option value="Informes de investigación científica">Informes de investigación científica</option> 
								<option value="Ensayos">Ensayos</option> 
								<option value="Proyectos de Desarrollo">Proyectos de Desarrollo</option> 
								<option value="Pre defensa de Monografías">Pre defensa de Monografías</option> 
								<option value="Protocolos">Protocolos</option> 
								<option value="Artículos Científicos">Artículos Científicos</option> 
								<option value="Software de Aplicación y Páginas Web">Software de Aplicación y Páginas Web</option> 
								<option value="Procesos de Enfermería">Procesos de Enfermería</option> 
								<option value="Evaluación de Planes de Negocio">Evaluación de Planes de Negocio</option> 
								<option value="Aplicaciones Educativas">Aplicaciones  Educativas</option> 
								<option value="Proyectos educativos basados en tecnologías">Proyectos educativos basados en tecnologías</option> 
								<option value="Evaluación de diagnósticos">Evaluación de diagnósticos</option> 
								<option value="Evaluación de casos clínicos">Evaluación de casos clínicos</option>
							</select>
						</div>

						<div class="custom-input-field col s12 m6">
				 			<label>Departamento al que pertenece *</label>
				 			<br><br>
					  		<select class="browser-default" class="validate" name="departamento">
								<option value="Ciencias, Tecnología y Salud">Ciencias, Tecnología y Salud</option> 
								<option value="Ciencias Económicas y Administrativas">Ciencias Económicas y Administrativas</option> 
								<option value="Ciencias de la Educación y Humanidades">Ciencias de la Educación y Humanidades</option>
							</select>
						</div>

						<div class="custom-input-field col s12 m6">
				 			<label>Carrera a la que pertenece *</label>
				 			<br><br>
					  		<select class="browser-default" class="validate" name="carrera">
								<option value="Biología">Biología</option> 
								<option value="Ciencias Naturales">Ciencias Naturales</option> 
								<option value="Ciencias Sociales">Ciencias Sociales</option> 
								<option value="Cultura y Artes">Cultura y Artes</option> 
								<option value="Español">Español</option> 
								<option value="Física-Matemática">Física-Matemática</option> 
								<option value="Informática Educativa">Informática Educativa</option> 
								<option value="Inglés">Inglés</option> 
								<option value="Lengua y Literatura Hispánicas">Lengua y Literatura Hispánicas</option> 
								<option value="Matemática">Matemática</option> 
								<option value="Pedagogía con mención en Educación para la Diversidad">Pedagogía con mención en Educación para la Diversidad</option> 
								<option value="Pedagogía con mención en Educación Infantil">Pedagogía con mención en Educación Infantil</option> 
								<option value="Psicología">Psicología</option> 
								<option value="Bioanálisis Clínico">Bioanálisis Clínico</option> 
								<option value="Ciencias Ambientales">Ciencias Ambientales</option> 
								<option value="Enfermería en Materno Infantil">Enfermería en Materno Infantil</option> 
								<option value="Enfermería en Salud Pública">Enfermería en Salud Pública</option> 
								<option value="Sistemas de Información">Sistemas de Información</option> 
								<option value="Ingeniería Agroindustrial">Ingeniería Agroindustrial</option> 
								<option value="Ingeniería Agronómica">Ingeniería Agronómica</option> 
								<option value="Ingeniería Industrial y de Sistemas">Ingeniería Industrial y de Sistemas</option> 
								<option value="Medicina">Medicina</option> 
								<option value="Topografía">Topografía</option> 
								<option value="Turismo Sostenible">Turismo Sostenible</option> 
								<option value="Administración de Empresas">Administración de Empresas</option> 
								<option value="Banca y Finanzas">Banca y Finanzas</option> 
								<option value="Contaduría Pública y Finanzas">Contaduría Pública y Finanzas</option> 
								<option value="Mercadotecnia">Mercadotecnia</option>
							</select>
						</div>
						<div class="custom-input-field col s12 m6">
				 			<label>Año Escolar *</label>
				 			<br><br>
					  		<select class="browser-default" class="validate" name="anioesc">
								<option value="I" >I - Primero</option>
								<option value="II" >II - Segundo</option>
								<option value="III" >III - Tercero</option>
								<option value="IV" >IV - Cuarto</option>
								<option value="V" >V - Quinto</option>
							</select>
						</div>
					</div>

					<div class="col s12">
						<br />
						<br />
						<h5>
							Información de Sala
						</h5>
					</div>
					
					<div class="row">
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
										<td>
											Nombre
										</td>
										<td>
											<?php echo $item['Nombre']; ?>
										</td>
									</tr>
									<tr>
										<td>
											Coordinador
										</td>
										<td>
											<?php echo $item['Coordinador']; ?>
										</td>
									</tr>
									<tr>
										<td>
											Enlace
										</td>
										<td>
											<?php echo $item['Enlace']; ?>
										</td>
									</tr>
									<tr>
										<td>
											Local
										</td>
										<td>
											<?php echo $item['Local']; ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					
					<br />
					<br />
					<button type="submit" class="btn btn-primary deep-orange">
						Guardar y continuar
					</button>
					<a class="btn btn-flat" href="Trabajo.php?Id=<?php echo $_GET['SalaID']; ?>">
		            	Cancelar
		            </a>
					<br />
					<br />
				</form>
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
			?>
		</div>

		<?php
			require("inc/_Layout/Footer.php");
		?>

		<script type="text/javascript">
			//dropdown
			$(document).ready(function() {
				$(".modal-sala").click(function() {
					$("#modal").openModal();
				});
			});
		</script>

	</body>
</html>