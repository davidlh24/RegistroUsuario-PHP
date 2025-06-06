<?php

require_once "conexion.php";

class ModeloFormularios
{

	/*=============================================
	Registro
	=============================================*/

	static public function mdlRegistro($tabla, $datos)
	{

		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(token,nombre, email, password) VALUES (:token, :nombre, :email, :password)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			print_r(Conexion::conectar()->errorInfo());
		}

		//	$stmt->close();

		$stmt = null;
	}

	/*=============================================
	Seleccionar Registros
	=============================================*/

	static public function mdlSeleccionarRegistros($tabla, $item, $valor)
	{

		if ($item == null && $valor == null) {

			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY id DESC");

			$stmt->execute();

			return $stmt->fetchAll();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		}

		//	$stmt->close();

		$stmt = null;
	}



	/*=============================================
Actualizar Registro
=============================================*/
	static public function mdlActualizarRegistro($tabla, $datos)
	{
		try {
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, email = :email, password = :password WHERE token = :token");

			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
			$stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR); // Actualizado a STR

			if ($stmt->execute()) {
				return "ok";
			} else {
				return "error";
			}
		} catch (PDOException $e) {
			return "error: " . $e->getMessage();
		}

		$stmt = null;
	}


	/*=============================================
	Eliminar Registro
	=============================================*/
	static public function mdlEliminarRegistro($tabla, $valor)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE token = :token");

		$stmt->bindParam(":token", $valor, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			print_r(Conexion::conectar()->errorInfo());
		}

		//	$stmt->close();

		$stmt = null;
	}
}
