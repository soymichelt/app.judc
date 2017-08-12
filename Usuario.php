<?php
	//Si ya ha iniciado sesion
	require("inc/VerifiedSecurity.php");
	$tmp = VerifiedSesion();

	
	$Title = "Usuarios";
	require("inc/conexion.php");
	$mysqli->set_charset("utf8");
	$consulta="SELECT * FROM usuarios";
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
							Usuarios
							<div class="content-title-action right" style="padding-top:7px;padding-right:7px;">
								<div class="menu-setting fixed-action-btn horizontal click-to-toggle" style="position: relative;">
									<a class="btn-floating btn-flat">
										<i class="material-icons">settings</i>
									</a>
									<ul>
										<li>
											<a href="UsuarioAgregar.php" class="btn-floating green">
												<i class="material-icons">add</i>
											</a>
										</li>
										<li>
											<a href="Usuario.php" class="btn-floating blue modal-trigger modal-sala">
												<i class="material-icons">supervisor_account</i>
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
						  			  <table id="example" class="table table-hover condensed striped" >
									    <thead>
									      <tr>
									        <th>ID</th>
									        <th>Nombre</th>
									        <th>Correo Electrónico</th>
									        <th>Contraseña</th>
									        <th>Rol</th>
									        <th></th>
									      </tr>
									    </thead>
									    
									    <tbody>
									      <?php while($fila=$resultado->fetch_assoc()){ 
									      ?>
									      <tr>
									        <td>
									        	<?php echo $fila['UserId']; ?>
									        </td>
									        <td>
									        	<?php echo $fila['fullname']; ?>
									        </td>
									        <td>
									        	<?php echo $fila['email']; ?>
									        </td>
									        <td>
									        	<?php echo $fila['password']; ?>
									        </td>
									        <td>
									        	<?php
									        		if($fila["rol"]) {
									        			echo "Normal";
									        		}
									        		else {
									        			echo "Administrador";
									        		}
									        	?>
									        </td>

									      </tr>       
									      <?php 
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