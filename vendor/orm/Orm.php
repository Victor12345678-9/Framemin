<?php
/** @author "Victor Vilchis" */

require_once ("Bd.php");
class Orm 
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
    private $delete;     
    private $innerJoin;
    private $rightJoin;
    private $leftJoin;
    private $between; 
    private $PDO;

    function __construct(){
        $this->PDO = new Bd();
    }


    function where($where=[]){
        if($this->where == "" or !isset($this->where) or $this->where == null ){
            $res = ' WHERE '.$where[0] . ' '. $where[1].' "'. $where[2]. '"' ;
            $this->where = $res;
            return $this;
        }else{
            $res = ' AND '.$where[0] . ' '. $where[1].' "'. $where[2]. '" ' ;
            $this->where .= $res;
            return $this;
        }
    }
    
    function orWhere($or=[]){
        $or_o = '';
        foreach($or as $value){
            if($value){
                $or_o .= 'OR '.$value.' ';
            }
        }
        $this->orWhere=$or_o;
        return $this;
    }

    function count(){
        $countValor = "COUNT($this->parameter)";
        $this->parameter = $countValor;
        return $this;
    }

    function sum(){
        $countValor = "SUM($this->parameter)";
        $this->parameter = $countValor;
        return $this;
    }

    function lower(){
        $countValor = "LOWER($this->parameter)";
        $this->parameter = $countValor;
        return $this;
    }

    function max(){
        $countValor = "MAX($this->parameter)";
        $this->parameter = $countValor;
        return $this;
    }

    function min(){
        $countValor = "MIN($this->parameter)";
        $this->parameter = $countValor;
        return $this;
    }

    function prom(){
        $countValor = "AVG($this->parameter)";
        $this->parameter = $countValor;
        return $this;
    }
    
    function orderBy($orderby=[]){
        $orderbyValor = '';
        foreach($orderby as $value){
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

    function limit($condiciones){
        $limitValor ='';
        $limit_l = "LIMIT ";
        $limitValor = $condiciones." ";
        $limit_ = $limit_l.$limitValor;
        $this->limit = $limit_;
        return $this;
    }

    function first(){
        $limit = " LIMIT 1";
        $this->limit = $limit;
        return $this;
    }

    function innerJoin($tabla){
        if (!empty($this->select)){
            $explode = (explode(",",$this->parameter));
            $innerJoin= " INNER JOIN ".$tabla." ON ".$explode[1]. " = ".$explode[0];
            $this->innerJoin = $innerJoin;
            
        }else{
            echo "No se puede utilizar Join Sin Select";
        }
        return $this;
    }

    function leftJoin($tabla){
        $explode = (explode(",",$this->parameter));
        $leftJoin= " LEFT JOIN ".$tabla." ON ".$explode[1]. " = ".$explode[0];
        $this->leftJoin = $leftJoin;
        return $this;
    }

    function rightJoin($tabla){
        if(!empty($this->select)){
            $explode = (explode(",",$this->parameter));
            $rightJoin= " RIGHT JOIN ".$tabla." ON ".$explode[1]. " = ".$explode[0];
            $this->rightJoin = $rightJoin;
        }else{
            echo "No se puede utilizar Join sin Select";
            
        }
        return $this;
    }

    public function between($columna, $rango){
        if(!empty($this->select)){
            $between =  " WHERE ".$columna." BETWEEN ".$rango[0]." AND ".$rango[1]." ";
            $this->between = $between;
        }else{

            echo "No Se Puede Utilizar Beetween sin select";
        }
        return $this;
    }  

    public function select($parametros=[],$tabla){
       $this->indentific=1;

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
       $this->table = $tabla;
       return $this; 
    }

    public function update($params=[],$tabla){
          
        $indentific=2;
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

    public function delete($params=[],$tabla){
        $indentific = 3;
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

    public function insert($params=[],$tabla){
        
         
          $indentific = 4;
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

    public function run(){
        switch ($this->indentific){
            case 1://select
                $sql_end = "SELECT " . $this->parameter ." FROM ". $this->table . $this->innerJoin.$this->leftJoin.$this->rightJoin.$this->between.$this->where.$this->count.$this->orWhere.$this->orderBy.$this->limit;
                $mostrar = $this->PDO->execute($sql_end,$last=0);
                return $mostrar;
                break;
            case 2://update
                $sql_end = $this->update.$this->where.$this->limit;
                
                $mostrar = $this->PDO->execute($sql_end,$last=1);
                return $mostrar;
                break;

            case 3://delete
                $sql_end= $this->delete.$this->where;
                
                $mostrar = $this->PDO->execute($sql_end,$last = 1);
                return $mostrar;
                break;

            case 4://insert
                $sql_end = $this->insert;
                $mostrar = $this->PDO->execute($sql_end,$last = 1);
               
                return $mostrar;
                break;
        }
    }
}

?>