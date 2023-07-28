<?php

	require_once "../controladores/transportes.controlador.php";
	require_once "../modelos/transportes.modelo.php";

	class AjaxTransportes{

		/*=============================================
		EDITAR TRANSPORTE           
		=============================================*/

		public $idTransporte;

		public function ajaxEditarTransporte(){

			$item = "id_transporte";
			$valor = $this->idTransporte;			
			

			$respuesta = ControladorTransportes::ctrMostrarTransportes($item, $valor);

			echo json_encode($respuesta);

		}		

		/*=============================================
		ACTIVAR TRANSPORTE
		=============================================*/

		public $activarTransporte;
		public $activarId;

		public function ajaxActivarTransporte(){

			$tabla = "transporte";

			$item1 = "estado";
			$valor1 = $this->activarTransporte;

			$item2 = "id_transporte";
			$valor2 = $this->activarId;

			$respuesta = ModeloTransportes::mdlActualizarTransporte($tabla, $item1, $valor1, $item2, $valor2);

		}

	}

		/*=============================================
		ACTIVAR TRANSPORTE
		=============================================*/

		if (isset($_POST["activarTransporte"])) {
			
			$activarTransporte = new AjaxTransportes();
			$activarTransporte -> activarTransporte = $_POST["activarTransporte"];
			$activarTransporte -> activarId = $_POST["activarId"];
			$activarTransporte -> ajaxActivarTransporte();

		}


		/*=============================================
		EDITAR TRANSPORTE          
		=============================================*/

		if (isset($_POST["idTransporte"])) {
			
			$transporte = new AjaxTransportes();
			$transporte -> idTransporte = $_POST["idTransporte"];
			$transporte -> ajaxEditarTransporte();
		}