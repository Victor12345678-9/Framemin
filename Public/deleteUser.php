<?php
require_once ('C:/xampp/htdocs/mvc2/controller/usersController.php');
$obj= new UsersController();
$obj-> destroyUser($_GET['id']);
?>