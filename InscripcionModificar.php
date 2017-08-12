<?php
	//Si ya ha iniciado sesion
	require("inc/VerifiedSecurity.php");
	$tmp = VerifiedSesion();
	if($tmp == 0) {
		header("Location: Signin.php");
	}

	$Title = "Modificación de Trabajo";

	//Se valida que se ingrese SalaID
	if(!isset($_GET['Id'])) {
		header('Location: Sala.php');
	}
	else {
		if(empty($_GET['Id'])) {
			header('Location: Sala.php');
		}
	}

	//Se carga la conexion
	require('inc/conexion.php');
	$mysqli->set_charset("utf8");

	//Se valida que la Sala exista en la BD
	$res = $mysqli->query("SELECT trabajos.*, salas.nombre, salas.coordinador, salas.enlace, salas.local FROM trabajos INNER JOIN salas ON trabajos.salaID = salas.salaID WHERE trabajoID = ".$_GET['Id']);
	if(!$res) {
		header('Location: Sala.php');
	}
	else {
		if($res->num_rows == 0) {
			header('Location: Sala.php');
		}
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
				//Archivo PHP para la conexion
				while($item=$res->fetch_assoc()){ 
			?>
			<section class="container white">
				<div class="content-title z-depth-2 indigo white-text">
					Edici&oacute;n de Trabajo
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
										<a href="Sala.php" class="btn-floating blue modal-trigger">
											<i class="material-icons">library_books</i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<form  method="post" action="inc/InscripcionModificar.php">
					<input name="TrabajoID" type="hidden" value="<?php echo $_GET['Id']; ?>" />
					<div class="row">
						<div class="col s12">
							<?php
								if(isset($_GET['Err'])) {
									if(!empty($_GET['Err'])) {
							?>
							<div class="chip red">
								Error al actualizar los datos intente nuevamente
								<i class="close material-icons">close</i>
							</div>
							<br />
							<?php
									}
								}
							?>
						</div>
					</div>
					<div class="row">
						<div class="custom-input-field col s12">
			 				<label for="icon_prefix">Tema del trabajo *</label>
			 				<br />
							<textarea name="tema" type="text" rows="10" cols="40" style="height: 80px; resize: none;"><?php echo $item['Tema'];?></textarea>
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Autor 1 *</label>
							<br />
							<input name="autor1" type="text" class="validate" validate="" value="<?php echo $item['Autor1'];?>">
						</div>
						
						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Autor 2</label><br>
							<input name="autor2" type="text" class="validate" value="<?php echo $item['Autor2'];?>">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Autor 3</label>
							<br />
							<input name="autor3" type="text" class="validate" value="<?php echo $item['Autor3'];?>">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Autor 4</label>
							<br />
							<input name="autor4" type="text" class="validate" value="<?php echo $item['Autor4'];?>">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Autor 5</label>
							<br />
							<input name="autor5" type="text" class="validate" value="<?php echo $item['Autor5'];?>">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Autor 6</label>
							<br />
							<input name="autor6" type="text" class="validate" value="<?php echo $item['Autor6'];?>">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Tutor 1 *</label>
							<br />
							<input name="tutor1" type="text" class="validate" value="<?php echo $item['Tutor1'];?>">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Tutor 2</label>
							<br />
							<input name="tutor2" type="text" value="<?php echo $item['Tutor2'];?>">
						</div>

						<div class="custom-input-field col s12 m4">
							<label for="icon_prefix">Tutor 3</label>
							<br />
							<input name="tutor3" type="text" value="<?php echo $item['Tutor3'];?>">
						</div>

						<div class="custom-input-field col s12 m6">
							<label for="icon_prefix">Asesor 1</label>
							<br />
							<input name="asesor1" type="text" value="<?php echo $item['Asesor1'];?>">
						</div>

						<div class="custom-input-field col s12 m6">
							<label for="icon_prefix">Asesor 2</label>
							<br />
							<input name="asesor2" type="text" value="<?php echo $item['Asesor2'];?>">
						</div>

						<div class="col s12 m6">
							<div class="row">
								<div class="custom-input-field col s12">
									<label for="icon_prefix">Jurado 1</label>
									<br />
									<input name="jurado1" type="text" class="validate" value="<?php echo $item['Jurado1'];?>">	
								</div>
							</div>
						</div>

						<div class="col s12 m6">
							<div class="row">
								<div class="custom-input-field col s12">
									<label for="icon_prefix">Jurado 2</label>
									<br />
									<input name="jurado2" type="text" class="validate" value="<?php echo $item['Jurado2'];?>">	
								</div>
							</div>
						</div>

						<div class="custom-input-field col s12 m6">
				 			<label>Tipo de trabajo *</label>
				 			<br><br>
					  		<select class="browser-default" class="validate" name="tipotrabajo" >
								<?php
					  				if($item['Tipotrabajo'] == "Informes de investigación científica"){
					  					?>
					  						<option selected="" value="Informes de investigación científica">Informes de investigación científica</option> 
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Informes de investigación científica">Informes de investigación científica</option>
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['Tipotrabajo'] == "Ensayos"){
					  					?>
					  						<option selected="" value="Ensayos">Ensayos</option> 
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Ensayos">Ensayos</option> 
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['Tipotrabajo'] == "Proyectos de Desarrollo"){
					  					?>
					  						<option selected="" value="Proyectos de Desarrollo">Proyectos de Desarrollo</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Proyectos de Desarrollo">Proyectos de Desarrollo</option>
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['Tipotrabajo'] == "Pre defensa de Monografías"){
					  					?>
					  						<option selected="" value="Pre defensa de Monografías">Pre defensa de Monografías</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Pre defensa de Monografías">Pre defensa de Monografías</option> 
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['Tipotrabajo'] == "Protocolos"){
					  					?>
					  						<option selected="" value="Protocolos">Protocolos</option> 
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Protocolos">Protocolos</option>
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['Tipotrabajo'] == "Artículos Científicos"){
					  					?>
					  						<option selected="" value="Artículos Científicos">Artículos Científicos</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Artículos Científicos">Artículos Científicos</option>
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['Tipotrabajo'] == "Software de Aplicación y Páginas Web"){
					  					?>
					  						<option selected="" value="Software de Aplicación y Páginas Web">Software de Aplicación y Páginas Web</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Software de Aplicación y Páginas Web">Software de Aplicación y Páginas Web</option> 
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['Tipotrabajo'] == "Procesos de Enfermería"){
					  					?>
					  						<option selected="" value="Procesos de Enfermería">Procesos de Enfermería</option> 
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Procesos de Enfermería">Procesos de Enfermería</option>
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['Tipotrabajo'] == "Evaluación de Planes de Negocio"){
					  					?>
					  						<option selected="" value="Evaluación de Planes de Negocio">Evaluación de Planes de Negocio</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Evaluación de Planes de Negocio">Evaluación de Planes de Negocio</option>
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['Tipotrabajo'] == "Aplicaciones Educativas"){
					  					?>
					  						<option selected="" value="Aplicaciones Educativas">Aplicaciones Educativas</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Aplicaciones Educativas">Aplicaciones Educativas</option>
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['Tipotrabajo'] == "Proyectos educativos basados en tecnologías"){
					  					?>
					  						<option selected="" value="Proyectos educativos basados en tecnologías">Proyectos educativos basados en tecnologías</option> 
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Proyectos educativos basados en tecnologías">Proyectos educativos basados en tecnologías</option> 
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['Tipotrabajo'] == "Evaluación de diagnósticos"){
					  					?>
					  						<option selected="" value="Evaluación de diagnósticos">Evaluación de diagnósticos</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Evaluación de diagnósticos">Evaluación de diagnósticos</option>
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['Tipotrabajo'] == "Evaluación de casos clínicos"){
					  					?>
					  						<option selected="" value="Evaluación de casos clínicos">Evaluación de casos clínicos</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Evaluación de casos clínicos">Evaluación de casos clínicos</option>
					  					<?php
					  				}
					  			?>
							</select>
						</div>

						<div class="custom-input-field col s12 m6">
				 			<label>Departamento al que pertenece *</label>
				 			<br><br>
					  		<select class="browser-default" class="validate" name="departamento">
					  			<?php
					  				if($item['departamento'] == "Ciencias, Tecnología y Salud"){
					  					?>
					  						<option selected="" value="Ciencias, Tecnología y Salud">Ciencias, Tecnología y Salud</option> 
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Ciencias, Tecnología y Salud">Ciencias, Tecnología y Salud</option> 
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['departamento'] == "Ciencias Económicas y Administrativas"){
					  					?>
					  						<option selected="" value="Ciencias Económicas y Administrativas">Ciencias Económicas y Administrativas</option> 
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Ciencias Económicas y Administrativas">Ciencias Económicas y Administrativas</option> 
					  					<?php
					  				}
					  			?>
								<?php
					  				if($item['departamento'] == "Ciencias de la Educación y Humanidades"){
					  					?>
					  						<option selected="" value="Ciencias de la Educación y Humanidades">Ciencias de la Educación y Humanidades</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Ciencias de la Educación y Humanidades">Ciencias de la Educación y Humanidades</option>
					  					<?php
					  				}
					  			?>
							</select>
						</div>

						<div class="custom-input-field col s12 m6">
				 			<label>Carrera a la que pertenece *</label>
				 			<br><br>
					  		<select class="browser-default" class="validate" name="carrera">

					  			<?php
					  				if($item['carrera'] == "Biología"){
					  					?>
					  						<option selected="" value="Biología">Biología</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Biología">Biología</option> 
					  					<?php
					  				}
					  			?>

					  			<?php
					  				if($item['carrera'] == "Ciencias Naturales"){
					  					?>
					  						<option selected="" value="Ciencias Naturales">Ciencias Naturales</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Ciencias Naturales">Ciencias Naturales</option> 
					  					<?php
					  				}
					  			?>

					  			<?php
					  				if($item['carrera'] == "Ciencias Sociales"){
					  					?>
					  						<option selected="" value="Ciencias Sociales">Ciencias Sociales</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Ciencias Sociales">Ciencias Sociales</option> 
					  					<?php
					  				}
					  			?>

					  			<?php
					  				if($item['carrera'] == "Cultura y Artes"){
					  					?>
					  						<option selected="" value="Cultura y Artes">Cultura y Artes</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Cultura y Artes">Cultura y Artes</option> 
					  					<?php
					  				}
					  			?>

					  			<?php
					  				if($item['carrera'] == "Español"){
					  					?>
					  						<option selected="" value="Español">Español</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Español">Español</option> 
					  					<?php
					  				}
					  			?>

					  			<?php
					  				if($item['carrera'] == "Física-Matemática"){
					  					?>
					  						<option selected="" value="Física-Matemática">Física-Matemática</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Física-Matemática">Física-Matemática</option> 
					  					<?php
					  				}
					  			?>

					  			<?php
					  				if($item['carrera'] == "Informática Educativa"){
					  					?>
					  						<option selected="" value="Informática Educativa">Informática Educativa</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Informática Educativa">Informática Educativa</option> 
					  					<?php
					  				}
					  			?>

					  			<?php
					  				if($item['carrera'] == "Inglés"){
					  					?>
					  						<option selected="" value="Inglés">Inglés</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Inglés">Inglés</option> 
					  					<?php
					  				}
					  			?>

					  			<?php
					  				if($item['carrera'] == "Lengua y Literatura Hispánicas"){
					  					?>
					  						<option selected="" value="Lengua y Literatura Hispánicas">Lengua y Literatura Hispánicas</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Lengua y Literatura Hispánicas">Lengua y Literatura Hispánicas</option> 
					  					<?php
					  				}
					  			?>

					  			<?php
					  				if($item['carrera'] == "Matemática"){
					  					?>
					  						<option selected="" value="Matemática">Matemática</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Matemática">Matemática</option>
					  					<?php
					  				}
					  			?>

					  			<?php
					  				if($item['carrera'] == "Pedagogía con mención en Educación para la Diversidad"){
					  					?>
					  						<option selected="" value="Pedagogía con mención en Educación para la Diversidad">Pedagogía con mención en Educación para la Diversidad</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Pedagogía con mención en Educación para la Diversidad">Pedagogía con mención en Educación para la Diversidad</option>
					  					<?php
					  				}
					  			?>

					  			<?php
					  				if($item['carrera'] == "Pedagogía con mención en Educación Infantil"){
					  					?>
					  						<option selected="" value="Pedagogía con mención en Educación Infantil">Pedagogía con mención en Educación Infantil</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Pedagogía con mención en Educación Infantil">Pedagogía con mención en Educación Infantil</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Psicología"){
					  					?>
					  						<option selected="" value="Psicología">Psicología</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Psicología">Psicología</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Bioanálisis Clínico"){
					  					?>
					  						<option selected="" value="Bioanálisis Clínico">Bioanálisis Clínico</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Bioanálisis Clínico">Bioanálisis Clínico</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Ciencias Ambientales"){
					  					?>
					  						<option selected="" value="Ciencias Ambientales">Ciencias Ambientales</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Ciencias Ambientales">Ciencias Ambientales</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Enfermería en Materno Infantil"){
					  					?>
					  						<option selected="" value="Enfermería en Materno Infantil">Enfermería en Materno Infantil</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Enfermería en Materno Infantil">Enfermería en Materno Infantil</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Enfermería en Salud Pública"){
					  					?>
					  						<option selected="" value="Enfermería en Salud Pública">Enfermería en Salud Pública</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Enfermería en Salud Pública">Enfermería en Salud Pública</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Sistemas de Información"){
					  					?>
					  						<option selected="" value="Sistemas de Información">Sistemas de Información</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Sistemas de Información">Sistemas de Información</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Ingeniería Agroindustrial"){
					  					?>
					  						<option selected="" value="Ingeniería Agroindustrial">Ingeniería Agroindustrial</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Ingeniería Agroindustrial">Ingeniería Agroindustrial</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Ingeniería Agronómica"){
					  					?>
					  						<option selected="" value="Ingeniería Agronómica">Ingeniería Agronómica</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Ingeniería Agronómica">Ingeniería Agronómica</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Ingeniería Industrial y de Sistemas"){
					  					?>
					  						<option selected="" value="Ingeniería Industrial y de Sistemas">Ingeniería Industrial y de Sistemas</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Ingeniería Industrial y de Sistemas">Ingeniería Industrial y de Sistemas</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Medicina"){
					  					?>
					  						<option selected="" value="Medicina">Medicina</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Medicina">Medicina</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Topografía"){
					  					?>
					  						<option selected="" value="Topografía">Topografía</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Topografía">Topografía</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Turismo Sostenible"){
					  					?>
					  						<option selected="" value="Turismo Sostenible">Turismo Sostenible</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Turismo Sostenible">Turismo Sostenible</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Administración de Empresas"){
					  					?>
					  						<option selected="" value="Administración de Empresas">Administración de Empresas</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Administración de Empresas">Administración de Empresas</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Banca y Finanzas"){
					  					?>
					  						<option selected="" value="Banca y Finanzas">Banca y Finanzas</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Banca y Finanzas">Banca y Finanzas</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Contaduría Pública y Finanzas"){
					  					?>
					  						<option selected="" value="Contaduría Pública y Finanzas">Contaduría Pública y Finanzas</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Contaduría Pública y Finanzas">Contaduría Pública y Finanzas</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['carrera'] == "Mercadotecnia"){
					  					?>
					  						<option selected="" value="Mercadotecnia">Mercadotecnia</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="Mercadotecnia">Mercadotecnia</option>
					  					<?php
					  				}
					  			?>
							</select>
						</div>
						<div class="custom-input-field col s12 m6">
				 			<label>Año Escolar *</label>
				 			<br><br>
					  		<select class="browser-default" class="validate" name="anioesc">
					  			<?php
					  				if($item['anioesc'] == "I"){
					  					?>
					  						<option selected="" value="I">I - Primero</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="I">I - Primero</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['anioesc'] == "II"){
					  					?>
					  						<option selected="" value="II">II - Segundo</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="II">II - Segundo</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['anioesc'] == "III"){
					  					?>
					  						<option selected="" value="III">III - Tercero</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="III">III - Tercero</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['anioesc'] == "IV"){
					  					?>
					  						<option selected="" value="IV">IV - Cuarto</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="IV">IV - Cuarto</option>
					  					<?php
					  				}
					  			?>
					  			<?php
					  				if($item['anioesc'] == "V"){
					  					?>
					  						<option selected="" value="V">V - Quinto</option>
					  					<?php
					  				}
					  				else
					  				{
					  					?>
					  						<option value="V">V - Quinto</option>
					  					<?php
					  				}
					  			?>
							</select>
						</div>
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
											<?php echo $item['nombre']; ?>
										</td>
									</tr>
									<tr>
										<td>
											Coordinador
										</td>
										<td>
											<?php echo $item['coordinador']; ?>
										</td>
									</tr>
									<tr>
										<td>
											Enlace
										</td>
										<td>
											<?php echo $item['enlace']; ?>
										</td>
									</tr>
									<tr>
										<td>
											Local
										</td>
										<td>
											<?php echo $item['local']; ?>
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
					<a class="btn btn-flat" href="Trabajo.php?Id=<?php echo $item['SalaId']; ?>">
		            	Cancelar
		            </a>
					<br />
					<br />
					
				</form>  	
			</section>
			

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