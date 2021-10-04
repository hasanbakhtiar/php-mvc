<?php

define('APP_DIR' , '../app');
define('CORE' , APP_DIR.'/core/');
define('CONFIG' , APP_DIR.'/config/');

define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DBNAME","mvc");

global $config;
$config = array(
    "authentication" => array(
        "auth_urls" => array(
            "default" => "/default/login",    
        ),
        "auth_files" => array(
            "default" => "user",
        )
    )
);

require_once CORE."/MysqliDb.php";
require_once CORE."/Model.php";
require_once CORE."/Controller.php";
require_once CORE."/View.php";
require_once CORE."/App.php";
require_once CONFIG."/routing.php";


function __autoload($class_name){
    var_dump($class_name);
    $module = explode("Model", $class_name);
    require_once APP_DIR."/modules/{$module[0]}/model/{$class_name}.php";
}
