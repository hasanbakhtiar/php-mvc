<?php
session_start();

// $_SESSION['user'] = "Hasan";
// var_dump($_SESSION['user']);

require_once "../app/config/config.php";

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$app = new App($path, $method, $config);


$app->run();

?>