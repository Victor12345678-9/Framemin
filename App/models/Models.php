<?php

require_once "./Config/routes/rutes.php";

class Models
{
    private $PDO;
    
    public function __construct()
    {
        require_once (CONEXION_PATH."conexion.php");
        $con = new db();
        $this->PDO=$con->conexion();
    }

    public function execute($sql_end)
    {  
        $query = $this->PDO->prepare($sql_end.";");
        $query->execute();

        return $query;
    }
   
}