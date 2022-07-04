<?php

class Bd
{
    public $PDO;
    public function __construct()
    {
        require_once ($_SERVER['DOCUMENT_ROOT'] . "/lindesk/database/conexion/conexion.php");
        $con = new db();
        $this->PDO = $con->conexion();
    }

    public function execute($sql , $last)
    {  
        // try{
            if($last== 0){
                $query = $this->PDO->prepare($sql);
                $query->execute();
                return $query;
            }else{
                $query = $this->PDO->prepare($sql);
                $query->execute();
                $query = $this->PDO->lastInsertId();
                return $query; 
            }
        //  }catch(Exception $ex){
        //      echo "Hubo un error al realizar la consulta <br>";
        // }
    }

  

    
}