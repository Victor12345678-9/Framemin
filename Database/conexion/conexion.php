<?php

require_once ($_SERVER['DOCUMENT_ROOT']."/lindesk/config/bd.php");

class db{

    private $host = HOST;
    private $database = DATABASE;
    private $user = USER;
    private $password = PASSWORD;

    public function conexion(){  
        try {
            $con = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->password);  
            return $con;
        }
        catch(PDOException $e) {
            echo ("No Fue Posible Conectar A La Base De Datos");
        }
    }
}
?>