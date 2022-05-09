<?php

require_once "../../../Config/constant/rutes.php";


class UsersController{
    

    private $MODEL;

    public function __construct(){

        require_once (MODELS_PATH."usersModel.php");
        $this->MODEL = new UsersModel();

    }

    public function show(){

        return $this->MODEL->showAll(); 

    }
   
    public function insertUser($nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$edad,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion){
        
        $id=$this->MODEL->insert($nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$edad,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion);
       
        return header('Location:usersView.php');
    }


     public function showUser($id){
         return $this->MODEL->show($id);

    }

  
    public function updateUser($id,$nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$edad,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion){

       $id=$this->MODEL->update($id,$nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$edad,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion);
       return header('Location:usersView.php');
       
    }

    public function destroyUser($id){
        $this->MODEL->delete($id);
        return header('Location:usersView.php');

    }

    public function showDepartamentos(){
      
        return $this->MODEL->verDepartamentos(); 

    }

    public function innerDep(){

        return $this->MODEL->joinDepartamento();
    }

  

    
}

?>