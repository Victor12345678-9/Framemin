<?php
	include_once "../../../Config/constant/rutes.php";
	require_once(CONTROLLERS_PATH.'usersController.php');

	
	$obj= new UsersController();
	$obj->updateUser($_POST['id'],$_POST['nombre'],$_POST['apellido'],$_POST['nomina'],$_POST['correo']);

?>