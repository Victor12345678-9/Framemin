<?php

require_once "./Config/constant/rutes.php";    

    class ProductsModel{
        private $PDO;
      
        public function __construct(){
        
            require_once (CONEXION_PATH."conexion.php");
            $con = new db();
            $this->PDO=$con->conexion();
        }

        

public function index($page,$resultadosPorPagina,$params,$table)
{      

    
    $offset = ($page - 1) * $resultadosPorPagina;
    $sql = "SELECT $params FROM $table WHERE status = '1'  LIMIT $offset,$resultadosPorPagina";
  
    $sql_count = "SELECT COUNT(idProduct) AS conteo FROM $table WHERE status = '1'";

    $sql_conteo=$this->PDO->query($sql_count);
    $conteo=$sql_conteo->fetch(PDO::FETCH_ASSOC);
    $conteo_end=$conteo['conteo'];

    
    $total_pages = ceil($conteo_end/$resultadosPorPagina);
    $query = array();
    $query['query'] = $this->PDO->query($sql);
    $query['total_paginas'] = $total_pages;
    
    return $query;
}


        
        public function insert($codeProduct,$nameProduct,$descProduct,$price,$stock){

		      $insertar = $this->PDO->prepare("INSERT INTO productos VALUES(null,:codeProduct,:nameProduct,:descProduct,:price,:stock,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
              $insertar->bindParam(':codeProduct',$codeProduct);
              $insertar->bindParam(':nameProduct',$nameProduct);
              $insertar->bindParam(':descProduct',$descProduct);
              $insertar->bindParam(':price',$price);
              $insertar->bindParam(':stock',$stock);
              $insertar->execute();
            //   return $this->PDO->lastInsertId();
		}


// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   

////////////////////////////////////



 public function filtros($buscar,$page,$resultadosPorPagina)
 {
    $offset = ($page - 1) * $resultadosPorPagina;


    $q = $buscar;

    $sql = "
    SELECT idProduct,codeProduct,nameProduct,descProduct,stock FROM productos WHERE
    (codeProduct LIKE '%".$q."%' OR
    nameProduct LIKE '%".$q."%' OR
    descProduct LIKE '%".$q."%') AND status = '1' LIMIT $offset,$resultadosPorPagina";

    $sql_conteo = "
    SELECT  idProduct,codeProduct,nameProduct,descProduct,stock FROM productos WHERE 
    (codeProduct LIKE '%".$q."%' OR
    nameProduct LIKE '%".$q."%' OR
    descProduct LIKE '%".$q."%') AND status = '1' ";

    $conteo = $this->PDO->query($sql_conteo);
    $conteo_end = $conteo->rowCount();

    // $sql_count = "SELECT COUNT(idProduct) AS conteo FROM productos WHERE status = '1'";

    // $sql_conteo=$this->PDO->query($sql_count);
    // $conteo=$sql_conteo->fetch(PDO::FETCH_ASSOC);
    // $conteo_end=$conteo['conteo'];

    $total_pages = ceil($conteo_end/$resultadosPorPagina);

    $query = array();
    $query['query'] = $this->PDO->query($sql);
    $query['total_paginas'] = $total_pages;

     return $query;
 }

 
 


          public function show($idProduct)
          {

             $mostrar=$this->PDO->prepare("SELECT * FROM productos WHERE idProduct=:idProduct LIMIT 1");
             $mostrar->bindParam(':idProduct',$idProduct);
             $mostrar->execute();

             return $mostrar->fetch();
         }

         public function update ($idProduct,$codeProduct,$nameProduct,$descProduct,$price,$stock){

           
            
              $update=$this->PDO->prepare("UPDATE productos SET codeProduct=:codeProduct,nameProduct=:nameProduct,descProduct=:descProduct,price=:price,stock=:stock WHERE idProduct=:idProduct");
              $update->bindParam(':idProduct',$idProduct);
              $update->bindParam(':codeProduct',$codeProduct);
              $update->bindParam(':nameProduct',$nameProduct);
              $update->bindParam(':descProduct',$descProduct);
              $update->bindParam(':price',$price);
              $update->bindParam(':stock',$stock);
              $update->execute();
              return $idProduct; 
         }
            
        
         public function delete($idProduct){
             $delete = $this->PDO->prepare ("UPDATE productos SET status=:status  WHERE idProduct = :idProduct LIMIT 1");
             $delete->bindParam(':idProduct',$idProduct);
             $status=0;
             $delete->bindParam(':status',$status);
             $delete->execute();
             return true;
         }

        
    //     public function array_depa()
    //     {
    //         $depa_sql = "SELECT idDepartamento,nombreDepartamento FROM departamentos;";
    //         $result = $this->PDO->query($depa_sql);
    //         $array = array();
    //         $array[0] = '';
    //         $result->setFetchMode(PDO::FETCH_ASSOC);
    //         $result->execute();
    //         while($row_depa = $result->fetch())
    //         {
    //             $depa[$row_depa['idDepartamento']] = $row_depa['nombreDepartamento']; 
    //         }

    //         return $depa;
    //     }


    //    public function DataDepartamento()
    //    {
    //     $innner=$this->PDO->prepare("SELECT idDepartamento,nombreDepartamento  FROM departamentos;");
    //     $innner->execute();

    //     return $innner->fetchAll();

    //    }



        //////////////////

        // public function json_tabla()
        // {          
        //     $query = "SELECT id, Nomina, Nombre, Genero, Departamento, Puesto, Status FROM usuarios WHERE status = '1' ORDER BY nomina";
 
        //     $stmt = $this->PDO->prepare($query);
        //     $stmt->execute();

        //     $userData = array();
        //     while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        //     {
                  
        //     $userData['usuarios'][] = $row;
                 
        //     }

            
        //     return $userData;

        // }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
  
   
               
        }
?>