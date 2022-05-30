<?php

include_once ("./Config/constant/rutes.php");
require_once "./App/controllers/paginacion.php";

class ProductsController{

private $MODEL;




public function __construct(){

    require_once (MODELS_PATH."productsModel.php");

    $this->MODEL = new ProductsModel();


}



public function index($buscar,$page){

$resultadosPorPagina= 5;

if($buscar){


    $query = $this->MODEL->index($buscar,$page,$resultadosPorPagina);


}

$tabla = '';

if($query['total_paginas'] > 0){



    while ($row = $query['query']->fetch()){


        $tabla.= ' <tr>
        
        <td>'.$row['codigo'].'</td>
        <td>'.$row['nombre'].'</td>
        <td>'.$row['descripcion'].'</td>
        <td>'.$row['precio'].'</td>
        <td>'.$row['stock'].'</td>
        <td>Activo</td>
        <td>
        <a style="margin:5px" href="'.HTTP_.ROOT_PATH_CORE.'/showProduct/'.$row['id'].'"><i class="bx bx-show"></i></a>
        <a style="margin:5px" href="'.HTTP_.ROOT_PATH_CORE.'/editProduct/'.$row['id'].'"><i class="bx bx-pencil"></i></a>
        <a style="margin:5px" href="#" id="delete_user" data-id="'.$row['id'].'"><i class="bx bx-trash"></i></a>
        
        </td>
        </tr>';
    }

    $obj = new Paginacion();
    $paginacion = $obj->paginacion($page,$query['total_paginas'],$buscar);

}
else{

    echo "No hay";

}

$dato = array();
$dato['tabla'][] = $tabla;
$dato['paginacion'][]=$paginacion;

return json_encode($dato);


}

}


?>