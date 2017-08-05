<?php
	//Si ya ha iniciado sesion
	require("inc/VerifiedSecurity.php");
	$tmp = VerifiedSesion();


	$Title = "Salas";
	require("inc/conexion.php");
	$mysqli->set_charset("utf8");
	$consulta="SELECT * FROM salas";
    $resultado=$mysqli->query($consulta);
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
							Salas
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
				<div class="row">
					<div class="col s12">
						<div>
							<div class="page"> 
						  		<div class="row">
						  			<div class="col s12">
						  			  <table id="example" class="table table-hover condensed striped responsive-table" >
									    <thead>
									      <tr>
									        <th>ID</th>
									        <th>Nombre</th>
									        <th>Coordinador</th>
									        <th>Enlace</th>
									        <th>Local</th>
									        <th></th>
									      </tr>
									    </thead>
									    
									    <tbody>
										
										
										  <?php 
										 	if($resultado){ 
											while($fila=$resultado->fetch_assoc()){ 
									      ?>
									      <tr>
									        <td>
									        	<?php echo $fila['salaID']; ?>
									        </td>
									        <td>
									        	<?php echo $fila['Nombre']; ?>
									        </td>
									        <td>
									        	<?php echo $fila['coordinador']; ?>
									        </td>
									        <td>
									        	<?php echo $fila['enlace']; ?>
									        </td>
									        <td>
									        	<?php echo $fila["local"]; ?>
									        </td>
									        <td>
									        	<?php
									        		if($tmp == 1) {
									        	?>
									        	<a class='dropdown-button btn btn-flat btn-floating custom-btn-flat' href='javascript:void(0);' data-activates='dropdown<?php echo $fila['salaID']; ?>'>
					  								<i style="font-size:16px;" class="material-icons">query_builder</i>
					  							</a>
					  							<ul id='dropdown<?php echo $fila['salaID']; ?>' class='dropdown-content'>
					  								<li>
														<a class="deep-orange-text" href="Trabajo.php?Id=<?php echo $fila['salaID']; ?>">
															Trabajos
														</a>
													</li>
					  							</ul>
									        	<?php
											
									        		}
									        	?>
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
					</div>
				</div>
			</div>
		</div>

		<?php
			require("inc/_Layout/Footer.php");
		?>
	</body>
</html>