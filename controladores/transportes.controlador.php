<?php


class ControladorTransportes{

	/*=============================================
	            REGISTRO DE TRANSPORTE            
	=============================================*/
	
	static public function ctrCrearTransporte(){

		if (isset($_POST["nuevoNombre"])) {
			
				
				$tabla = "transporte";

				$datos = array("nombre" => $_POST["nuevoNombre"]);

				$respuesta = ModeloTransportes::mdlIngresarTransporte($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

					swal({

						type: "success",
						title: "El medio de transporte ha sido creado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false							

					}).then((result)=>{

						if(result.value){

							window.location = "transportes";
							
							}

						});

				</script>';

				

			}else{

				echo '<script>

					swal({

						type: "error",
						title: "La descripción no puede ir vacía",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false							

					}).then((result)=>{

						if(result.value){

							window.location = "transportes";
							
							}

						})

				</script>';

			}
		}

	}


		/*=============================================
        MOSTRAR TRANSPORTES            
		=============================================*/

		static public function ctrMostrarTransportes($item, $valor){

			$tabla = "transporte";

			$respuesta = ModeloTransportes::mdlMostrarTransportes($tabla, $item, $valor);

			return $respuesta;

			//var_dump($respuesta);
		}


		/*=============================================
		EDITAR TRANSPORTE
		=============================================*/

		static public function ctrEditarTransporte(){

			if (isset($_POST["editarTransporte"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarTransporte"])) {
					
					$tabla = "transporte";

					$datos = array("nombre" => $_POST["editarTransporte"], "id_transporte" => $_POST["idTransporte"]);

					var_dump($datos);

					$respuesta = ModeloTransportes::mdlEditarTransporte($tabla, $datos);


					if ($respuesta == "ok") {
						
						echo '<script>

						swal({
							type: "success",
							title: "El medio de transporte ha sido modificado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "transportes";										
								}
							})

					</script>';

					}

				}else{

					echo '<script>

						swal({
							type: "error",
							title: "La descripción no puede ir vacía o llevar caracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "transportes";										
								}
							})

					</script>';
				}
			}
		}


		/*=============================================
		BORRAR TRANSPORTE
		=============================================*/

		static public function ctrBorrarTransporte(){

			if (isset($_GET["idTransporte"])) {
				
				$tabla = "transporte";
				$datos = $_GET["idTransporte"];

				$respuesta = ModeloTransportes::mdlBorrarTransporte($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

						swal({
							type: "success",
							title: "El medio de transporte ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result) => {

								if(result.value){

									window.location = "transportes";
								}
							})

					</script>';
				}
			}
		}

}