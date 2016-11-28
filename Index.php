<?php
	header("Location: Sala.php");
	//Si ya ha iniciado sesion
	require("inc/VerifiedSecurity.php");
	$tmp = VerifiedSesion();

	
	$Title = "Inicio";
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

		<!--CARRUSEL DE IMAGENES-->
		<div class="slider">
			<ul class="slides">
				<li>
					<img src="img/Images/DSC07817.jpg">
					<div class="caption left-align">
						<h3>Left Aligned Caption</h3>
						<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
					</div>
				</li>
				<li>
					<img src="img/Images/DSC07884.jpg">
					<div class="caption right-align">
						<h3>Right Aligned Caption</h3>
						<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
					</div>
				</li>
				<li>
					<img src="img/Images/DSC07889.jpg">
					<div class="caption center-align">
						<h3>This is our big Tagline!</h3>
						<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
					</div>
				</li>
			</ul>
		</div>
		<!--<div class="carousel carousel-slider center" data-indicators="true">
			<div class="carousel-fixed-item center">
				<a href="Trabajo.php" class="btn btn-large waves-effect white grey-text text-darken-5">Mira la Competencia</a>
			</div>
			<div class="carousel-item indigo white-text" href="#one!">
				<h2>First Panel</h2>
				<p class="white-text">This is your first panel</p>
			</div>
			<div class="carousel-item amber white-text" href="#two!">
				<h2>Second Panel</h2>
				<p class="white-text">This is your second panel</p>
			</div>
			<div class="carousel-item green white-text" href="#three!">
				<h2>Third Panel</h2>
				<p class="white-text">This is your third panel</p>
			</div>
			<div class="carousel-item blue white-text" href="#four!">
				<h2>Fourth Panel</h2>
				<p class="white-text">This is your fourth panel</p>
			</div>
		</div>-->
		<!--FIN CARRUSEL-->

		<div class="row">
			<div class="col m12">
				
			</div>
		</div>
		<div class="space"></div>

		<div class="container">
			<div class="row">
				<div class="col s12 m4">
					<div class="center">
						<i class="material-icons indigo-text text-lighten-3" style="font-size:7em;">flash_on</i>
					</div>
					<h4 class="caption center">Estudiantes</h4>
					<p class="center">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur.
					</p>
				</div>
				<div class="col s12 m4">
					<div class="center">
						<i class="material-icons indigo-text text-lighten-3" style="font-size:7em;">group</i>
					</div>
					<h4 class="caption center">Inscribete</h4>
					<p class="center">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur.
					</p>
				</div>
				<div class="col s12 m4">
					<div class="center">
						<i class="material-icons indigo-text text-lighten-3" style="font-size:7em;">settings</i>
					</div>
					<h4 class="caption center">Emprende</h4>
					<p class="center">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur.
					</p>
				</div>
			</div>	
		</div>

		<div class="space"></div>

		<div class="parallax-container">
			<div class="parallax">
				<img src="img/Background/c04_large_masthead.img.fullhd.medium.jpg" />
			</div>
		</div>

		<div class="space"></div>

		<div class="container">
			<div class="row">
				<div class="col s12 m8">
					<form method="inc/Contact.php" action="POST">
						<h3>Contactenos</h3>
						<div class="input-field col s12 m6">
							<input name="FirstName" placeholder="Nombres" id="first_name" type="text" class="validate">
							<label for="first_name">Nombres</label>
						</div>
						<div class="input-field col s12 m6">
							<input name="LastName" placeholder="Apellidos" id="last_name" type="text" class="validate">
							<label for="last_name">Apellidos</label>
						</div>
						<div class="input-field col s12 m12">
							<input name="Email" placeholder="Correo Electr&oacute;nico" id="email" type="email" class="validate">
							<label for="email">Correo Electr&oacute;nico</label>
						</div>
						<div class="input-field col s12 m12">
							<textarea name="Content" id="content" placeholder="Contenido" class="materialize-textarea" class="validate"></textarea>
							<label for="content">Contenido</label>
						</div>
					</form>
				</div>
				<div class="col s12 m4">
					<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.1833801912044!2d-85.3812252847376!3d12.09959519143214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f7363be505fc583%3A0xcea4c8ceb9dc7097!2sUNAN+FAREM+Chontales!5e0!3m2!1ses!2sni!4v1475622425226" frameborder="0" style="border:0;" allowfullscreen></iframe>
				</div>
			</div>
		</div>

		<?php
			require("inc/_Layout/Footer.php");
		?>
		<?php
			require("inc/_Layout/IniciarSesion.php");
		?>
		<script type="text/javascript">
			$(document).ready(function() {
				 //$('.carousel.carousel-slider').carousel({full_width: true});
				 $('.slider').slider();
				 $(".parallax").parallax();
			});
		</script>
	</body>
</html>