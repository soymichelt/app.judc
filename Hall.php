<?php
	$Title = "Salas";
	require("inc/conexion.php");
	$res = $mysqli->query("SELECT salas.salaID, salas.Nombre, salas.Descripcion, salas.FileName FROM salas ORDER BY Salas.SalaID");
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
		<!--Se carga el menu-->
		<?php
			require("inc/_Layout/Menu.php");
		?>
		<?php
			require("inc/_Layout/MenuAside.php");
		?>
		
		<!--CONTENIDO-->
		<div class="container">
			<div class="row">
				<?php
					if(!$res){
						echo "Ha ocurrido un error recargue la página.";
					}
					else {
						while($item = $res->fetch_assoc()) {
						?>
						<div class="col s12 m6">
							<div class="card medium">
								<div class="card-image">
									<img src="img/Sala/<?php echo $item['FileName']; ?>.jpg">
								</div>
								<div class="card-content">
									<span class="card-title activator grey-text text-darken-4">
										Sala # <?php echo $item['salaID']." ".$item['Nombre']; ?>
									</span>
									<p>
										<?php echo $item['Descripcion'] ?>
									</p>
								</div>
								<div class="card-action">
									<a class="btn-floating right" href="#">
										<i class="large material-icons">language</i>
									</a>
								</div>
							</div>
				        </div>
						<?php
						}
					}
				?>
			</div>
		</div>

	</body>
</html>