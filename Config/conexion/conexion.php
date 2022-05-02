<?php
  
  require_once "../../../Config/constant/rutes.php";
  require_once (CONFIG_PATH."config/config.php");

    class db{

        private $host = HOST;
        private $database = DATABASE;
        private $user = USER;
        private $password = PASSWORD;
            
            public function conexion(){  
                // print_r ($this->user);
            try {
               
                $con=new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->password);
                return $con;
            }
            catch(PDOException $e) {

               echo ("No Fue Posible Conectar A La Base De Datos");
                
            }
            
        }

    }
    

?>