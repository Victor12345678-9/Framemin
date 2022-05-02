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

    public function insertUser($nombre, $apellido, $nomina, $correo){
        $id=$this->MODEL->insert($nombre, $apellido, $nomina, $correo);
        
        return header('Location:usersView.php');
    }


     public function showUser($id){
         return $this->MODEL->show($id);

    }

  
    public function updateUser($id,$nombre, $apellido, $nomina, $correo){

       $id=$this->MODEL->update($id,$nombre, $apellido, $nomina, $correo);
         return header('Location:usersView.php');

    }

    public function destroyUser($id){
        $this->MODEL->delete($id);
           header ('Location:usersView.php');

    }



}

    



?>