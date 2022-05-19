
<?php 

$datos = datos();
$vista = $datos[0];


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
            
            include ("./Resources/helpers/paginacion.php");

            include ("./Public/views/usuarios/usersView.php");
    break;
///










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
              

                $obj= new UsersController();

                $departamentos=$obj->innerDep();
                $user=$obj-> showUser($_GET['id']);
                $depas = $obj->depas();

                ////
                $array = array();
                $array[0] = '';
                foreach($depas as $index => $value)
                {
                    $array[] = $value[1]; 
                }


            include ("./Public/views/usuarios/showUser.php");
    break;
///











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
        
 
            include ("./Public/views/usuarios/editUser.php");
    break;
///











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


    

    default:
         include ("./Public/index.php");

}
 ?>