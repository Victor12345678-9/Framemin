<?php
require_once ('C:/xampp/htdocs/minia/App/controllers/usersController.php');
$obj= new UsersController();
$obj-> destroyUser($_GET['id']);
?>