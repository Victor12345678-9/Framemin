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
    private $xd;
    
    public function __construct(){
                    
  
        require_once (MODELS_PATH."Models.php");
        $this->MODELS = new Models();

    }

        function select ($parametros=[],$tabla){
            $indentific=1;
            if(!empty($parametros)){
           $params='';
            
            foreach($parametros as $value){
    
                $params.=$value;
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

        
        
        function select_count($condiciones=[]){
            $indentific=2;
            $countValor='';
        foreach ($condiciones as $value){
            if($value){
               
                $countValor .= 'COUNT('.$value.')';
                }

                //  print_r($countValor);
            $this->indentific=$indentific;
            $this->count= $countValor;
        
            }


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

        function limit($condiciones=[]){
            $limitValor ='';

            foreach ($condiciones as $value){
            if($value){
                $limit_l = "LIMIT ";
                $limitValor .= $value." ";
                }
            }
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



        public function run (){


            require_once (MODELS_PATH."Models.php");
            $this->MODELS = new Models();

            switch ($this->indentific){


                case 1:
                         $sql_end= $this->select.$this->where.$this->count.$this->orWhere.$this->orderBy.$this->limit;
                        $resultado= $this->MODELS->execute($sql_end);

                         return $resultado;
                    break;

                case 2:

                        $count=substr(($this->select.$this->where.$this->count),0,7);
                        $count_end="$count $this->count FROM $this->table $this->where ";
                        print_r($count_end);

                    break;

                case 3:

                        $sql_end = $this->update.$this->where.$this->limit;
                        print($sql_end);
                        $this->MODELS->execute($sql_end);

                       
                break;

                case 4:
                    $sql_end=  $this->delete.$this->where;
                    
                break;


            }
            
            
           
        }


}
        //     $condicionales = new Condicionales();
    
        
        //            $idProduct=2;

        //   $codeProduct='1';
        //   $nameProduct='1';
        //   $descProduct='1';
        //   $price='1';
        //   $stock='1';
        //        $condicionales->select(['nameProduct,descProduct,price,stock'],'productos');
          
        //          $condicionales->where(['idProduct='.$idProduct]);
        //          $condicionales-> run();
  
  
         

        //------------DELETE------------
       /* $condicionales = new Condicionales();
          $condicionales->delete(['idProduct'],'productos')->where(['idProduct=1']);
          $condicionales->run();
      
      */
    
       



























?>