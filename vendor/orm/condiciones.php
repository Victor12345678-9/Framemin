<?php

include_once("../../Config/routes/rutes.php");

class Condicionales 
{
    private $where="";
    private $orWhere="";
    private $orderBy;
    private $limit;
    private $count;
    private $parameter='*';
    private $indentific;
    private $select;
    private $update;
    private $table;
    private $delete;     
    private $innerJoin;
    private $rightJoin;
    private $leftJoin;
    private $between;
    
    function __construct()
    {
        require_once ("../../vendor/orm/Models.php");
        $this->MODELS = new Models();

        require_once (CONEXION_PATH."conexion.php");
        $this->PDO = new db();
    }

    function select ($parametros=[],$tabla)
    {

         $indentific=1;
         if(!empty($parametros))
         {
 
             $params = '';
             if($parametros[0] == "*" or $parametros[0] == "")
             {
                 $params .= '*';
             }else{
                 foreach($parametros as $columna)
                 {
                     $params .= "" . $columna . ", ";
                 }
            
                 $params  = substr($params, 0, (strlen($params)-2));
             }
 
         }
                $this->parameter=$params;
                $this->indentific=$indentific;
                $select = "SELECT $this->parameter FROM $tabla";
                $this->select=$select;
                $this->table=$tabla;

        return $this;
            
    }

    function where($where=[])
    {
        $whereValor='';
        foreach($where as $value){
            
            $where_w = " WHERE ";
            $continua = true;
            $whereValor .= $value." AND ";
        }
    
        $where_ = substr($whereValor, 0, -4);
        $where_end  = $where_w.$where_;
        $this->where=$where_end;

        return $this;
    }

    function orWhere($or=[])
    {
        $or_o = '';
        foreach($or as $value)
        {
            if($value){
                $or_o .= 'OR '.$value.' ';
            }
        
        }
        
        $this->orWhere=$or_o;

    return $this;
    }

    
   
    function select_count($condiciones=[], $tabla)
    {
        $indentific = 2;

        $countValor = "SELECT COUNT(".$condiciones[0].") AS conteo FROM ".$tabla." ";

        $this->indentific = $indentific;
        $this->select_count = $countValor;

    return $this;
    }
    

    function orderBy($orderby=[])
    {
            $orderbyValor = '';

            foreach($orderby as $value)
            {
            if($value){

                $orderby_o = " ORDER BY ";
                $orderbyValor .= $value." ";
                }
                echo '<br>';
                
            }

            $orderby_ = $orderby_o.$orderbyValor;
            $this->orderBy= $orderby_;
        return $this;
    }

    function limit($condiciones)
    {
            $limitValor ='';

       
            $limit_l = "LIMIT ";
            $limitValor = $condiciones." ";
            
        
            $limit_ = $limit_l.$limitValor;
            $this->limit = $limit_;

        return $this;
    }



    function innerJoin($tabla)
    {

        if (!empty($this->select)){
            $explode = (explode(",",$this->parameter));
            $innerJoin= " INNER JOIN ".$tabla." ON ".$explode[1]. " = ".$explode[0];
            $this->innerJoin = $innerJoin;
            
        }else{
            echo "No se puede utilizar Join Sin Select";
        }
        
        return $this;
        
    }

    function leftJoin($tabla)
    {
            $explode = (explode(",",$this->parameter));
            $leftJoin= " LEFT JOIN ".$tabla." ON ".$explode[1]. " = ".$explode[0];
            $this->leftJoin = $leftJoin;
            
        return $this;
        
    }

    function rightJoin($tabla)
    {
            if(!empty($this->select)){
                $explode = (explode(",",$this->parameter));
                $rightJoin= " RIGHT JOIN ".$tabla." ON ".$explode[1]. " = ".$explode[0];
                $this->rightJoin = $rightJoin;
                
            }else{
                echo "No se puede utilizar Join sin Select";
                
            }

        return $this;
    }

    // function fullJoin($tabla)
    // {
    //         if(!empty($this->select)){
    //             $explode = (explode(",",$this->parameter));
    //             $fullJoin= " FULL JOIN ".$tabla." ON ".$explode[1]. " = ".$explode[0];
    //             $this->fullJoin = $fullJoin;
               
    //         }else{
    //             echo "No se puede utilizar Join sin Select";
                
    //         }

    //     return $this;
    // }




    public function update($params=[],$tabla)
    {
        $indentific=3;
        if (!empty($params))
        {
    
            $update_query   = 'UPDATE `'.$tabla.'` SET ';
            
            foreach ($params as $columna => $value)
            {
                if($value != "")
                {
                    $update_query .= "`" . $columna . "` = '" . $value . "', ";
                }
            }
        
        
            $update   = substr_replace($update_query, '', -2) . '';
            $this->indentific=$indentific;
            $this->update=$update;
        }

        return $this; 
    }  

    public function delete($params=[],$tabla)
    {
        $indentific = 4;
        
        $parametros='';
        foreach($params as $value){

            $parametros.=$value;

        }
        
        $delete = "DELETE FROM $tabla";
        $this->delete = $delete;
        $this->table =$tabla;
        $this->indentific = $indentific;
        
        return $this;
    }


    public function like($params=[],$array_busqueda,$q,$where,$tabla)
    {
        $indentific = 5;

        $params_all = '';
        foreach($params as $columna)
        {
            $params_all .= "`" . $columna . "`, ";
        }
        $params_all = substr($params_all, 0, -2);

        $sql = "SELECT $params_all FROM ".$tabla." WHERE (";

        foreach ($array_busqueda as $columna)
        {
            $sql .= $columna." LIKE '%".$q."%'  OR ";
        }
        $sql  = substr($sql, 0, (strlen($sql)-4));
        $sql .= ") AND ".$where." ";

        $this->like_sql = $sql;
        $this->indentific = $indentific;

        return $this;
    }

    public function like_conteo($params=[],$array_busqueda,$q,$where,$tabla)
    {
        $indentific = 6;
        
        $params_all = '';
        foreach($params as $columna)
        {
            $params_all .= "`" . $columna . "`, ";
        }
        $params_all = substr($params_all, 0, -2);

        $sql_conteo = "SELECT COUNT($params_all) AS conteo FROM ".$tabla." WHERE (";

        foreach ($array_busqueda as $columna)
        {
            $sql_conteo .= $columna." LIKE '%".$q."%'  OR ";
        }
        $sql_conteo  = substr($sql_conteo, 0, (strlen($sql_conteo)-4));
        $sql_conteo .= ") AND ".$where.";";

        $this->like_sql_conteo = $sql_conteo;
        $this->indentific = $indentific;

        return $this;
    }

    public function insert($params=[],$tabla)
    {
        $indentific = 7;

        if(!empty($params))
        {

            $insert_query   = 'INSERT INTO `'.$tabla.'` SET ';
            
            foreach ($params as $columna => $value)
            {
                if($value != "")
                {
                    $insert_query .= "`" . $columna . "` = '" . $value . "', ";
                }
            }


            $insert_query   = substr_replace($insert_query, '', -2) . ';';
            
            $this->indentific = $indentific;
            $this->insert = $insert_query;
        }

        return $this;
    }  


    public function between($columna, $rango)
    {

        if(!empty($this->select)){
            $between =  " WHERE ".$columna." BETWEEN ".$rango[0]." AND ".$rango[1]." ";

        $this->between = $between;

        }else{
            
        echo "No Se Puede Utilizar Beetween sin select";

        }
        
        return $this;
        
    }   



    public function run()
    {
     
        switch ($this->indentific)
        {
            case 1:
                 $sql_end = $this->select.$this->innerJoin.$this->leftJoin.$this->rightJoin.$this->between.$this->where.$this->count.$this->orWhere.$this->orderBy.$this->limit;
                 
                 $mostrar = $this->MODELS->execute($sql_end);
                 
                 return $mostrar;
            break;

            case 2:
                $sql_end = $this->select_count.$this->where;
                $conteo = $this->MODELS->execute($sql_end);

                return $conteo;
            break;


            case 3:

                $sql_end = $this->update.$this->where.$this->limit;
                $this->MODELS->execute($sql_end);

            break;

            case 4:
                $this->delete.$this->where;
            break;

            case 5:
                $sql_end = $this->like_sql.$this->limit;
                $mostrar = $this->MODELS->execute($sql_end);

                return $mostrar;
            break;

            case 6:
                $sql_end = $this->like_sql_conteo;
                $conteo = $this->MODELS->execute($sql_end);

                return $conteo;
            break;

            case 7:
                $sql_end = $this->insert;
                $mostrar = $this->MODELS->execute($sql_end);
                
           
                 return $mostrar;
            break;
        }
    }


}