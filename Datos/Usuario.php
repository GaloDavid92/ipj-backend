<?php
require_once('ConexionDB.php');

//Clase que realiza las consultas SQL hacia la base de datos de las tablas realacionadas a los Productos
class Usuario
{
	public function __construct()
	{
	}

	//Funcion que trae todos los productos
	public static function selectUsuarios()
	{
		$dbh = ConexionDB::connect();
		$sql = "SELECT * FROM usuarios";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	public static function login($name, $hash)
	{
		$dbh = ConexionDB::connect();
		$sql =
			"SELECT *
		FROM usuarios u
		WHERE (u.email='$name' OR u.username='$name')";
		$stmt = $dbh->prepare($sql);
		$params = [
			$name,
			$name
		];
		$stmt->execute($params);
		$row = $stmt->fetchAll(PDO::FETCH_OBJ);
		if (count($row) > 0) {
			if ($row[0]->clave == $hash) {
				$response = array(
					"usuario" => $row[0],
					"mensaje" => "OK",
					"status" => 200
				);
			} else {
				$response = array(
					"usuario" => $row[0]->username,
					"mensaje" => "Clave incorrecta",
					"status" => 204
				);
			}
		}
		else {
			$response = array(
				"usuario" => null,
				"mensaje" => "Usuario no existe",
				"status" => 404
			);
		}
		return $response;
	}

	//Funcion que guarda un producto
	public static function insertStock($id_tipo, $id_sucursal, $cantidad)
	{
		$dbh = ConexionDB::connect();
		$sql = "INSERT INTO stock (
			id_tipo, 
			id_sucursal,
			cantidad
			) 
			VALUES (?,?,?);";
		$stmt = $dbh->prepare($sql);
		$params = [
			$id_tipo,
			$id_sucursal,
			$cantidad
		];
		if ($stmt->execute($params)) {
			return $dbh->lastInsertId();
		} else {
			return false;
		}
	}
	//Funcion que edita la informacion de un producto
	public static function updateCantidadStock($id_stock, $cantidad)
	{
		$dbh = ConexionDB::connect();
		$sql = "UPDATE stock SET
			cantidad=?
			WHERE id_stock=?;";
		$stmt = $dbh->prepare($sql);
		$params = [
			$cantidad,
			$id_stock
		];
		if ($stmt->execute($params)) {
			return true;
		} else {
			return false;
		}
	}
}
