 <?php 
    include_once "./Config/constant/rutes.php";
   
   



    session_start();
    if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {
        
        require (MODELS_PATH."loginModel.php");
        $validar = new Validar();
        $validar->validarDatos();

        include_once ("./Public/dashboard.php");
        
    } else {

        if (isset($_SESSION["error"])) {
        
            echo "<p>Usuario y/o contraseña incorrecto</p>";
            unset($_SESSION["error"]);
    
        }

       
        include_once("./Public/views/login/login.php");
    }
?> 