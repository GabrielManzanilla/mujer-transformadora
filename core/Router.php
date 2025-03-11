<?php

class Router {
	public function handleRequest() {
		//obtencion de la url y separacion de los segmentos
		$url = $_GET['url'] ?? 'index';
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$segments = explode('/', $url);

		//obtencion del controlador y metodo
		$controllerName = 'IndexController';
		$method = $segments[0] ?? 'index';
		$params = array_slice($segments, 2);

		//obtener el archivo del controlador
		if (!preg_match('/^[a-zA-Z]+Controller$/', $controllerName)) {
			echo "Invalid controller name";
			return;
		}
		$controllerFile = __DIR__ . '/../app/controllers/'.$controllerName.'.php';
		
		//verificacion de la existencia del controlador y metodo
		if (file_exists($controllerFile)) {
			require_once $controllerFile;
			if (class_exists($controllerName)) {
					$controller = new $controllerName();
					if (method_exists($controller, $method)) {
							call_user_func_array([$controller, $method], $params);
					} else {
							echo "Method not found";
					}
			} else {
					echo "Controller class not found";
			}
	} else {
			echo "Controller file not found";
	}
	}
}
?>