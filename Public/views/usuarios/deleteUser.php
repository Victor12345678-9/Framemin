<?php
   include_once "../../../Config/constant/rutes.php";
require_once (CONTROLLERS_PATH."usersController.php");
$obj= new UsersController();
 $obj-> destroyUser($_GET['id']);
?>