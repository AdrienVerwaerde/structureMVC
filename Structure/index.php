<?php
define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));



require_once('Controllers/Router.php');

$router = new Router();
$router->routeReq();