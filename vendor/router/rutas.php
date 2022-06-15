<?php

$datos = datos();
$vista = $datos[0];

require_once "./../../Config/routes/rutes.php";
require_once "./../../App/controllers/usersController.php";

$obj = new UsersController();

require_once "./../../App/controllers/productsController.php";
$obj2 = new ProductsController();

require_once "./../../vendor/helpers/helpers.php";
$obj3 = new Helpers();

switch ($vista) {
///

    case "usersView":
        $success = "";
        if (!(isset($datos[1]) == null)) {
            if (is_numeric($datos[1])) {
                $_GET['pagina'] = $datos[1];
            } elseif ($datos[1] == "_") {
                $success = "_";
            } else {
                error_page();
            }
        }

        $depas = $obj->depas();
        $array = array();
        $array[0] = '';
        foreach ($depas as $index => $value) {
            $array[] = $value[1];
        }

        include "../../Resources/views/usuarios/usersView.php";

        break;

///
    case "apiUsuarios":

        $tabla_consulta = $obj->consultaUsuarios($_POST['usuarios'], $_POST['page']);

        echo $tabla_consulta;
        break;

    case "apiProductos":

        $tabla_consulta = $obj2->consultaProductos($_POST['productos'], $_POST['page']);

       
        echo $tabla_consulta;
        break;

    case "showUser":
        if (!(isset($datos[1]) == null)) {
            if (is_numeric($datos[1])) {
                $_GET['id'] = $datos[1];
            } else {
                error_page();
            }
        }
        
    

        $departamentos = $obj->showDepartamentos();
        $user = $obj->showUser($_GET['id']);
        $depas = $obj->depas();

        ////
        $array = array();
        $array[0] = '';
        foreach ($depas as $index => $value) {
            $array[] = $value[1];
        }

        $edad = $obj3->calculaedad($user['fechaNacimiento']);
        
        include "../../Resources/views/usuarios/showUser.php";
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
        if (!(isset($datos[1]) == null)) {
            if (is_numeric($datos[1])) {
                $_GET['id'] = $datos[1];
            } else {
                error_page();
            }
        }

        $usuarios = $obj->showUser($_GET['id']);
        $departamentos = $obj->showDepartamentos();
        $edad = $obj3->calculaedad($usuarios['fechaNacimiento']);

        include "../../Resources/views/usuarios/editUser.php";
        break;
///

    case "deleteUser":
        if (!(isset($datos[1]) == null)) {
            if (is_numeric($datos[1])) {
                $_GET['id'] = $datos[1];
            } else {
                error_page();
            }
        }

        $obj->destroyUser($_GET['id']);

        include "../../Resources/views/usuarios/deleteUser.php";

        break;
///

    case "updateUser":
        include "../../Resources/views/usuarios/updateUser.php";
        break;

        case "updateProduct":
            include "../../Resources/views/productos/updateProduct.php";
            break;

///
    case "addUser":

        $departamentos = $obj->showDepartamentos();

        include "../../Resources/views/usuarios/addUser.php";
        break;


        


    case "addProduct":

        include "../../Resources/views/productos/addProducts.php";
        break;

    case "productos":

        include_once "../../Resources/views/productos/products.php";

        break;
        
        case "deleteProduct":
            if (!(isset($datos[1]) == null)) {
                if (is_numeric($datos[1])) {
                    $_GET['idProduct'] = $datos[1];
                } else {
                    error_page();
                }
            }
            
            $obj2->destroyProduct($_GET['idProduct']);
    
            include "../../Resources/views/productos/deleteProduct.php";
    
            break;



            case "showProduct":
                if (!(isset($datos[1]) == null)) {
                    if (is_numeric($datos[1])) {
                        $_GET['idProduct'] = $datos[1];
                    } else {
                        error_page();
                    }

                    
                }
                $product = $obj2->showProduct($_GET['idProduct']);
                    include_once "../../Resources/views/productos/showProduct.php";
                break;
                

                case "editProduct":
                    if (!(isset($datos[1]) == null)) {
                        if (is_numeric($datos[1])) {
                            $_GET['idProduct'] = $datos[1];
                        } else {
                            error_page();
                        }
    
                        $product = $obj2->showProduct($_GET['idProduct']);
                        include_once "../../Resources/views/productos/editProduct.php";
                    }
                    break;


    case "dashboard":


        include_once "../../Public/index.php";

        break;

///
    case "insertUser":
        include "./../Resources/views/usuarios/insertUser.php";
        break;

        case "insertProduct":
            include "../../Resources/views/productos/insertProduct.php";
           
            break;

   
        case "pruebas":
            include "../../Resources/views/admin.php";
            break;

            default:

            include_once "../../Public/index.php";
            break;



}
