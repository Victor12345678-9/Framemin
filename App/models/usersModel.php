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

        public function insert($nombre, $apellido,$fechaNacimiento,$lugarNacimiento,$edad,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion){
		      $insertar = $this->PDO->prepare("INSERT INTO usuarios VALUES(null,:nombre,:apellido,:fechaNacimiento,:lugarNacimiento,:edad,:genero,:nacionalidad,:estadoCivil,:rfc,:curp,:numeroCartilla,:numeroTelefonico,:correo,:direccion,:municipio,:codigoPostal,:empresa,:nss,:nomina,:departamento,:puesto,:fechaContratacion)");
              $insertar->bindParam(':nombre',$nombre);
              $insertar->bindParam(':apellido',$apellido);
              $insertar->bindParam(':fechaNacimiento',$fechaNacimiento);
              $insertar->bindParam(':lugarNacimiento',$lugarNacimiento);
              $insertar->bindParam(':edad',$edad);
              $insertar->bindParam(':genero',$genero);
              $insertar->bindParam(':nacionalidad',$nacionalidad);
              $insertar->bindParam(':estadoCivil',$estadoCivil);
              $insertar->bindParam(':rfc',$rfc);
              $insertar->bindParam(':curp',$curp);
              $insertar->bindParam(':numeroCartilla',$numeroCartilla);
              $insertar->bindParam(':numeroTelefonico',$numeroTelefonico);
              $insertar->bindParam(':correo',$correo);
              $insertar->bindParam(':direccion',$direccion);
              $insertar->bindParam(':municipio',$municipio);
              $insertar->bindParam(':codigoPostal',$codigoPostal);
              $insertar->bindParam(':empresa',$empresa);
              $insertar->bindParam(':nss',$nss);
              $insertar->bindParam(':nomina',$nomina);
              $insertar->bindParam(':departamento',$departamento);
              $insertar->bindParam(':puesto',$puesto);
              $insertar->bindParam(':fechaContratacion',$fechaContratacion);
          
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