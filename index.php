<?php
// 1. Cargar configuraciones y dependencias
require __DIR__ . '/../app/core/Config.php';
require __DIR__ . '/../app/core/Database.php';
require __DIR__ . '/../app/core/Router.php';

// 2. Manejar la solicitud entrante
$router = new Router();
$router->dispatch();
