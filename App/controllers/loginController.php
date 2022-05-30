<?php

require_once "./Config/constant/rutes.php";



class LoginController{
    

    private $MODEL;

    public function __construct(){

        require_once (MODELS_PATH."loginModel.php");
        $this->MODEL = new loginModel();

    }
    
    public function validarDatos($username,$password){

        $resultado=$this->MODEL->validarDatos($username,$password);

        session_start();

        if($resultado==1){ 
            
           $username_session= $_SESSION["username"] = $username;
            return $username_session;
            

        }
        else{
            $_SESSION["error"] = "ERROR";
            echo ("No Registrado");
            
        }

    }


}
?>