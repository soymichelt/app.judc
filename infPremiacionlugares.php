<?php
	require_once("inc/dompdf/dompdf_config.inc.php");  //enlace a convertidor pdf
	require("inc/conexion.php");						//conexion a la base de datos
	//$restraba = $mysqli->query("SELECT * FROM trabajos");  	//consulta a la tabla salas
	$html='
			<!DOCTYPE html>
				<html>
					<head>
						<title>Ganadores JUDC '.date('Y').'</title>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					</head>
					<body>
		';

		$html=$html.'
				<h3><center>Universidad Nacional Autónoma de Nicaragua, Managua</center></br>
				<center>Facultad Regional Multidisciplinaria de Chontales</center></br>
				<center>UNAN FAREM Chontales</center></h3>
				<center><img src="img/unan.png" width="40px" heigth="50px"></center>
				<h2><center>INFORME GANADORES JUDC 2017</center></h2>
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
		
		$consultaGeneral = $mysqli->query("SELECT DISTINCT trabajos.promedio, trabajos.TrabajoId, trabajos.Tema FROM trabajos  GROUP BY trabajos.TrabajoId, trabajos.Tema ORDER BY trabajos.promedio DESC LIMIT 3");//consulta a la tabal trabajos
		//validacion de lugares
		$nLug1 = 0;
		$nLug2 = 0;
		$nLug3 = 0;

		if($consultaGeneral)
		{
			while($resultadoGeneral = $consultaGeneral->fetch_assoc())
			{
				$queryString = "SELECT
							trabajos.promedio, trabajos.Tema, trabajos.TrabajoId
						FROM
							trabajos
						WHERE
							trabajos.promedio = ".$resultadoGeneral["promedio"];

				$consulta = $mysqli->query($queryString);

				if($consulta)
				{
					
					//Lugares
					$lugar = "";
					if($resultadoGeneral["promedio"] <= 69) {
						$lugar == "N / L";
					}
					else {
						if($resultadoGeneral["promedio"] >= 90){
							if($nLug1 == 0) {
								$lugar = "Primer Lugar";
								$nLug1 = 1;
							}
							else {
								if($nLug2 == 0) {
									$lugar = "Segundo Lugar";
									$nLug2 = 1;
								}
								else{
									if($nLug3 == 0) {
										$lugar = "Tercer Lugar";
										$nLug3 = 1;
									}
								}
							}
						}

						else if($resultadoGeneral["promedio"] >= 80 && $resultadoGeneral["promedio"] <= 89){
							if($nLug2 == 0) {
								$lugar = "Segundo Lugar";
								$nLug2 = 1;
							}
							else {
								if($nLug3 == 0) {
									$lugar = "Tercer Lugar";
									$nLug3 = 1;
								}
							}
						}

						else {
							if($nLug3 == 0) {
								$lugar = "Tercer Lugar";
								$nLug3 = 1;
							}
							else {
								$lugar == "N / L";
							}
						}
					}
					while($resultado = $consulta->fetch_assoc())
					{

						$html=$html.'<tr>';

						$html=$html.'
							<td>
								'.$lugar.'
							</td>
						';

						$html=$html.'
							<td>
								'.$resultado["Tema"].'
							</td>
						';

						$html=$html.'
							<td>
								'.$resultado["promedio"].'
							</td>
						';

						$html=$html.'</tr>';

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
		$dompdf->stream("informe_gan_finales.pdf");
?>