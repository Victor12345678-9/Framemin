<?php 

require_once "./Config/constant/rutes.php";    

    class LoginModel{



        private $PDO;
      
        public function __construct(){
        
            require_once (CONEXION_PATH."conexion.php");
            $con = new db();
            $this->PDO=$con->conexion();
        }

        



        public function validarDatos($username, $password) {

          
                 $sql = "SELECT * FROM administradores WHERE username = :username AND password = :password";

                 $resultado =  $this->PDO->prepare($sql);
                 $resultado->execute(array(":username"=>$username, ":password"=>$password));
            
                 $cantidad_resultado = $resultado->rowCount();
                 
                
                 return $cantidad_resultado;

        }

    }



    class Validar {

        private $PDO;
      
        public function __construct(){
        
            require_once (CONEXION_PATH."conexion.php");
            $con = new db();
            $this->PDO=$con->conexion();
        }


        public function validarDatos() {

          
                $sql = "SELECT * FROM administradores WHERE username = :username AND password = :password";

                $resultado =  $this->PDO->prepare($sql);
                $resultado->execute(array(":username"=>$_SESSION["username"], ":password"=>$_SESSION["password"]));

                $cantidad_resultado = $resultado->rowCount();

                if ($cantidad_resultado == 0) {

                  
                   header('Location: '.HTTP_.ROOT_PATH_CORE.'/salir');

                } 

                
           
        }

    }

?>