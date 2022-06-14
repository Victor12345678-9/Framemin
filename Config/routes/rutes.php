<?php 

$url = trim($_SERVER['REQUEST_URI'], '/');
$exp = explode("/",$url);

define('HTTP_', 'http://');
define('ROOT_PATH_CORE', $_SERVER["HTTP_HOST"].'/'.$exp[0]);

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
define('ASSETS_PATH', './Resources/');
define('HELPERS_PATH', './Resources/helpers/');
define('PUBLIC_PATH', './Public/');
define('LAYOUT_PATH', './Resources/views/layout/');

define('RUTES_PATH', './Config/constant/rutes.php');
define('CONFIG_PATH', './Config/');
define('APP_PATH', './App/');
define('CONEXION_PATH', './Database/conexion/');
define('CONTROLLERS_PATH', './App/controllers/');
define('MODELS_PATH', './App/models/');
define('CONSTANT_PATH', './Config/constant/');




?>