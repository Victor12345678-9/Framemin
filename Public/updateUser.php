<?php

	require_once('../../controller/usersController.php');
	$obj= new UsersController();
	$obj->updateUser($_POST['id'],$_POST['nombre'],$_POST['apellido'],$_POST['nomina'],$_POST['correo']);

?>