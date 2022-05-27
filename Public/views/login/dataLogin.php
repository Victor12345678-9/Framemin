<?php 
   

require_once "./Config/constant/rutes.php";   



    if (isset($_POST["username"]) && isset($_POST["password"])) {

       
        require_once (MODELS_PATH."loginModel.php");
      

        $validar = new Login();
        $validar->validarDatos($_POST["username"], $_POST["password"]);

    } else {
      
        header("location:../../dashboard.php");
    }
?>