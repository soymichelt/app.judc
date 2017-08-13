<?php
	//Si ya ha iniciado sesion
	require("inc/VerifiedSecurity.php");
	$tmp = VerifiedSesion();

	$Title = "Agregar Sala";
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
				<div class="row">
					<div class="col s12">
						<div class="content-title indigo z-depth-2 white-text">
							Agregar Sala
							<div class="content-title-action right" style="padding-top:7px;padding-right:7px;">
								<div class="menu-setting fixed-action-btn horizontal click-to-toggle" style="position: relative;">
									<a class="btn-floating btn-flat">
										<i class="material-icons">settings</i>
									</a>
									<ul>
										<li>
											<a href="Sala.php" class="btn-floating blue modal-trigger modal-sala">
												<i class="material-icons">library_books</i>
											</a>
										</li>
										<li>
											<a href="infsalas.php" target="_blank" class="btn-floating blue modal-trigger modal-sala">
												<i class="material-icons">print</i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<form method="POST" action="inc/SalaAgregar.php">
					<div class="row">
						<div class="page">
							<div class="custom-input-field col s12">
								<label for="nombre">Nombre de sala *</label>
								<br />
								<input id="nombre" name="nombre" type="text" class="validate" validate="">
							</div>
							<div class="custom-input-field col s12">
								<label for="descripcion">Descripción</label>
								<br />
								<textarea id="descripcion" name="descripcion" type="text" rows="10" cols="40" style="height: 80px; resize: none;"></textarea>
							</div>
							<div class="custom-input-field col s12">
								<label for="coordinador">Coordinador *</label>
								<br />
								<input id="coordinador" name="coordinador" type="text" class="validate" validate="">
							</div>
							<div class="custom-input-field col s12">
								<label for="enlace">Enlace *</label>
								<br />
								<input id="enlace" name="enlace" type="text" class="validate" validate="">
							</div>
							<div class="custom-input-field col s12">
								<label for="local">Local *</label>
								<br />
								<input id="local" name="local" type="text" class="validate" validate="">
							</div>

							<div class="custom-input-fild col s12">
								<br />
								<button type="submit" class="btn btn-primary deep-orange">
									Guardar y continuar
								</button>
								<a class="btn btn-flat" href="Sala.php">
									Cancelar
								</a>
							</div>
							
						</div>
					</div>
				</form>
			</div>
		</div>

		<?php
			require("inc/_Layout/Footer.php");
		?>
	</body>
</html>