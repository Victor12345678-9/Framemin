<?php

require_once (CONEXION_PATH."conexion.php");

class ProductsModel
{


    public function __construct()
    {
        require_once (MODELS_PATH."Models.php");
        $this->MODELS = new Models();

        require_once (MODELS_PATH."condiciones.php");
        $this->CONDICIONALES = new Condicionales();
    }


    public function index($page,$resultadosPorPagina)
    {   
        $offset = ($page - 1) * $resultadosPorPagina;
  
        $condicionales = new Condicionales();
        $condicionales->select(['idProduct','codeProduct','nameProduct','descProduct','price','stock','status'],'productos');
        $condicionales->where(['status=1']);
        $condicionales->limit([$offset.','.$resultadosPorPagina]);
        $sql = $condicionales->run();

        $condicionales_2 = new Condicionales();
        $condicionales_2->select_count(['status'],'productos');
        $condicionales_2->where(['status=1']);
        $sql_count = $condicionales_2->run();

        $sql_conteo = $sql_count;
        $conteo = $sql_conteo->fetch(PDO::FETCH_ASSOC);
        $conteo_end = $conteo['conteo'];

        $query = array();
        $query['query'] = $sql;
        $query['total_paginas'] = $conteo_end;

        return $query;
    }


    public function filtros($buscar,$page,$resultadosPorPagina)
    {
        $offset = ($page - 1) * $resultadosPorPagina;

        $condicionales = new Condicionales();
        $condicionales->like(['idProduct','codeProduct','nameProduct','descProduct','price','stock','status'],['codeProduct','nameProduct','descProduct'],$buscar,'status=1','productos');
        $condicionales->limit([$offset.','.$resultadosPorPagina]);
        $sql = $condicionales->run();

        $condicionales_2 = new Condicionales();
        $condicionales_2->like_conteo(['status'],['codeProduct','nameProduct','descProduct'],$buscar,'status=1','productos');
        $sql_count = $condicionales_2->run();

        $sql_conteo = $sql_count;
        $conteo = $sql_conteo->fetch(PDO::FETCH_ASSOC);
        $conteo_end = $conteo['conteo'];

        $query = array();
        $query['query'] = $sql;
        $query['total_paginas'] = $conteo_end;

        return $query;
    }

 
    public function insert($codeProduct,$nameProduct,$descProduct,$price,$stock)
    {
        $condicionales = new Condicionales();
        $condicionales->insert(
        [
            'codeProduct'    =>            $codeProduct,
            'nameProduct'    =>            $nameProduct,
            'descProduct'    =>            $descProduct,
            'price'          =>            $price,
            'stock'          =>            $stock,
            'status'         =>            1
        ],'productos');
        $mostrar = $condicionales->run();
    }


    public function show($idProduct)
    {
        $condicionales = new Condicionales();
        $condicionales->select(
        [
        'idProduct',
        'nameProduct',
        'codeProduct',
        'descProduct',
        'price',
        'stock'
        ],'productos');
        $condicionales->where(['idProduct='.$idProduct]);
        $mostrar = $condicionales->run();

        return $mostrar->fetch();
    }

    
    public function update($idProduct,$codeProduct,$nameProduct,$descProduct,$price,$stock)
    {    
        $condicionales = new Condicionales();
        $condicionales->update(
        [
        'idProduct'           => $idProduct,
        'codeProduct'         => $codeProduct,
        'nameProduct'         => $nameProduct,
        'descProduct'         => $descProduct,
        'price'               => $price,
        'stock'               => $stock
        ],'productos');

        $condicionales->where(['idProduct='.$idProduct]);
        $condicionales->run();

        return $idProduct; 
    }


    public function delete($idProduct)
    {
        $condicionales = new Condicionales();
        $condicionales->update(['status' => '0'],'productos');
        $condicionales->where(['idProduct='.$idProduct]);
        $condicionales->run();
    }

           
               
}

?>