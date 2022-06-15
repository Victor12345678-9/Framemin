<?php



 include_once "./Config/constant/rutes.php";
  
require_once (CONTROLLERS_PATH."usersController.php");
$obj= new UsersController();
 	


   $nombre = $_POST['nombre'];
   $apellido = $_POST['apellido'];
   $fechaNacimiento = $_POST['fechaNacimiento'];
   $lugarNacimiento = $_POST['lugarNacimiento'];
   $genero = $_POST['genero'];
   $nacionalidad = $_POST['nacionalidad'];
   $estadoCivil = $_POST['estadoCivil'];
   $rfc = $_POST['rfc'];
   $curp = $_POST['curp'];
   $numeroCartilla = $_POST['numeroCartilla'];
   $numeroTelefonico = $_POST['numeroTelefonico'];
   $correo = $_POST['correo'];
   $direccion = $_POST['direccion'];
   $municipio = $_POST['municipio'];
   $codigoPostal = $_POST['codigoPostal'];
   $empresa = $_POST['empresa'];
   $nss = $_POST['nss'];
   $nomina = $_POST['nomina'];
   $departamento = $_POST['departamento'];
   $puesto = $_POST['puesto'];
   $fechaContratacion = $_POST['fechaContratacion'];


   if( $nombre=== '' || $apellido=== '' || $genero=== '' || $rfc=== '' || $nomina=== '' || $departamento=== ''  || $puesto=== ''){

       echo json_encode('error');
       
   }else{
    $obj->insertUser($_POST['nombre'],$_POST['apellido'],$_POST['fechaNacimiento'],$_POST['lugarNacimiento'],$_POST['genero'],$_POST['nacionalidad'],$_POST['estadoCivil'],$_POST['rfc'],$_POST['curp'],$_POST['numeroCartilla'],$_POST['numeroTelefonico'],$_POST['correo'],$_POST['direccion'],$_POST['municipio'],$_POST['codigoPostal'],$_POST['empresa'],$_POST['nss'],$_POST['nomina'],$_POST['departamento'],$_POST['puesto'],$_POST['fechaContratacion']);

 	echo json_encode('Correcto:');

}
	
	
?>


