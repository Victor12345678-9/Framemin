<?php



include_once "./Config/constant/rutes.php";
 require_once (CONTROLLERS_PATH."usersController.php");
	$obj= new UsersController();
	
	$obj->insertUser($_POST['nombre'],$_POST['apellido'],$_POST['fechaNacimiento'],$_POST['lugarNacimiento'],$_POST['edad'],$_POST['genero'],$_POST['nacionalidad'],$_POST['estadoCivil'],$_POST['rfc'],$_POST['curp'],$_POST['numeroCartilla'],$_POST['numeroTelefonico'],$_POST['correo'],$_POST['direccion'],$_POST['municipio'],$_POST['codigoPostal'],$_POST['empresa'],$_POST['nss'],$_POST['nomina'],$_POST['departamento'],$_POST['puesto'],$_POST['fechaContratacion']);
?>

