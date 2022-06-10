<?php

require_once "./Config/constant/rutes.php"; 


class Models
{
    private $PDO;
   
    
    public function __construct()
    {
        require_once (CONEXION_PATH."conexion.php");
        $con = new db();
        $this->PDO=$con->conexion();

                
     
       
    }


    public function indexGeneric($page,$resultadosPorPagina,$params,$table,$where)
    { 
        $offset = ($page - 1) * $resultadosPorPagina;

        $sql = "SELECT $params FROM ".$table." WHERE $where LIMIT $offset,$resultadosPorPagina";

        $sql_count = "SELECT COUNT(status) AS conteo FROM ".$table." WHERE $where ";
    
        $sql_conteo=$this->PDO->query($sql_count);
        $conteo=$sql_conteo->fetch(PDO::FETCH_ASSOC);
        $conteo_end=$conteo['conteo'];

        $query = array();
        $query['query'] = $this->PDO->query($sql);
        $query['total_paginas'] = $conteo_end;
    
            
        return $query;
    }

    public function filtrosGeneric($buscar,$page,$params,$resultadosPorPagina,$table,$array_busqueda,$where)
    {
        $offset = ($page - 1) * $resultadosPorPagina;
        $q = $buscar;

        /////////////////
        $sql = "SELECT $params FROM ".$table." WHERE (";
        foreach ($array_busqueda as $columna)
        {
            $sql .= $columna." LIKE '%".$q."%'  OR ";
        }
        $sql  = substr($sql, 0, (strlen($sql)-4));
        $sql .= ") AND $where LIMIT $offset,$resultadosPorPagina";

        /////////////////
        $sql_conteo = "SELECT $params FROM ".$table." WHERE (";
        foreach ($array_busqueda as $columna)
        {
            $sql_conteo .= $columna." LIKE '%".$q."%'  OR ";
        }
        $sql_conteo  = substr($sql_conteo, 0, (strlen($sql_conteo)-4));
        $sql_conteo .= ") AND $where;";
        /////////////////

        $conteo = $this->PDO->query($sql_conteo);
        $conteo_end = $conteo->rowCount();
        $total_pages = ceil($conteo_end/$resultadosPorPagina);

        $query = array();
        $query['query'] = $this->PDO->query($sql);
        $query['total_paginas'] = $total_pages;

        return $query;
    }



    // public function insertGeneric($table, $datos)
    // {
    //     if (is_array($datos))
    //     {
    
    //         $insert_query   = 'INSERT INTO `'.$table.'` SET ';
            
    //         foreach ($datos as $columna => $value)
    //         {
    //             if($value != "")
    //             {
    //                 $insert_query .= "`" . $columna . "` = '" . $value . "', ";
    //             }
    //         }

        
    //         $insert_query   = substr_replace($insert_query, '', -2) . ';';
            
    //         $this->PDO->query($insert_query);
            
    //         // last_id
    //         $last_id  = $this->PDO->lastInsertId();
            
    //         return $last_id;
    //     }
    // }


    // public function updateGeneric($tabla, $datos, $id_columna, $id)
    // {
    //     if (is_array($datos))
    //     {
    
    //         $update_query   = 'UPDATE `'.$tabla.'` SET ';
            
    //         foreach ($datos as $columna => $value)
    //         {
    //             if($value != "")
    //             {
    //                 $update_query .= "`" . $columna . "` = '" . $value . "', ";
    //             }
    //         }
        
    //         $update_query   = substr_replace($update_query, '', -2) . '';

    //         $update_query_ = $update_query.' WHERE '.$id_columna.' = '.$id.';';
    //         $this->PDO->query($update_query_);
                            
    //         return true;
    //     }
    // }


   
    
 
    public function execute($sql_end){

        $query = $this->PDO->prepare("$sql_end;");
        $query->execute();

        return $query->fetch();
       

    
    }
    }


?>