<?php
  
    class db{

            public function conexion(){  
            try {
               
                $con=new PDO("mysql:host=localhost;dbname=mvc", "root", "");
                return $con;
            }
            catch(PDOException $e) {

               echo ("No Fue Posible Conectar A La Base De Datos");
                
            }
            
        }

    }
    

?>