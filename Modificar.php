<!DOCTYPE html>
<html lang="es">
	<head>
		<!--Import materialize.css-->
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<title>Sitio Web</title>
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="css/estilos.css"media="screen,projection"/> 
	</head>

	<body class="blue lighten-3">
		<nav>
			<div class="nav-wrapper">
			<a href="#!" class="brand-logo">Logo</a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="index.php">Inicio</a></li>
				<li><a href="administrador">Administrador</a></li>
				<li><a href="Contactos">Javascript</a></li>
				<li><a href="mobile.html">Mobile</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li><a href="index.php">Inicio</a></li>
				<li><a href="badges.html">Adminstrador</a></li>
				<li><a href="contaxtos">Contactos</a></li>
				<li><a href="mobile.html">Mobile</a></li>
			</ul>
			</div>
		</nav>
	
		<section class="container white">
			<form  method="post" action="inc/modificartrabajo.php" enctype="multipart/form-data">

			<?php
					//Archivo PHP para la conexion
					$id=$_REQUEST['id'];
					require('inc/conexion.php');
						
					$consulta="SELECT * FROM trabajos WHERE TrabajoID=$id";
					$resultado=$mysqli->query($consulta);
					while($fila=$resultado->fetch_assoc()){ 
				?>
				
				<input name="id" type="hidden" value="<?php echo $id; ?>" />
				<section class="etiqueta center">
					<h5>Formulario de Inscripción</h5>
					<h5>Trabajos a participar en la JUDC 2016</h5>
					<h5>UNAN FAREM Chontales</h5>
					<h2>* Obligatorio</h2>
				</section>
	 			
	 			<div class="progress yellow" >
      				<div class="indeterminate red"></div>
  				</div>

	 			<div class="input-field col s6">
					<i class="mdi-action-account-circle prefix"></i>
					<label for="icon_prefix">Tema del trabajo *</label>
					<textarea name="tema" type="text" rows="10" cols="40"><?php echo $fila['tema'];?></textarea>
				</div>

				<div class="input-field col s6">
					<label for="icon_prefix">Autor 1 *</label><br>
					<i class="mdi-action-account-circle prefix"></i>
					<input id="icon_prefix" name="autor1" type="text" value="<?php echo $fila['autor1'];?>" class="validate">
				</div>
				
				<div class="input-field col s6">
					<label for="icon_prefix">Autor 2 *</label><br>
					<i class="mdi-action-account-circle prefix"></i>
					<input id="icon_prefix" name="autor2" type="text" value="<?php echo $fila['autor2'];?>" class="validate">
				</div>

				<div class="input-field col s6">
					<label for="icon_prefix">Autor 3 *</label><br>
					<i class="mdi-action-account-circle prefix"></i>
					<input id="icon_prefix" name="autor3" type="text" value="<?php echo $fila['autor3'];?>" class="validate">
				</div>

				<div class="input-field col s6">
					<label for="icon_prefix">Autor 4</label><br>
					<i class="mdi-action-account-circle prefix"></i>
					<input id="icon_prefix" name="autor4" type="text" value="<?php echo $fila['autor4'];?>" class="validate">
				</div>

				<div class="input-field col s6">
					<label for="icon_prefix">Autor 5</label><br>
					<i class="mdi-action-account-circle prefix"></i>
					<input id="icon_prefix" name="autor5" type="text" value="<?php echo $fila['autor5'];?>" class="validate">
				</div>

				<div class="input-field col s6">
					<label for="icon_prefix">Tutor 1</label><br>
					<i class="mdi-action-account-circle prefix"></i>
					<input id="icon_prefix" name="tutor1" type="text" value="<?php echo $fila['tutor1'];?>" class="validate">
				</div>

				<div class="input-field col s6">
					<label for="icon_prefix">Tutor 2</label><br>
					<i class="mdi-action-account-circle prefix"></i>
					<input id="icon_prefix" name="tutor2" type="text"  value="<?php echo $fila['tutor2'];?>" class="validate">
				</div>

				<div class="input-field col s6">
					<label for="icon_prefix">Tutor 3</label><br>
					<i class="mdi-action-account-circle prefix"></i>
					<input id="icon_prefix" name="tutor3" type="text" value="<?php echo $fila['tutor3'];?>" class="validate">
				</div>

				<div class="input-field col s6">
					<label for="icon_prefix">Asesor 1</label><br>
					<i class="mdi-action-account-circle prefix"></i>
					<input id="icon_prefix" name="asesor1" type="text"  value="<?php echo $fila['asesor1'];?>" class="validate">
				</div>

				<div class="input-field col s6">
					<label for="icon_prefix">Asesor 2</label><br>
					<i class="mdi-action-account-circle prefix"></i>
					<input id="icon_prefix" name="asesor2" type="text" value="<?php echo $fila['asesor2'];?>" class="validate">
				</div>

				<div class="input-field col s6">
		 			<label>Tipo de trabajo *</label>
		 			<br><br>
			  		<select class="browser-default" name="tipotrabajo"><?php echo $fila['tipotrabajo'];?>
			  			<?php
			  				if($fila['tipotrabajo'] == ""){
			  					?>
			  						<option selected="" value="" >Seleccione una opción</option>
			  					<?php
			  				}
			  				else
			  				{
			  					?>
			  						<option value="" >Seleccione una opción</option>
			  					<?php
			  				}
			  			?>
			  			<!--HAY ALGO SELECCIONADO-->
			  			<?php
			  				if($fila['tipotrabajo'] == "Informes de investigación científica"){
			  					?>
			  						<option selected="selected" value="Informes de investigación científica">Informes de investigación científica</option> 
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
			  				if($fila['tipotrabajo'] == "Ensayos"){
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
			  				if($fila['tipotrabajo'] == "Proyectos de Desarrollo"){
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
			  				if($fila['tipotrabajo'] == "Pre defensa de Monografías"){
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
			  				if($fila['tipotrabajo'] == "Protocolos"){
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
			  				if($fila['tipotrabajo'] == "Artículos Científicos"){
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
			  				if($fila['tipotrabajo'] == "Software de Aplicación y Páginas Web"){
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
			  				if($fila['tipotrabajo'] == "Procesos de Enfermería"){
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
			  				if($fila['tipotrabajo'] == "Evaluación de Planes de Negocio"){
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
			  				if($fila['tipotrabajo'] == "Aplicaciones  Educativas"){
			  					?>
			  						<option selected="" value="Aplicaciones  Educativas">Aplicaciones  Educativas</option>
			  					<?php
			  				}
			  				else
			  				{
			  					?>
			  						<option value="Aplicaciones  Educativas">Aplicaciones  Educativas</option>
			  					<?php
			  				}
			  			?>
			  			<?php
			  				if($fila['tipotrabajo'] == "Proyectos educativos basados en tecnologías"){
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
			  				if($fila['tipotrabajo'] == "Evaluación de diagnósticos"){
			  					?>
			  						<option selected="" value="Evaluación de diagnósticos">Evaluación de diagnósticos</option>
			  					<?php
			  				}
			  				else
			  				{
			  					?>
			  						<option value="Eva0luación de diagnósticos">Evaluación de diagnósticos</option>
			  					<?php
			  				}
			  			?>
			  			<?php
			  				if($fila['tipotrabajo'] == "Evaluación de casos clínicos"){
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
					
				<div class="input-field col s6">
		 		<label>Departamento al que pertenece *</label>
		 			<br><br>
			  		<select class="browser-default" name="departamento"><?php echo $fila['departamento'];?>
			  			<option value="<?php echo $fila['departamento'];?>">Seleccione una opción</option>
						<option value="Ciencias, Tecnología y Salud">Ciencias, Tecnología y Salud</option> 
						<option value="Ciencias Económicas y Administrativas">Ciencias Económicas y Administrativas</option> 
						<option value="Ciencias de la Educación y Humanidades">Ciencias de la Educación y Humanidades</option>
					</select>
				</div>

				<div class="input-field col s6">
		 			<label>Carrera a la que pertenece *</label>
		 			<br><br>
			  		<select class="browser-default" name="carrera">
						<option value="" >Seleccione una opción</option>
						<?php echo $fila['carrera'];?>
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

				<div class="input-field col s6">
					<label for="icon_prefix">Nota 1</label><br>
					<i class="mdi-action-account-circle prefix"></i>
					<input id="icon_prefix" name="nota1" type="text" value="<?php echo $fila['nota1'];?>"class="validate">
				</div>

				<div class="input-field col s6">
					<label for="icon_prefix">Nota 2</label><br>
					<i class="mdi-action-account-circle prefix"></i>
					<input id="icon_prefix" name="nota2" type="text" value="<?php echo $fila['nota2'];?>" class="validate">
				</div>

				<div class="input-field col s6">
					<label for="icon_prefix">Nota 3</label><br>
					<i class="mdi-action-account-circle prefix"></i>
					<input id="icon_prefix" name="nota3" type="text" value="<?php echo $fila['nota3'];?>" class="validate">
				</div>
	 			
	 			<div class="input-field col s6">
					<label for="icon_prefix">Seleccione el documento en PDF *</label><br>
					<i class="mdi-action-account-circle prefix"></i><br>
					<input align="left" type="file" name="pdf" id="" href="inc/subir.php" value="<?php echo $fila['pdf'];?>" class="validate">
				</div>
				
				<br><br>
				<button type="submit" class="btn btn-primary">Actualizar</button>
				<a href="inc/eliminar.php"></a>
				<br><br>
				<div class="progress blue">
      				<div class="indeterminate red"></div>
  				</div>
				<!-- <button id="enviar"type="button" class="btn waves-effect waves-light"><i class="mdi-content-send right"></i>Enviar</button>-->
				<?php 
					}
				?>
			</form>  	
		</section>
		
			 
		<footer class="page-footer   light-blue darken-3" >
			<h6 class="white-text">© 2016 Wilber A. Cruz Solís</h6>
		</footer>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/codigo.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		
	</body>
</html>