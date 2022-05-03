<?php

require_once "../../../Config/constant/rutes.php";    


    class UsersModel{
        private $PDO;
      
        public function __construct(){
        
            require_once (CONEXION_PATH."conexion.php");
            $con = new db();
            $this->PDO=$con->conexion();
        }

        
      
        public function showAll(){
            $ver=$this->PDO->prepare('SELECT * FROM usuarios');
            $ver->execute();
            return $ver->fetchAll();
        }

        public function insert($nombre, $apellido, $nomina, $correo){
		      $insertar = $this->PDO->prepare("INSERT INTO usuarios VALUES(null,:nombre,:apellido,:nomina,:correo)");
              $insertar->bindParam(':nombre',$nombre);
              $insertar->bindParam(':apellido',$apellido);
              $insertar->bindParam(':nomina',$nomina);
              $insertar->bindParam(':correo',$correo);
              $insertar->execute();
              return $this->PDO->lastInsertId();
		}


         public function show($id){

           $mostrar=$this->PDO->prepare("SELECT * FROM usuarios WHERE id=:id LIMIT 1");
           $mostrar->bindParam(':id',$id);
          $mostrar->execute();
           return $mostrar->fetch();
         }

        public function update ($id,$nombre, $apellido, $nomina, $correo){

            $update=$this->PDO->prepare("UPDATE usuarios SET nombre=:nombre, apellido=:apellido, nomina=:nomina, correo=:correo WHERE id = :id");
            $update->bindParam(':id',$id);
            $update->bindParam(':nombre',$nombre);
            $update->bindParam(':apellido',$apellido);
            $update->bindParam(':nomina',$nomina);
            $update->bindParam(':correo',$correo);
            $update->execute();
            return $id; 
            
            
        }
        

        
        public function delete($id){
            $delete = $this->PDO->prepare ("DELETE FROM usuarios WHERE id = :id LIMIT 1");
            $delete->bindParam(':id',$id);
            $delete->execute();
            return true;
        }

   
       
       
  
    }

    

?>