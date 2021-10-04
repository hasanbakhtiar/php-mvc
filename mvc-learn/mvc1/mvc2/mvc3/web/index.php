<?php

define()


require_once "../app/core/App.php";

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$app = new App($path, $method);
$app->get('/defult/index', function(){});

$app->run();


?>