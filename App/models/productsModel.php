<?php


require_once ("./Config/constant/rutes.php");

class ProductsModel{

    private $PDO;

    public function __construct()
    {
        
        require_once (CONEXION_PATH."conexion.php");
        $con = new db();
        $this->PDO=$con->conexion();
    }



    public function index($page,$resultadosPorPagina){

    $offset = ($page-1) * $resultadosPorPagina;


    $sql = "SELECT * FROM productos WHERE status ='1' ORDER BY idProduct LIMIT $offset,$resultadosPorPagina";

    $sql_conteo = "SELECT * FROM productos WHERE status = '1' ORDER BY idProduct";

    $conteo = $this->PDO->query($sql_conteo);
    $conteo_end = $conteo->rowCount();
    $total_pages = ceil($conteo_end/$resultadosPorPagina);

    $query = array();
    $query['query'] = $this->PDO->query($sql);
    $query['total_paginas'] = $total_pages;

    return $query;


    }

    public function filtros($buscar,$page,$resultadosPorPagina){

        $offset = ($page-1) * $resultadosPorPagina;

        $q= $buscar;

        $sql = "
        SELECT * FROM productos WHERE
        (codigo LIKE '%".$q."%' OR
        nombre LIKE '%".$q."%' OR
        descripcion LIKE '%".$q."%' OR
        precio LIKE '%".$q."%' OR
        stock LIKE '%".$q."%') AND status  = '1' ORDER BY nomina LIMIT $offset,$resultadosPorPagina";



        
    }



}




?>