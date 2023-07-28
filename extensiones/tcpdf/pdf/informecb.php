<?php

require_once "../../../controladores/informes.controlador.php";
require_once "../../../modelos/informes.modelo.php";

require_once "../../../controladores/cursos.controlador.php";
require_once "../../../modelos/cursos.modelo.php";


class imprimirReporte{


	public $id;

	public function traerImpresionReporte(){


		

		// TRAEMOS LA INFORMACION DE LOS INFORMES

		if ($_GET["tabla"] == "primero") {
			
			$tablaInforme = "primero";
		}

		if ($_GET["tabla"] == "segundo") {
			
			$tablaInforme = "segundo";
		}

		if ($_GET["tabla"] == "tercero") {
			
			$tablaInforme = "tercero";
		}

		if ($_GET["tabla"] == "cuarto") {
			
			$tablaInforme = "cuarto";
		}

		if ($_GET["tabla"] == "quinto") {
			
			$tablaInforme = "quinto";
		}

		$itemInforme = "id";
		$valorInforme = $this->id;
		//$tablaInforme = "primero";
		$verifica = false;
		

		$respuestaInforme = ControladorInformes::ctrMostrarInformes($itemInforme, $valorInforme, $tablaInforme, $verifica);

		$nombre = $respuestaInforme["nombre"];
		$idCurso = $respuestaInforme["id_curso"];
		

		// TRAEMOS LA INFORMACION DE LOS CURSOS

		$itemCurso = "id";
		$valorCurso = $respuestaInforme["id_curso"];
		$tablaCurso = "primero";

		$respuestaCurso = ControladorCursos::ctrMostrarCursos($itemCurso, $valorCurso, $tablaCurso);

		$curso = $respuestaCurso["nombre"];
		$turno = $respuestaCurso["turno"];
	


require_once('tcpdf_include.php');


$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
 


$pdf->setPrintHeader(false); //Ahora si imprimirá cabecera
$pdf->setPrintFooter(true); //Ahora si imprimirá pie de página


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set margins
$pdf->SetMargins(8, 8, 3);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(8);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->startPageGroup();

$pdf->AddPage();


//--------------------------------------------------------------------------------

$bloque1 = <<<EOF

	<table>

		<tr>

			<td style="width: 780px"><img src="images/header.png"></td>

			
			
			
		</tr>
		

	</table>

EOF;


$pdf->writeHTML($bloque1, false, false, false, false, '');

//----------------------------------------------------------------------------------

$bloque2 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		

		<tr>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:800px">

				<br>

				<strong>INFORME CUALITATIVO MARZO - MAYO 2022</strong>


			</td>


		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque2, false, false, false, false, '');

//--------------------------------------------------------

//----------------------------------------------------------------------------------

//----------------------------------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		

		<tr>

			<td style="text-align: center; border: 1px solid #666; background-color:#C2BDBC;; width:270px">

				<br>

				Estudiante


			</td>

			<td style="text-align: center; border: 1px solid #666; background-color:#C2BDBC;; width:270px">

				<br>

				Agrupamiento


			</td>		

			<td style="text-align: center; border: 1px solid #666; background-color:#C2BDBC;; width:260px">

				<br>

				Turno


			</td>			

		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque3, false, false, false, false, '');

//--------------------------------------------------------

//----------------------------------------------------------------------------------


$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		

		<tr>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:270px">

				<br>

				$nombre


			</td>



			<td style="text-align: center; border: 1px solid #666; background-color:white; width:270px">

				<br>

				$curso


			</td>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:260px">

				<br>

				$turno


			</td>


		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque4, false, false, false, false, '');

//--------------------------------------------------------


//----------------------------------------------------------------------------------


$bloque5 = <<<EOF

	<table style="font-size:8px; padding:5px 10px;">

	<tr>

			<td style="width:700px"><img src="images/backFact2-m.jpg"></td>

		</tr>

		

		<tr>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:155px">

				<br>

				AREAS DEL CONOCIMIENTO


			</td>



			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:260px">

				<br>

				SABERES

			</td>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:165px">

				<br>

				APRECIACION CUALITATIVA


			</td>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:65px">

				<br>

				ASISTENCIA

			</td>	

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:156px">

				<br>

				OBSERVACIONES

			</td>	



		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque5, false, false, false, false, '');

//--------------------------------------------------------

//----------------------------------------------------------------------------------


$bloque6 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

	

		

		<tr>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:white; width:155px">

				<br>

				CIENTIFICA Y TECNOLOGICA


			</td>



			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:260px">

				<br>

				$respuestaInforme[saberes_cientifica]

			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:165px">

				<br>

				$respuestaInforme[aprecia_cientifica]


			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:65px">

				<br>

				$respuestaInforme[asistencia_cientifica]

			</td>	

			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:156px">

				<br>

				$respuestaInforme[observa_cientifica]

			</td>	



		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque6, false, false, false, false, '');

//--------------------------------------------------------

//----------------------------------------------------------------------------------


$bloque7 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

	

		

		<tr>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:white; width:155px">

				<br>

				CIENCIAS SOCIALES Y HUMANIDADES


			</td>



			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:260px">

				<br>

				$respuestaInforme[saberes_sociales]

			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:165px">

				<br>

				$respuestaInforme[aprecia_sociales]


			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:65px">

				<br>

				$respuestaInforme[asistencia_sociales]

			</td>	

			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:156px">

				<br>

				$respuestaInforme[observa_sociales]

			</td>	



		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque7, false, false, false, false, '');

//--------------------------------------------------------

//----------------------------------------------------------------------------------


$bloque8 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

	

		

		<tr>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:white; width:155px">

				<br>

				LENGUA Y LITERATURA


			</td>



			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:260px">

				<br>

				$respuestaInforme[saberes_lengua]

			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:165px">

				<br>

				$respuestaInforme[aprecia_lengua]


			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:65px">

				<br>

				$respuestaInforme[asistencia_lengua]

			</td>	

			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:156px">

				<br>

				$respuestaInforme[observa_lengua]

			</td>	



		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque8, false, false, false, false, '');

//--------------------------------------------------------

//----------------------------------------------------------------------------------


$bloque9 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

	

		

		<tr>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:white; width:155px">

				<br>

				SEGUNDAS LENGUAS


			</td>



			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:260px">

				<br>

				$respuestaInforme[saberes_ingles]

			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:165px">

				<br>

				$respuestaInforme[aprecia_ingles]


			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:65px">

				<br>

				$respuestaInforme[asistencia_ingles]

			</td>	

			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:156px">

				<br>

				$respuestaInforme[observa_ingles]

			</td>	



		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque9, false, false, false, false, '');

//--------------------------------------------------------

//----------------------------------------------------------------------------------


$bloque10 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

	

		

		<tr>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:white; width:155px">

				<br>

				MATEMATICA


			</td>



			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:260px">

				<br>

				$respuestaInforme[saberes_matematica]

			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:165px">

				<br>

				$respuestaInforme[aprecia_matematica]


			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:65px">

				<br>

				$respuestaInforme[asistencia_matematica]

			</td>	

			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:156px">

				<br>

				$respuestaInforme[observa_matematica]

			</td>	



		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque10, false, false, false, false, '');

//--------------------------------------------------------

//----------------------------------------------------------------------------------


$bloque11 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

	

		

		<tr>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:white; width:155px">

				<br>

				EDUCACION FISICA


			</td>



			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:260px">

				<br>

				$respuestaInforme[saberes_fisica]

			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:165px">

				<br>

				$respuestaInforme[aprecia_fisica]


			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:65px">

				<br>

				$respuestaInforme[asistencia_fisica]

			</td>	

			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:156px">

				<br>

				$respuestaInforme[observa_fisica]

			</td>	



		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque11, false, false, false, false, '');

//--------------------------------------------------------

//----------------------------------------------------------------------------------


$bloque12 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

	

		

		<tr>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:white; width:155px">

				<br>

				EDUCACION ARTISTICA


			</td>



			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:260px">

				<br>

				$respuestaInforme[saberes_artistica]

			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:165px">

				<br>

				$respuestaInforme[aprecia_artistica]


			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:65px">

				<br>

				$respuestaInforme[asistencia_artistica]

			</td>	

			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:156px">

				<br>

				$respuestaInforme[observa_artistica]

			</td>	



		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque12, false, false, false, false, '');

//--------------------------------------------------------

//--------------------------------------------------------------------------------

$bloque13 = <<<EOF

	<table>

		<tr>
			<br>

			<td style="width: 780px"><img src="images/footer-m.png"></td>

			
		</tr>
		

	</table>

EOF;


$pdf->writeHTML($bloque13, false, false, false, false, '');

//----------------------------------------------------------------------------------

//SALIDA DEL ARCHIVO

$pdf->Output('informe_'.$nombre.'.pdf');


}
}

$reporte = new imprimirReporte();
$reporte -> id = $_GET["id"];
$reporte -> informe = $_GET["informe"];
//$reporte -> area = $_GET["area"];
$reporte -> traerImpresionReporte();


?>	