<?php 
   

require_once "./Config/constant/rutes.php";   
require_once(CONTROLLERS_PATH.'loginController.php');



   if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    	
    $username= ($_POST['username']);
    $password= ($_POST['password']);

    $obj= new LoginController();
   $resultado= $obj->validarDatos($username,$password);
    
    if (!empty($resultado)){

        header('Location: '.HTTP_.ROOT_PATH_CORE.'/usersView');

    }else{
        echo "hola";
        header('Location: '.HTTP_.ROOT_PATH_CORE.'/login');
    
    }
 

    
    
 }
 ?>