<?php
	$Title = "Agregar salas";
	require("inc/conexion.php");
	$mysqli->set_charset("utf8");
	$consulta="SELECT * FROM salas";
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
			<div class="content">

				<div class="container white z-depth-1">
					<div class="row">
						<div class="col s12">
						<h4 class="left">Agregar salas</h4>
							<form class="container" id="formulario" method="post" action="inc/nuevasala.php" enctype="multipart/form-data">
								<input name="id" type="hidden" value="<?php echo $id;?>" />
					 			
					 			<div class="progress yellow" >
				      				<div class="indeterminate red"></div>
				  				</div>

								<div class="input-field col s12">
									<label for="icon_prefix">Nombre sala</label><br>
									<i class="mdi-action-account-circle prefix"></i>
									<input id="icon_prefix" name="Nombre" type="text" class="validate">
								</div>

								<div class="input-field col s12">
									<label for="icon_prefix">Descripción</label><br>
									<i class="mdi-action-account-circle prefix"></i>
									<input id="icon_prefix" name="Descripcion" type="text" class="validate">
								</div>

								<div class="input-field col s12">
									<label for="icon_prefix">Local</label><br>
									<i class="mdi-action-account-circle prefix"></i>
									<input id="icon_prefix" name="local" type="text" class="validate">
								</div>

								<div class="input-field col s12">
									<label for="icon_prefix">Coordinador</label><br>
									<i class="mdi-action-account-circle prefix"></i>
									<input id="icon_prefix" name="coordinador" type="text" class="validate">
								</div>

								<div class="input-field col s12">
									<label for="icon_prefix">Enlace</label><br>
									<i class="mdi-action-account-circle prefix"></i>
									<input id="icon_prefix" name="enlace" type="text" class="validate">
								</div>

								<div class="center">
									<button type="submit" class="btn btn-primary">Guardar y continuar</button><br><br>
								</div>
								
								<br><br>
								<div class="progress blue">
				      				<div class="indeterminate red"></div>
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