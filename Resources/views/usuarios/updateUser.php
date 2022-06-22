<?php
	include_once "../../Config/routes/rutes.php";
	require_once(CONTROLLERS_PATH.'usersController.php');
	
	$page 	= $_POST['page'];
	if (isset($_POST['page']) == "") {
		$page 	= '';
	}
	$buscar = $_POST['buscar'];
	if (isset($_POST['buscar']) == "") {
		$buscar = '';
	}
	$s_buscar = ($buscar)? "/".$buscar : $buscar; 
	$page_buscar = $page.$s_buscar.'/_';

	$obj= new UsersController();
	$obj->updateUser($_POST['id'],$_POST['nombre'],$_POST['apellido'],$_POST['fechaNacimiento'],$_POST['lugarNacimiento'],$_POST['genero'],$_POST['nacionalidad'],$_POST['estadoCivil'],$_POST['rfc'],$_POST['curp'],$_POST['numeroCartilla'],$_POST['numeroTelefonico'],$_POST['correo'],$_POST['direccion'],$_POST['municipio'],$_POST['codigoPostal'],$_POST['empresa'],$_POST['nss'],$_POST['nomina'],$_POST['departamento'],$_POST['puesto'],$_POST['fechaContratacion']
    ,$page_buscar
    );
?>