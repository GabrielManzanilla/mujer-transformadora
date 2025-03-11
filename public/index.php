<?php
require_once '../core/Router.php';
require_once '../app/controllers/IndexController.php';

$router = new Router();
$router->handleRequest();
?>
