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



    public function insertGeneric($table, $datos)
    {
        if (is_array($datos))
        {
    
            $insert_query   = 'INSERT INTO `'.$table.'` SET ';
            
            foreach ($datos as $columna => $value)
            {
                if($value != "")
                {
                    $insert_query .= "`" . $columna . "` = '" . $value . "', ";
                }
            }

        
            $insert_query   = substr_replace($insert_query, '', -2) . ';';
            
            $this->PDO->query($insert_query);
            
            // last_id
            $last_id  = $this->PDO->lastInsertId();
            
            return $last_id;
        }
    }


    public function updateGeneric($tabla, $datos, $id_columna, $id)
    {
        if (is_array($datos))
        {
    
            $update_query   = 'UPDATE `'.$tabla.'` SET ';
            
            foreach ($datos as $columna => $value)
            {
                if($value != "")
                {
                    $update_query .= "`" . $columna . "` = '" . $value . "', ";
                }
            }
        
            $update_query   = substr_replace($update_query, '', -2) . '';

            $update_query_ = $update_query.' WHERE '.$id_columna.' = '.$id.';';
            $this->PDO->query($update_query_);
                            
            return true;
        }
    }


    public function showGeneric($tabla, $datos, $condiciones)
    {
        $parametros='*';

        if (is_array($datos))
        {
            $parametros = '';
            if($datos[0] != "*")
            {

                foreach ($datos as $columna)
                {
                    $parametros .= "`" . $columna . "`, ";
                }

                $parametros  = substr($parametros, 0, (strlen($parametros)-2));
            }



            $where = '';
            $orderby = '';
            $orderbyValor = '';
            $limit = '';
            $limitValor = '';
            foreach($condiciones as $index => $valor)
            {
                if(substr(strtolower($index),0, 5) == 'where'){
                    
                    $where .= $valor." ";
                }
            
                if(strtolower($index) == 'orderby'){
                    if($valor){
                    $orderby = "ORDER BY ";
                    $orderbyValor .= $valor." ";
                    }
                }
            
                if(strtolower($index) == 'limit'){
                    if($valor){
                    $limit = "LIMIT ";
                    $limitValor .= $valor." ";
                    }
                }
               
            }
      
    
             $orderby = $orderby.$orderbyValor;
             $limit = $limit.$limitValor;
            
    
            
            $mostrar = $this->PDO->prepare("SELECT ".$parametros." FROM ".$tabla." WHERE ".$where.$orderby.$limit.";");
               
            $mostrar->execute();

            return $mostrar;
        }
    }


    
 
    public function ejemplo(){
       

        $condiciones = array(
            'orderby' => 'idProduct', 'desc',
            'WHERE' => 'idProduct >10', 'price<1000',
            'OR' => 'idProduct > 10', 
       
            'limit' => '0,10',
        ); 



        echo '<h1>Resultado</h1>';

            /// 
            $where_w = '';
            $whereValor = '';
            $or = '';
            $orderby = '';
            $orderValor = '';
            $limit = '';
            $limitValor = '';
            $orden = '';
            



        if ($condiciones!=""){

            foreach ($condiciones as $index => $value){

                
                $min= strtolower($index);
                
                if(strtolower($index) != 'or' && strtolower($index) != 'orderby' && strtolower($index) != 'limit' && strtolower($value) != 'asc' && strtolower($value) != 'desc'){
                    $where_w = " WHERE ";
                    $whereValor .= $value." AND ";
                }
                
                if(strtolower($index) == 'or' && strtolower($index) != 'orderby'){
                    if($index!='' ){
                        $or .= ' OR '.$value.' ';
                    }
                }
            
            
                if(strtolower($index) == 'orderby'){
                    if($value){
                    $orderby = " ORDER BY ";
                    $orderValor .= $value." ";
                    }
                }
            
                if(strtolower($index) == 'limit'){
                    if($value){
                    $limit = "LIMIT ";
                    $limitValor .= $value." ";
                    }
                }
            
                if(strtolower($value) == 'asc'){
                    $orden = ' ASC ';
                }elseif(strtolower($value) == 'desc'){
                    $orden = ' DESC ';
                }
            }
            

            $where_ = substr($whereValor, 0, -4);
            $where_end  = $where_w.$where_.$or;
           
            $orderby = $orderby.$orderValor.$orden;
            $limit = $limit.$limitValor;
            $table = 'productos';


            $datos = [
                'idProduct',
                'codeProduct',
                'nameProduct',
                'descProduct',
                'price',
                'stock'
            ];

            $parametros='*';

            if (is_array($datos))
            {
                $parametros = '';
                if($datos[0] != "*")
                {
    
                    foreach ($datos as $columna)
                    {
                        $parametros .= "`" . $columna . "`, ";
                    }
    
                    $parametros  = substr($parametros, 0, (strlen($parametros)-2));
                }



                //$this->PDO->prepare
            $mostrar = ("SELECT ".$parametros." FROM ".$table.$where_end.$orderby.$limit.";");

            print_r($mostrar);

        }       

    
    }
    }
}

?>