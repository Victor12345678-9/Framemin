<?php

require_once "./Config/constant/rutes.php";    

    class UsersModel{
        private $PDO;
      
        public function __construct(){
        
            require_once (CONEXION_PATH."conexion.php");
            $con = new db();
            $this->PDO=$con->conexion();
        }

        
      
        // public function showAll(){
        //     $ver=$this->PDO->prepare('SELECT * FROM usuarios');
        //     $ver->execute();
        //     return $ver->fetchAll();
        // }


        
        public function insert($nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion){

		      $insertar = $this->PDO->prepare("INSERT INTO usuarios VALUES(null,:nombre,:apellido,:fechaNacimiento,:lugarNacimiento,:genero,:nacionalidad,:estadoCivil,:rfc,:curp,:numeroCartilla,:numeroTelefonico,:correo,:direccion,:municipio,:codigoPostal,:empresa,:nss,:nomina,:departamento,:puesto,:fechaContratacion,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
              $insertar->bindParam(':nombre',$nombre);
              $insertar->bindParam(':apellido',$apellido);
              $insertar->bindParam(':fechaNacimiento',$fechaNacimiento);
              $insertar->bindParam(':lugarNacimiento',$lugarNacimiento);
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


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   

////////////////////////////////////
        public function tabla_consulta_usuarios_sql_sin_buscar($page,$resultadosPorPagina)
        { 
            $offset = ($page - 1) * $resultadosPorPagina;

            $sql = "SELECT * FROM usuarios WHERE status = '1' ORDER BY nomina LIMIT $offset,$resultadosPorPagina";
            $sql_conteo = "SELECT * FROM usuarios WHERE status = '1' ORDER BY nomina";
        
            $conteo = $this->PDO->query($sql_conteo);
            $conteo_end = $conteo->rowCount();
            $total_pages = ceil($conteo_end/$resultadosPorPagina);

            $query = array();
            $query['query'] = $this->PDO->query($sql);
            $query['total_paginas'] = $total_pages;
            $query['depas'] = $this->array_depa();

            return $query;
        }

        public function tabla_consulta_usuarios_sql_con_buscar($buscar,$page,$resultadosPorPagina)
        {
            $offset = ($page - 1) * $resultadosPorPagina;

            $q = $buscar;

            $sql = "
            SELECT * FROM usuarios WHERE
            (nomina LIKE '%".$q."%' OR
            nombre LIKE '%".$q."%' OR
            apellido LIKE '%".$q."%' OR
            departamento LIKE '%".$q."%' OR
            puesto LIKE '%".$q."%') AND status = '1' ORDER BY nomina LIMIT $offset,$resultadosPorPagina";

            $sql_conteo = "
            SELECT * FROM usuarios WHERE 
            (nomina LIKE '%".$q."%' OR
            nombre LIKE '%".$q."%' OR
            apellido LIKE '%".$q."%' OR
            departamento LIKE '%".$q."%' OR
            puesto LIKE '%".$q."%') AND status = '1' ORDER BY nomina";

            $conteo = $this->PDO->query($sql_conteo);
            $conteo_end = $conteo->rowCount();
            $total_pages = ceil($conteo_end/$resultadosPorPagina);

            $query = array();
            $query['query'] = $this->PDO->query($sql);
            $query['total_paginas'] = $total_pages;
            $query['depas'] = $this->array_depa();

            return $query;
        }



         public function show($id)
         {

            $mostrar=$this->PDO->prepare("SELECT * FROM usuarios WHERE id=:id LIMIT 1");
            $mostrar->bindParam(':id',$id);
            $mostrar->execute();

            return $mostrar->fetch();
        }

        public function update ($id,$nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion){

            $update=$this->PDO->prepare("UPDATE usuarios SET nombre= :nombre,apellido=:apellido,fechaNacimiento=:fechaNacimiento,lugarNacimiento=:lugarNacimiento,genero=:genero,nacionalidad=:nacionalidad,estadoCivil=:estadoCivil,rfc=:rfc,curp=:curp,numeroCartilla=:numeroCartilla,numeroTelefonico=:numeroTelefonico,correo=:correo,direccion=:direccion,municipio=:municipio,codigoPostal=:codigoPostal,empresa=:empresa,nss=:nss,nomina=:nomina,departamento=:departamento,puesto=:puesto,fechaContratacion=:fechaContratacion WHERE id=:id");
            $update->bindParam(':id',$id);
            $update->bindParam(':nombre',$nombre);
            $update->bindParam(':apellido',$apellido);
            $update->bindParam(':fechaNacimiento',$fechaNacimiento);
            $update->bindParam(':lugarNacimiento',$lugarNacimiento);
            $update->bindParam(':genero',$genero);
            $update->bindParam(':nacionalidad',$nacionalidad);
            $update->bindParam(':estadoCivil',$estadoCivil);
            $update->bindParam(':rfc',$rfc);
            $update->bindParam(':curp',$curp);
            $update->bindParam(':numeroCartilla',$numeroCartilla);
            $update->bindParam(':numeroTelefonico',$numeroTelefonico);
            $update->bindParam(':correo',$correo);
            $update->bindParam(':direccion',$direccion);
            $update->bindParam(':municipio',$municipio);
            $update->bindParam(':codigoPostal',$codigoPostal);
            $update->bindParam(':empresa',$empresa);
            $update->bindParam(':nss',$nss);
            $update->bindParam(':nomina',$nomina);
            $update->bindParam(':departamento',$departamento);
            $update->bindParam(':puesto',$puesto);
            $update->bindParam(':fechaContratacion',$fechaContratacion);
            $update->execute();
            return $id; 
            
            
        }
        

        
        public function delete($id){
            $delete = $this->PDO->prepare ("UPDATE usuarios SET status=:status  WHERE id = :id LIMIT 1");
            $delete->bindParam(':id',$id);
            $status=0;
            $delete->bindParam(':status',$status);
            $delete->execute();
            return true;
        }

        
        public function array_depa()
        {
            $depa_sql = "SELECT idDepartamento,nombreDepartamento FROM departamentos;";
            $result = $this->PDO->query($depa_sql);
            $array = array();
            $array[0] = '';
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            while($row_depa = $result->fetch())
            {
                $depa[$row_depa['idDepartamento']] = $row_depa['nombreDepartamento']; 
            }

            return $depa;
        }


       public function DataDepartamento()
       {
        $innner=$this->PDO->prepare("SELECT idDepartamento,nombreDepartamento  FROM departamentos;");
        $innner->execute();

        return $innner->fetchAll();

       }


        //////////////////

        // public function json_tabla()
        // {          
        //     $query = "SELECT id, Nomina, Nombre, Genero, Departamento, Puesto, Status FROM usuarios WHERE status = '1' ORDER BY nomina";
 
        //     $stmt = $this->PDO->prepare($query);
        //     $stmt->execute();

        //     $userData = array();
        //     while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        //     {
                  
        //     $userData['usuarios'][] = $row;
                 
        //     }

            
        //     return $userData;

        // }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
  
    }

    

?>