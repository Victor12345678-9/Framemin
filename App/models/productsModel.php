<?php

require_once "./Config/constant/rutes.php";    
require_once (CONEXION_PATH."conexion.php");
require_once (MODELS_PATH."Models.php");

class ProductsModel
{


    public function __construct()
    {
        
     
        $this->MODELS = new Models();
    }


    public function index($page,$resultadosPorPagina,$params,$table,$where)
    {          
        $query = $this->MODELS->indexGeneric($page,$params,$resultadosPorPagina,$table,$where);
        return $query;

    }



    public function filtros($buscar,$page,$params,$resultadosPorPagina,$table,$where)
    {
        $array_busqueda = 
        array(
            'codeProduct','nameProduct','descProduct'
        );
        

        $query = $this->MODELS->filtrosGeneric($buscar,$page,$params,$resultadosPorPagina,$table,$array_busqueda,$where);

        return $query;
    }

    public function insert($codeProduct,$nameProduct,$descProduct,$price,$stock)
    {
        $datos =    
        array(
            'codeProduct'    =>            $codeProduct,
            'nameProduct'    =>            $nameProduct,
            'descProduct'    =>            $descProduct,
            'price'          =>            $price,
            'stock'          =>            $stock,
            'status'         =>            1
        );
        $table='productos';
        $this->MODELS->insertGeneric($table, $datos);
    }




    public function show($idProduct)
    {
        $where = 'idProduct = '.$idProduct;
        $datos = 
        array(
            'idProduct',
            'codeProduct',
            'descProduct',
            'price',
            'stock'
        );
        
        $mostrar = $this->MODELS->showGeneric('productos', $datos, $where);

        return $mostrar->fetch();
    }

    
    public function update($idProduct,$codeProduct,$nameProduct,$descProduct,$price,$stock)
    {    
        $datos = 
        array(
            'idProduct'           => $idProduct,
            'codeProduct'         => $codeProduct,
            'nameProduct'         => $nameProduct,
            'descProduct'         => $descProduct,
            'price'               => $price,
            'stock'               => $stock
        );

        $this->MODELS->updateGeneric('productos', $datos, 'idProduct', $idProduct);

        return $idProduct; 
    }


    public function delete($idProduct)
    {
        $datos = 
        array(
            'status'    => 0
        );
        
        $this->MODELS->updateGeneric('productos', $datos,'idProduct', $idProduct);

        return true;
    }

           
               
}

?>