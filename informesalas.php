<?php
	$Title = "Usuarios";
	require("inc/conexion.php");
	$mysqli->set_charset("utf8");
	$consulta="SELECT trabajos.*, salas.Nombre, salas.Descripcion FROM trabajos INNER JOIN salas ON trabajos.salaID=salas.salaID";
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
		<div class="content">
			<div class="container white z-depth-1">
				<div class="row">
					<div class="col s12">
						<div class="pages">
							<div id="page<?php echo $fila['userID']; ?>-tab" class="page"> 
					  			<h4 class="card white-grey darken-5 center">
					  			<div class="menu-setting fixed-action-btn horizontal click-to-toggle right" style="position: relative;">
									<a class="btn-floating indigo">
										<i class="material-icons">settings</i>
									</a>
									<ul>
										<li><a class="btn-floating blue"><i class="material-icons">print</i></a></li>
									</ul>
								</div>

						  			Informes
						  		</h4>
						  		<div class="row">
						  			<div class="col s12">
										
										<?php while($fila=$resultado->fetch_assoc()){ 
									    ?>
									   		<div class="row">
												<div class="col s12 m12">
													<div class="card white-grey darken-5">
														<div class="card-content">
															<table class="striped">
															<tbody>
																<tr>
																	<td>Sala: </td>
																	<td><?php echo $fila['salaID']; ?></td>
																</tr>
																<tr>
																	<td>Trabajo N° </td>
																	<td><?php echo $fila['trabajoID']; ?></td>
																</tr>
																
																<tr>
																	<td>Tema</td>
																	<td><?php echo $fila['tema']; ?></td>
																</tr>
																<tr>
																	<td>Tipo de trabajo</td>
																	<td><?php echo $fila['tipotrabajo']; ?></td>
																</tr>

																<tr>
																	<td>Autor1</td>
																	<td><?php echo $fila['autor1']; ?></td>
																</tr>
																<tr>
																	<td>Autor2</td>
																	<td><?php echo $fila['autor2']; ?></td>
																</tr>
																<tr>
																	<td>Autor3</td>
																	<td><?php echo $fila['autor3']; ?></td>
																</tr>
																<tr>
																	<td>Autor4</td>
																	<td><?php echo $fila['autor4']; ?></td>
																</tr>
																<tr>
																	<td>Autor5</td>
																	<td><?php echo $fila['autor5']; ?></td>
																</tr>
																
																<tr>
																	<td>Tipo de trabajo</td>
																	<td><?php echo $fila['tipotrabajo']; ?></td>
																</tr>
																<tr>
																	<td>Jurados</td>
																	<td><?php echo $fila['jurado1']; ?></td>
																</tr>
																<tr>
																	<td>Jurado 2</td>
																	<td><?php echo $fila['jurado2']; ?></td>
																</tr>
																<tr>
																	<td>Jurado 3</td>
																	<td><?php echo $fila['jurado3']; ?></td>
																</tr>
																<tr>
																	<td>Asesor2</td>
																	<td><?php echo $fila['asesor2']; ?></td>
																</tr>
																<tr>
																	<td>Carrera</td>
																	<td><?php echo $fila['carrera']; ?></td>
																</tr>
																<tr>
																	<td>Departamento</td>
																	<td><?php echo $fila['departamento']; ?></td>
																</tr>
															</tbody>
														</table>
														</div>
													</div>
												</div>
											</div>

										<?php 
										    } 
										?>
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