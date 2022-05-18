<?php

require_once "router.php";

$datos = datos();
$vista = $datos[0];


switch($vista)
{
///
    case "usersView":
            if(!(isset($datos[1]) == NULL)){
                if(is_numeric($datos[1]))
                {
                $_GET['pagina'] = $datos[1];
                }
                else
                {
                    error_page();
                }
            }
        
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
        
        include ("./Public/views/usuarios/deleteUser.php");
    break; 
///
    case "updateUser":
            include ("./Public/views/usuarios/updateUser.php");
    break;
///
    case "addUser":
            include ("./Public/views/usuarios/addUser.php");
    break;
///
    case "insertUser":
        include ("./Public/views/usuarios/insertUser.php");
    break;

    
///

///
    default:
         include ("./Public/index.php");
///
}
