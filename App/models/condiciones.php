<?php

include_once("./App/models/Models.php");

class Condicionales {


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
 
    
    public function __construct(){
                    
  
        require_once (MODELS_PATH."Models.php");
        $this->MODELS = new Models();

    }

        function select ($parametros=[],$tabla) {

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

        function where($where=[]){
            
             
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

        function orWhere($or=[]){
        
    
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

        
        
        function count(){

            $indentific=2;
            
            $explode= (explode(",",$this->parameter));
            
            $countValor='';
            $countValor .= 'COUNT('.$explode[0].')';
           
            $this->indentific=$indentific;
            $this->count= $countValor;
            

            return $this;
        }

        

        function orderBy($orderby=[]){
        
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

        function limit($condiciones){
            $limitValor ='';

                $limit_l = " LIMIT ";
                $limitValor .= $condiciones." ";
                
            $limit_ = $limit_l.$limitValor;
            $this->limit = $limit_;

            return $this;
            
        }

        public function update($params=[],$tabla){
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

        public function delete($params=[],$tabla){
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

    



    public function run (){


        require_once (MODELS_PATH."Models.php");
        $this->MODELS = new Models();

        switch ($this->indentific){


            case 1:
                    $resultado= $this->select.$this->where.$this->count.$this->orWhere.$this->orderBy.$this->limit;
                    // print_r($resultado);
                    print_r($resultado);
                    $resultado = $this->MODELS->execute($resultado);
                    
                    return $resultado;
                break;

            case 2:


                if (!empty($this->select)){

                   
                    $count=substr(($this->select.$this->where.$this->count),0,7);
                   
                    $count_end="$count $this->count FROM $this->table $this->where ";
                    // print_r($count_end);
                    $resultado  = $this->MODELS->execute($count_end);

                    
                  
                }else{
                    echo "No se puede utilizar count sin Select";
                }

                return $resultado;

                break;

            case 3:

                    $resultado = $this->update.$this->where.$this->limit;
               
                    $resultado = $this->MODELS->execute($resultado);

                    return $resultado;

                   
            break;

            case 4:
                $resultado=  $this->delete.$this->where;
                
            break;


        }
            
            
           
        }


}
    


  
 

        //------------DELETE------------
       /* $condicionales = new Condicionales();
          $condicionales->delete(['idProduct'],'productos')->where(['idProduct=1']);
          $condicionales->run();
      
      */
    
       



























?>