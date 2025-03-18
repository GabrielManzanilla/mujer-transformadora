<?php

#clase para importar variables de entorno desde un archivo .env en la raiz del proyecto
class Env{
	//carga las variables de entorno desde un archivo .env
	public static function load($path){

		//verifica si el archivo existey obtiene las lineas
		if(file_exists($path)){
			$env_lines = parse_ini_file($path);
			foreach($env_lines as $line){
				if(str_starts_with(trim($line), '#')){
					continue;
				} //realiza la omision si se trata de comentarios

				#separa la linea en dos partes y las asigna a las variables de entorno
				list($key, $value) = explode('=', $line,2);
				putenv(trim($key).'='.trim($value));
			}
		}
	}
}