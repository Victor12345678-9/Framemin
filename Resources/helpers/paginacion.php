<?php 
$resultadosPorPagina = 5;
// Por defecto es la página 1; pero si está presente en la URL, tomamos esa
$pagina = 1;
if (isset($_GET["pagina"]) && is_numeric($_GET['pagina'])) {
    $pagina = $_GET["pagina"];
}


$data = $obj->ver_paginas($pagina,'usuarios',$resultadosPorPagina,'usersView');

$conteo = $data['conteo'];
$paginas =  $data['paginas'];
$users = $data['users'];  
$tabla = $data['tabla'];

?>