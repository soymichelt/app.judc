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
			$consulta = $mysqli->query("SELECT trabajos.*, salas.Nombre, salas.Coordinador, salas.Enlace, salas.Local FROM trabajos INNER JOIN salas ON trabajos.SalaId = salas.SalaId WHERE salas.SalaId=".$itemSala['SalaId']." ORDER BY trabajos.promedio DESC");//consulta a la tabla trabajos		
			$html=$html.'
						<h3><center>Universidad Nacional Autónoma de Nicaraagua, Managua</center></br>
						<center>Facultad Regional Multidisciplinaria de Chontales</center></br>
						<center>UNAN FAREM Chontales</center></h3>
						<center><img src="img/unan.png" width="40px" heigth="50px"></center>
						<h2><center>INFORME DE SALAS</center></h2>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<td colspan="2">
										<center>
											<br/>
											<strong>
												Sala '.$itemSala['SalaId'].': '.$itemSala['Nombre'].'
											</strong>
											<br/>
										</center>
									</td>
									<td colspan="2">
										<center>
											<br/>
											<strong>
												Coordinador
												<br />
												'.$itemSala['Coordinador'].'
											</strong>
											<br/>
										</center>
									</td>
									<td colspan="2">
										<center>
											<br />
											<strong>
												ENLACE
												<br />
												'.$itemSala['Enlace'].'
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
												'.$itemSala['Local'].'
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
					$autor = $item['Autor1'];
					if(!empty($item['Autor2'])) {
						//Autor numero 2
						$autor = $autor."<br />".$item['Autor2'];
						if(!empty($item['Autor3'])) {
							//Autor numero 3
							$autor = $autor."<br />".$item['Autor3'];
							if(!empty($item['Autor4'])) {
								//Autor numero 4
								$autor = $autor."<br />".$item['Autor4'];
								if(!empty($item['Autor5'])) {
									//Autor numero 5
									$autor = $autor."<br />".$item['Autor5'];					
								}
							}
						}
					}
					$tutor = $item['Tutor1'];
					if(!empty($item['Tutor2'])) {
						//Autor numero 2
						$tutor = $tutor."<br />".$item['Tutor2'];
						if(!empty($item['Tutor3'])) {
							//Autor numero 3
							$tutor = $tutor."<br />".$item['Tutor3'];
						}
					}
					$tipotrabajo =$item['Tipotrabajo'];
					$carrera =$item['carrera'];
					$anioesc =$item['anioesc'];
					$tutor = $item['Tutor1'];
					if(!empty($item['Tutor2'])) {
						//Autor numero 2
						$tutor = $tutor."<br />".$item['Tutor2'];
						if(!empty($item['Tutor3'])) {
							//Autor numero 3
							$tutor = $tutor."<br />".$item['Tutor3'];
						}
					}
					$promedio = $item['promedio'];
					$html=$html.'
									<tr>
										<td>
											<p text-align="justify">	
												'.$item['Tema'].'
											</p>
										</td>
										<td>
											'.$autor.'
										</td>
										<td>
											'.$item['Tipotrabajo'].'
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