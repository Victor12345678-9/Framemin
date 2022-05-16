<?php

require_once "router.php";

include_once "rutes.php";


$accion = $_SERVER['REQUEST_URI'];

envio($accion);