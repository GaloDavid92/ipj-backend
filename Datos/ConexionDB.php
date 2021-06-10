<?php
//Clase que realiza la conexion a la Base de Datos
class ConexionDB
{
	protected $dbh;
	
    public static function connect()
    {
		try 
		{
			$dsn = "mysql:host=localhost;dbname=id16959348_ipj_db";
			$dbh = new PDO($dsn, "root", "");
			return $dbh;
		} 
		catch (PDOException $e)
		{
			echo $e->getMessage();
      	    return;
		}
	}
}
?>