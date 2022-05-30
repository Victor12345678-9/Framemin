
<?php 

$datos = datos();
$vista = $datos[0];

include_once ("./Resources/helpers/helpers.php");


switch($vista)
{
///




    case "usersView":
            $success = "";
            if(!(isset($datos[1]) == NULL)){
                if(is_numeric($datos[1]))
                {
                $_GET['pagina'] = $datos[1];
                }
                elseif($datos[1] == "_")
                {
                    $success = "_";
                }
                else
                {
                    error_page();
                }
            }
            include_once "./Config/constant/rutes.php";
            
            
            require_once ("./App/controllers/usersController.php");
            
            $obj= new UsersController();
            $depas = $obj->depas();

////
            $array = array();
            $array[0] = '';
            foreach($depas as $index => $value)
            {
                $array[] = $value[1]; 
            }
            
        include ("./Public/views/usuarios/usersView.php");
            
    break;
    
///
    case "apiUsuarios":
        require_once ("./App/controllers/usersController.php");
            
        $obj = new UsersController();        

        $tabla_consulta = $obj->tabla_consulta_usuarios($_POST['usuarios'],$_POST['page']);

        echo $tabla_consulta;
    break;


    case "apiProductos":
        require_once ("./App/controllers/productsController.php");
            
        $obj = new ProductsController();        

        $tabla_consulta = $obj->index($_POST['productos'],$_POST['page']);

        echo $tabla_consulta;
    break;





    case "showUser":
            if(!(isset($datos[1]) == NULL)){
                if(is_numeric($datos[1]))
                {
                $_GET['id'] = $datos[1];
                }
                else
                {
                    error_page();
                }
            }

                include_once "./Config/constant/rutes.php";
                require_once (CONTROLLERS_PATH."usersController.php");
                require_once (CONTROLLERS_PATH."loginController.php");
              

                $obj= new UsersController();

                $departamentos=$obj->showDepartamentos();
                $user=$obj-> showUser($_GET['id']);
                $depas = $obj->depas();

                ////
                $array = array();
                $array[0] = '';
                foreach($depas as $index => $value)
                {
                    $array[] = $value[1]; 
                }

                $edad = calculaedad($user['fechaNacimiento']);

                $obj2= new LoginController();
             
            include ("./Public/views/usuarios/showUser.php");
    break;
///




// //
// case "json_tabla":
//     require_once ("./App/controllers/usersController.php");
        
//     $obj = new UsersController();        

//     $json_tabla = $obj->json_tabla();

//     echo $json_tabla;
// break;
// //






    case "editUser":
            if(!(isset($datos[1]) == NULL)){
                if(is_numeric($datos[1]))
                {
                $_GET['id'] = $datos[1];
                }
                else
                {
                    error_page();
                }
            }
            include_once "./Config/constant/rutes.php";
            require_once (CONTROLLERS_PATH."usersController.php");
            $obj= new UsersController();
            $usuarios=$obj->showUser($_GET['id']);
            $departamentos=$obj->showDepartamentos();

            $edad = calculaedad($usuarios['fechaNacimiento']);
        
 
            include ("./Public/views/usuarios/editUser.php");
    break;
///


    case "productos":
        include_once "./Config/constant/rutes.php";
        require_once ("./Public/views/productos/productsView.php");
            
        
    break;








    case "deleteUser":
        if(!(isset($datos[1]) == NULL)){
            if(is_numeric($datos[1]))
            {
            $_GET['id'] = $datos[1];
            }
            else
            {
                error_page();
            }
        }
        include_once "./Config/constant/rutes.php";
        require_once (CONTROLLERS_PATH."usersController.php");
         $obj= new UsersController();
         $obj-> destroyUser($_GET['id']);

        
        include ("./Public/views/usuarios/deleteUser.php");

    break; 
///





case "header":
    include ("./Public/views/layout/header.php");
break;





    case "updateUser":
            include ("./Public/views/usuarios/updateUser.php");
    break;

    



///
    case "addUser":
        include "./Config/constant/rutes.php";
        require_once (CONTROLLERS_PATH."usersController.php");

        $obj= new UsersController();

        $departamentos=$obj->showDepartamentos();
        
        
            include ("./Public/views/usuarios/addUser.php");
    break;


    





///
    case "insertUser":
        include ("./Public/views/usuarios/insertUser.php");
    break;

    case "login":
        include ("./Public/views/login/login.php");
    break;


    case "salir":
        include ("./Public/views/login/Salir.php");
break;
    
    case "dashboard":
         include ("./Public/dashboard.php");
        break;

    case "dataLogin":
        include ("./Public/views/login/dataLogin.php");
    break;

    // default:
    // include ("./Public/dashboard.php");
    // break;
    

  

}
 ?>