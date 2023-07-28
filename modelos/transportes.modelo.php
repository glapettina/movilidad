<?php


	require_once "conexion.php";

	class ModeloTransportes{


		/*=============================================
	                     CREAR TRANSPORTE           
		=============================================*/


		static public function mdlIngresarTransporte($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES (:nombre)");

			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}


		/*=============================================
	                     MOSTRAR TRANSPORTES            
		=============================================*/

		static public function mdlMostrarTransportes($tabla, $item, $valor){

			if ($item != null) {
				
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

				$stmt -> execute();

				return $stmt -> fetchAll();
			}

			$stmt -> close();
			$stmt = null;

		}


		/*=============================================
	    ACTUALIZAR TRANSPORTE            
		=============================================*/

		static public function mdlActualizarTransporte($tabla, $item1, $valor1, $item2, $valor2){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

			$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

			if ($stmt -> execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}


		/*=============================================
		EDITAR TRANSPORTE            
		=============================================*/

		static public function mdlEditarTransporte($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id_transporte = :id_transporte");

			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":id_transporte", $datos["id_transporte"], PDO::PARAM_INT);

			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}

		/*=============================================
		BORRAR TRANSPORTE            
		=============================================*/

		static public function mdlBorrarTransporte($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_transporte = :id_transporte");

			$stmt -> bindParam(":id_transporte", $datos, PDO::PARAM_INT);

			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}

	}