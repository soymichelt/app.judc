<?php
	//Si ya ha iniciado sesion
	require("inc/VerifiedSecurity.php");
	$tmp = VerifiedSesion();

	
	$Title = "Agregar usuario";
	require("inc/conexion.php");
	$mysqli->set_charset("utf8");
	$consulta="SELECT * FROM usuarios";
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
			<div class="container white z-depth-1">
				<div class="row">
					<div class="col s12">
						<div class="content-title indigo z-depth-2 white-text">
							Crear Usuario
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
						<?php
							$err = "";
							if(isset($_GET["Err"])) {
								if(!empty($_GET["Err"])) {
									if($_GET["Err"] == 1) {
										$err = "Es necesario llenar los campos obligatorios (*)";
									}
									else if($_GET["Err"] == 2) {
										$err = "No se han podido guardar los datos. Intente nuevamente.";
									}
								}
							}

							if($err != "") {
						?>
						<div class="chip red">
							<?php echo $err; ?>
							<i class="close material-icons">close</i>
						</div>
						<?php
							}
						?>
						<form id="formulario" method="post" action="inc/UsuarioAgregar.php">
							<div class="custom-input-field col s12">
								<label>Nombres y Apellidos *</label>
								<br />
								<input name="fullname" type="text" class="validate" required="" validate="">
							</div>

							<div class="custom-input-field col s12">
								<label>Correo *</label>
								<br />
								<input name="email" type="text" class="validate" required="" validate="">
							</div>

							<div class="custom-input-field col s12">
								<label>Contraseña *</label>
								<br />
								<input name="passwd" type="password" class="validate" required="" validate="">
							</div>

							<div class="custom-input-field col s12">
								<label>Rol de Usuario *</label>
								<br />
								<select name="rol" class="validate browser-default" required="">
									<option value="1">Usuario Normal</option>
									<option value="2">Usuario Administrador</option>
								</select>
							</div>

							<div class="col s12">
								<br />
								<button type="submit" class="btn btn-primary deep-orange">
									Guardar y continuar
								</button>
								<br />
							</div>
						</form>
					</div>	
				</div>	
			</div>	
		</div>  		
		<?php
			require("inc/_Layout/Footer.php");
		?>

		<script type="text/javascript">
			(function ($) {
			  	$.fn.animatedTabs = function () {
			    	return this.each(initTabs)
			  	}

			  	function initTabs (num,elm) {
			    	var $e = $(elm), 
			        $t = $e.find('.tab a[href]'),
			        pages = getPages($t);  
			      	bind($t,pages);
			  	}
			  
				 function getPages ($t) {
				    var pages = {};
				    $t.each(function (k,elm) {
				      	var href = $(elm).attr('href');
				      	pages[href] = $(href + '-tab');
				    })
			    	return pages;
			 	}
			  
				function bind ($t,pages) {
				    $t.unbind('click.animatedTabs'); // do not bind twice...
				    $t.unbind('recalc'); // do not bind twice...
				    $t.bind('click.animatedTabs',function () {      
				      	var href = $(this).attr('href'),
				        $p = pages[href],
				        $parent = $p.parent(),
				        offset = $p.outerWidth(true) * $parent.children('.page').index($p);
				      	$parent.animate({scrollLeft:offset},500);
					})

					$t.bind('recalc',function () {      
				      	var href = $(this).attr('href'),
				        $p = pages[href],
				        $parent = $p.parent(),
				        offset = $p.outerWidth(true) * $parent.children('.page').index($p);
				      	$parent.animate({scrollLeft:offset},0);
				    })
			  	}
					  
			  	var refresh = true;
			  	$( window ).resize(function() {
			    	if (!refresh) return;
			    	refresh = false;
			    	$('.tab a.active[href]').trigger('recalc');
			
			    	setTimeout(function () {
			    		refresh = true;
			      		$('.tab a.active[href]').trigger('recalc');
			    	},100);
			  	})
			}(jQuery));

			$(function () {
			  	$('ul.tabs').animatedTabs();
			})
		</script>
	</body>
</html>