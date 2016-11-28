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
		<!-- Modal Trigger -->
		<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

		<!-- Modal Structure -->
		<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>Modal Header</h4>
				<p>A bunch of text</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
		
		<script>
			$(document).ready(function(){
				// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
				$('.modal-trigger').leanModal();
			});
		</script>
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/codigo.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>