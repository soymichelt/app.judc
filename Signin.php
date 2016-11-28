<?php
	//Si ya ha iniciado sesion
	require("inc/VerifiedSecurity.php");
	$tmp = VerifiedSesion();
	if($tmp == 1) {
		header("Location: Index.php");
	}


	$Title = "Iniciar Sesión";
	require("inc/conexion.php");
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
		<!--Se carga el menu-->
		<?php
			require("inc/_Layout/MenuAside.php");
		?>

		<div class="bg indigo"></div>
		<div style="height: 72px;"></div>

		<!--CONTENIDO-->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col m3">
						
					</div>
					<div class="col s12 m6">
						<form action="inc/Signin.php" method="POST">
							<div class="card">
								<!--<div class="card-image">
									<img src="img/Signin.jpg">
								</div>-->
								<div class="card-content">
									<h3 class="center">
										Iniciar Sesión
									</h3>
									<p>
										<div class="row">
											<div class="input-field col s12">
												<i class="material-icons prefix">phone</i>
												<input name="UserName" id="email" type="text" class="validate">
												<label for="email">Nombre de Usuario</label>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<i class="material-icons prefix">account_circle</i>
												<input name="UserPassword" id="password" type="password" class="validate">
												<label for="password">Password</label>
											</div>
										</div>
										<div class="row">
											<div class="center">
												<?php
													if(isset($_GET['Err'])) {
														if(empty($_GET['Err'])) {
												?>

												<?php
														}
														else {
												?>
																<div class="chip red">
												<?php
																	switch($_GET['Err']) {
																		case "1":
																			echo "Favor ingresar Usuario y Contraseña";
																		break;
																		case "2":
																			echo "Ha ocurrido un problema intentar mas tarde";
																		break;
																		case "3":
																			echo "Usuario o Contraseña incorrectos";
																		break;
																	}
												?>
																	<i class="close material-icons">close</i>
																</div>
												<?php
														}
													}
													else {
												?>

												<?php
													}
												?>
											</div>
										</div>
									</p>
								</div>
								<div class="card-action">
									<div class="center">
										<button type="submit" class="btn deep-orange darken-1">
											Iniciar Sesión
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>


		<?php
			require("inc/_Layout/Footer.php");
		?>
	</body>
</html>