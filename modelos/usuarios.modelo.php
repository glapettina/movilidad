<?php


	require_once "conexion.php";

	class ModeloUsuarios{

/*============================================
MOSTRAR USUARIOS            
=============================================*/

		static public function mdlMostrarUsuarios($tabla, $item, $valor){


			if ($item != null && $valor != 1) {
				
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else if($item != null && $valor = 1){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND estado = 1 ORDER BY nombre");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();


			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

				$stmt -> execute();

				return $stmt -> fetchAll();
			}

			$stmt -> close();
			$stmt = null;

		}



		/*=============================================
	                     MOSTRAR DOCENTES            
		=============================================*/

		static public function mdlMostrarDocentes($tabla, $item, $valor){

			if ($item != null) {
				
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE movilidad = 1");

				$stmt -> execute();

				return $stmt -> fetchAll();
			}

			$stmt -> close();
			$stmt = null;

		}


		/*=============================================
	                     INGRESAR USUARIO           
		=============================================*/


		static public function mdlIngresarUsuario($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, cuil, legajo,  telefono, domicilio, ciudad, movilidad, tipo_vehiculo, dominio, usuario, password, perfil, foto) VALUES (:nombre, :cuil, :legajo, :telefono, :domicilio, :ciudad, :movilidad, :tipo_vehiculo, :dominio, :usuario, :password, :perfil, :foto)");

			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":cuil", $datos["cuil"], PDO::PARAM_STR);
			$stmt->bindParam(":legajo", $datos["legajo"], PDO::PARAM_STR);
			$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":domicilio", $datos["domicilio"], PDO::PARAM_STR);
			$stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
			$stmt->bindParam(":movilidad", $datos["movilidad"], PDO::PARAM_INT);
			$stmt->bindParam(":tipo_vehiculo", $datos["tipo_vehiculo"], PDO::PARAM_STR);
			$stmt->bindParam(":dominio", $datos["dominio"], PDO::PARAM_STR);
			$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
			$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
			$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}

		/*=============================================
	                     EDITAR USUARIO            
		=============================================*/

		static public function mdlEditarUsuario($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, cuil = :cuil, legajo = :legajo, telefono = :telefono, domicilio = :domicilio, ciudad = :ciudad, movilidad = :movilidad, tipo_vehiculo = :tipo_vehiculo, dominio = :dominio, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":cuil", $datos["cuil"], PDO::PARAM_STR);
			$stmt->bindParam(":legajo", $datos["legajo"], PDO::PARAM_STR);
			$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":domicilio", $datos["domicilio"], PDO::PARAM_STR);
			$stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
			$stmt->bindParam(":movilidad", $datos["movilidad"], PDO::PARAM_INT);
			$stmt->bindParam(":tipo_vehiculo", $datos["tipo_vehiculo"], PDO::PARAM_STR);
			$stmt->bindParam(":dominio", $datos["dominio"], PDO::PARAM_STR);
			$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
			$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
			$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
			$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				
				return "ok";
				
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}

		/*=============================================
	                     ACTUALIZAR USUARIO            
		=============================================*/

		static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

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
	                     BORRAR USUARIO            
		=============================================*/

		static public function mdlBorrarUsuario($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

			$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

			if ($stmt -> execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;
		}

	}