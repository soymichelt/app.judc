<?php
	require_once("inc/dompdf/dompdf_config.inc.php");  //enlace a convertidor pdf
	require("inc/conexion.php");						//conexion a la base de datos
	$resSala = $mysqli->query("SELECT * FROM salas");  	//consulta a la tabla salas
	if(!$resSala) {
		echo "Error al cargar las salas";
	}
	else {
		$html='
			<!DOCTYPE html>
				<html>
					<head>
						<title>SALAS</title>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					</head>
					<body>
		';
		while($itemSala = $resSala->fetch_assoc()) {
			$consulta = $mysqli->query("SELECT trabajos.*, salas.nombre, salas.coordinador, salas.enlace, salas.local FROM trabajos INNER JOIN salas ON trabajos.SalaID = salas.SalaID WHERE salas.SalaID=".$itemSala['salaID']." ORDER BY trabajos.promedio DESC"); //consulta a la tabal trabajos
			$html=$html.'
						<h3><center>Universidad Nacional Autónoma de Nicaragua, Managua</center></br>
						<center>Facultad Regional Multidisciplinaria de Chontales</center></br>
						<center>UNAN FAREM Chontales</center></h3>
						<center><img src="img/unan.png" width="40px" heigth="50px"></center>
						<h2><center>INFORME DE SALAS</center></h2>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<td colspan="2">
										<center>
											<br />
											<strong>
												Sala '.$itemSala['salaID'].': '.$itemSala['Nombre'].'
											</strong>
											<br />
										</center>
									</td>
									<td colspan="2">
										<center>
											<br />
											<strong>
												Coordinador
												<br />
												'.$itemSala['coordinador'].'
											</strong>
											<br />
										</center>
									</td>
									<td colspan="2">
										<center>
											<br />
											<strong>
												ENLACE
												<br />
												'.$itemSala['enlace'].'
											</strong>
											<br />
										</center>
									</td>
									<td colspan="3">
										<center>
											<br />
											<strong>
												LOCAL
												<br />
												'.$itemSala['local'].'
											</strong>
											<br />
										</center>
									</td>
								</tr>
							</thead>
						</table>
						<br />
						<table border="1" width="100%" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td>
										<center>
											<strong>
												Tema
											</strong>
										</center>
									</td>
									<td>
										<center>
											<strong>
												Autores
											</strong>
										</center>
									</td>
									<td>
										<center>
											<strong>
												Tipo Trabajo
											</strong>
										</center>
									</td>
									<td>
										<center>
											<strong>
												Carrera y año
											</strong>
										</center>
									</td>
									<td>
										<center>
											<strong>
												Tutor
											</strong>
										</center>
									</td>
									<td>
										<center>
											<strong>
												Promedio
											</strong>
										</center>
									</td>
								</tr>
				';
				while($item = $consulta->fetch_assoc()) {
					//AUTORES
					//Autor numero 1
					$autor = $item['autor1'];
					if(!empty($item['autor2'])) {
						//Autor numero 2
						$autor = $autor."<br />".$item['autor2'];
						if(!empty($item['autor3'])) {
							//Autor numero 3
							$autor = $autor."<br />".$item['autor3'];
							if(!empty($item['autor4'])) {
								//Autor numero 4
								$autor = $autor."<br />".$item['autor4'];
								if(!empty($item['autor5'])) {
									//Autor numero 5
									$autor = $autor."<br />".$item['autor5'];					
								}
							}
						}
					}
					$tutor = $item['tutor1'];
					if(!empty($item['tutor2'])) {
						//Autor numero 2
						$tutor = $tutor."<br />".$item['tutor2'];
						if(!empty($item['tutor3'])) {
							//Autor numero 3
							$tutor = $tutor."<br />".$item['tutor3'];
						}
					}
					$tipotrabajo =$item['tipotrabajo'];
					$carrera =$item['carrera'];
					$anioesc =$item['anioesc'];
					$tutor = $item['tutor1'];
					if(!empty($item['tutor2'])) {
						//Autor numero 2
						$tutor = $tutor."<br />".$item['tutor2'];
						if(!empty($item['tutor3'])) {
							//Autor numero 3
							$tutor = $tutor."<br />".$item['tutor3'];
						}
					}
					$promedio = $item['promedio'];
					$html=$html.'
									<tr>
										<td>	
											'.$item['tema'].'
										</td>
										<td>
											'.$autor.'
										</td>
										<td>
											'.$item['tipotrabajo'].'
										</td>
										<td>
											<center>
											'.$anioesc.'<br />
											'.$carrera.'
											</center>
										</td>
										<td>
											'.$tutor.'
										</td>
										<td>
											<center>
											'.$promedio.'
											</center>
										</td>
									</tr>
					';
				}
				$html=$html.'
								</tbody>
							</table>
							<br><table style="page-break-after: always;"></table><br></table><br>
				';
		}
		$html=$html.'
				</body>
			</html>
		';
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->set_paper("legal", "landscape");
		$dompdf->render();
		$dompdf->stream("informe_salas.pdf");
	}
?>