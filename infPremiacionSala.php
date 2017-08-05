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

		$html=$html.'
				<h3><center>Universidad Nacional Autónoma de Nicaragua, Managua</center></br>
				<center>Facultad Regional Multidisciplinaria de Chontales</center></br>
				<center>UNAN FAREM Chontales</center></h3>
				<center><img src="img/unan.png" width="40px" heigth="50px"></center>
				<h2><center>INFORME GENERAL JUDC 2016</center></h2>
				<table width="100%" border="1" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<td>
								<br />
								<center>
									<strong>
										Lugar
									</strong>
								</center>
								<br />
							</td>

							<td>
								<br />
								<center>
									<strong>
										Sala
									</strong>
								</center>
								<br />
							</td>
							<td>
								<br />
								<center>
									<strong>
										Tema
									</strong>
								</center>
								<br />
							</td>
							<td>
								<br />
								<center>
									<strong>
										Promedio
									</strong>
								</center>
								<br />
							</td>
						</tr>
					</thead>
					<tbody>
		';
		while($itemSala = $resSala->fetch_assoc()) {
			$consulta = $mysqli->query("SELECT DISTINCT trabajos.promedio, trabajos.trabajoID, trabajos.tema, salas.Nombre FROM trabajos INNER JOIN salas ON trabajos.salaID = salas.salaID WHERE trabajos.salaID = ".$itemSala['salaID']." GROUP BY trabajos.trabajoID, trabajos.tema ORDER BY trabajos.promedio DESC LIMIT 3");//consulta a la tabal trabajos
				//validacion de lugares
				$nLug1 = 0;
				$nLug2 = 0;
				$nLug3 = 0;

				while($item = $consulta->fetch_assoc()) {
					//Consulta para seleccionar lugares repetitivos si existen
					$resLugares = $mysqli->query("SELECT trabajos.promedio, trabajos.trabajoID, trabajos.tema, salas.Nombre FROM trabajos INNER JOIN salas ON trabajos.salaID = salas.salaID WHERE trabajos.salaID = ".$itemSala['salaID']." AND trabajos.promedio = ".$item["promedio"]);

				//Lugares
				$lugar = "";
				if($item["promedio"] <= 69) {
					$lugar == "N / L";
				}
				else {
					if($item["promedio"] >= 90){
						if($nLug1 == 0) {
							$lugar = "Primer Luguar";
							$nLug1 = 1;
						}
						else {
							if($nLug2 == 0) {
								$lugar = "Segundo Luguar";
								$nLug2 = 1;
							}
							else{
								if($nLug3 == 0) {
									$lugar = "Tercer Luguar";
									$nLug3 = 1;
								}
							}
						}
					}

					else if($item["promedio"] >= 80 && $item["promedio"] <= 89){
						if($nLug2 == 0) {
							$lugar = "Segundo Luguar";
							$nLug2 = 1;
						}
						else {
							if($nLug3 == 0) {
								$lugar = "Tercer Luguar";
								$nLug3 = 1;
							}
						}
					}

					else {
						if($nLug3 == 0) {
							$lugar = "Tercer Luguar";
							$nLug3 = 1;
						}
						else {
							$lugar == "N / L";
						}
					}
				}
				//resultado lugares
				if(!$resLugares) {
				}
				else {
					while($itemLugares = $resLugares->fetch_assoc()) {
						$html=$html.'
							<tr>
								<td>
									<center>
										'.$lugar.'
									</center>
								</td>
								<td>
									<center>
										'.$item['Nombre'].'
									</center>
								</td>
								<td>
									<center>
										'.$item['tema'].'
									</center>
								</td>
								<td> 
									<center>
										'.$item['promedio'].'
									</center>
								</td>
							</tr>
						';
					}
				}
			}
		}
		$html=$html.'
				</tbody>
			</table>
			<br><table style="page-break-after: always;"></table><br></table><br>
		';
		$html=$html.'
				</body>
			</html>
		';
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->set_paper("legal", "landscape");
		$dompdf->render();
		$dompdf->stream("informe_ganadores.pdf");
	}
?>