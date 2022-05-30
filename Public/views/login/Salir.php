<?php 
include_once "./Config/constant/rutes.php";
    session_start();
    session_unset();
    session_destroy();

    header('Location: '.HTTP_.ROOT_PATH_CORE.'/login');
    
?>