<?php

require_once "./Config/constant/rutes.php";


class ProductsController
{
    
    private $MODEL;


    public function __construct()
    {
        require_once (MODELS_PATH."productsModel.php");
        $this->MODEL = new ProductsModel();

        require_once (MODELS_PATH."condiciones.php");
        $this->CLAUSULAS = new Condicionales();

    
    }
   

    public function consultaProductos($buscar,$page=1,$resultadosPorPagina = 5)
{
    $params = 'idProduct,codeProduct,nameProduct,descProduct,price,stock,status';
    $table = 'productos';
    $where = 'status=1';
   

    if(!$buscar)
    {
       
        $query  = $this->MODEL->index($page,$params,$resultadosPorPagina,$table,$where);

        
    }
    else
    {
        
        $query  = $this->MODEL->filtros($buscar,$page,$params,$resultadosPorPagina,$table,$where);
        
    }

    if ($query['total_paginas'] > 0)
    {
        $tabla = '';
        
        

        while($row = $query['query']->fetch())
        {

            $tabla .= '<tr>
            <td>'.$row['codeProduct'].'</td>
            <td>'.$row['nameProduct'].'</td>
            <td>'.$row['descProduct'].'</td>
        
            <td>'.$row['stock'].'</td>
           
            <td>
            
            <a style="margin:5px" href="'.HTTP_.ROOT_PATH_CORE.'/showProduct/'.$row['idProduct'].'"><i class="bx bx-show"></i></a>
            <a style="margin:5px" href="'.HTTP_.ROOT_PATH_CORE.'/editProduct/'.$row['idProduct'].'"><i class="bx bx-pencil"></i></a>
            <a style="margin:5px" href="#" id="delete_product" data-id="'.$row['idProduct'].'"><i class="bx bx-trash"></i></a>

            </td>
            </tr>';
            
        }
  
        
        
    }
    else 
    {
    $tabla = '<tr>
    
        <td colspan=7>
        No se encontraron coincidencias con sus criterios de búsqueda.
        
        
        </td>
    
    
    </tr>';
    
    }

  
    $obj2 = new Helpers();
    $paginacion = $obj2->paginacion($page, $query['total_paginas'], $buscar);

    $dato = array();
    $dato['tabla'][] = $tabla;
    $dato['paginacion'][] = $paginacion; 
    
    
    return json_encode($dato);
}

    // public function json_tabla()
    // {

    //     $json_tabla = $this->MODEL->json_tabla(); 

    //     return json_encode($json_tabla);
    // }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
    //  public function insertProduct($codeProduct,$nameProduct,$descProduct,$price,$stock){
        
    //     $id=$this->MODEL->insert($codeProduct,$nameProduct,$descProduct,$price,$stock);
        

    // // //  return header('Location: '.HTTP_.ROOT_PATH_CORE.'/usersView');
    //  }


      public function showProduct($idProduct){
         
        $condicionales=$this->CLAUSULAS;
        $condicionales->select(['idProduct,nameProduct,codeProduct,descProduct,price,stock'],'productos');
        $condicionales->where(['idProduct='.$idProduct]);
        $resultado =  $condicionales-> run();


        return $resultado;

     }

  
    public function updateProduct($idProduct,$codeProduct,$nameProduct,$descProduct,$price,$stock){

      
        $condicionales=$this->CLAUSULAS;

        $condicionales->update(['nameProduct' => $nameProduct,'codeProduct' => $codeProduct,'descProduct' => $descProduct,'price' => $price,'stock' => $stock],'productos');
        $condicionales->where(['idProduct='.$idProduct]);
        $condicionales->run();
       
       return header('Location: '.HTTP_.ROOT_PATH_CORE.'/productos_');
    }

     public function destroyProduct($idProduct){


        $condicionales=$this->CLAUSULAS;
        $this->CLAUSULAS->update(['status'=> '0'],'productos')->where(['idProduct='.$idProduct]);
        $condicionales->run();

         return header('Location: '.HTTP_.ROOT_PATH_CORE.'/productos');
     }




    
}

?>