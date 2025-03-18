<?php

require_once __DIR__."./Env.php";

class Database{
	private $connection;

	public function __construct(){
		Env::load(__DIR__ ."/../.env");
	}

	public function getConnection(){
		$this ->connection =null;

		try{
			//obtencion de las variables de entorno
			$host = getenv("DB_HOST");
			$db_name = getenv("DB_NAME");
			$db_user = getenv("DB_USER");
			$db_pass = getenv("DB_PASS");

			//creando la conexion
			$this->connection = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_pass);

			//configurando la conexion para que lance excepciones
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Conexion con la db Exitosa";
		}catch(PDOException $e){
			echo "Error en la conexion: " . $e->getMessage();
		}
		return $this->connection;
	}
}