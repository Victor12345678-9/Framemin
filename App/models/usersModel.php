<?php

require_once "./Config/constant/rutes.php";    

    class UsersModel{
        private $PDO;
      
        public function __construct(){
        
            require_once (CONEXION_PATH."conexion.php");
            $con = new db();
            $this->PDO=$con->conexion();
        }

        
    
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

 


      public function DataDepartamento()
      {
       $innner=$this->PDO->prepare("SELECT idDepartamento,nombreDepartamento  FROM departamentos;");
       $innner->execute();

       return $innner->fetchAll();

      }



//////
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


    

public function tabla_consulta($tabla_sql,$filtros,$page) //hacer metodo filtro, quitar if el if puede ir en el controller 
{          

    
    $resultadosPorPagina = 5; //La cantidad de registros que desea mostrar por pagina
    $offset = ($page - 1) * $resultadosPorPagina;


        $q = $filtros;
        $sql = " 
        SELECT * FROM ".$tabla_sql." WHERE status='1' AND
        (nomina LIKE '%".$q."%' OR
        nombre LIKE '%".$q."%' OR
        apellido LIKE '%".$q."%' OR
        genero LIKE '%".$q."%' OR
        puesto LIKE '%".$q."%') LIMIT $offset,$resultadosPorPagina

                
        ";

        $query = $this->PDO->query($sql);
    
        
        //Consulta Conteo
        $sql_conteo = "SELECT * FROM ".$tabla_sql."  WHERE  status='1' AND
        (nomina LIKE '%".$q."%' OR
        nombre LIKE '%".$q."%' OR
        apellido LIKE '%".$q."%' OR
        genero LIKE '%".$q."%' OR
        puesto LIKE '%".$q."%')";

        $conteo = $this->PDO->query($sql_conteo);

        return $conteo;
    }


        public function tabla_default($offset,$resultadosPorPagina,$tabla_sql){

        $sql = "SELECT * FROM ".$tabla_sql." WHERE status = '1'  LIMIT $offset,$resultadosPorPagina";
        $query = $this->PDO->query($sql);
        

        $sql_conteo = "SELECT * FROM ".$tabla_sql." WHERE status = '1' ";
        $conteo = $this->PDO->query($sql_conteo);


            return $conteo;
        }
        
    public function conteo($conteo,$resultadosPorPagina,$query){

    $conteo_final = $conteo->rowCount();
    $total_pages = ceil($conteo_final/$resultadosPorPagina);

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $depa = $this->array_depa();

    
    
        return $depa;

}
    

      
public function paginacion($pagina, $paginas, $q = '')
{

    $tabla = '';


    if ($pagina > 1)
    { 
        $tabla .= '
        <li>
        <a href="javascript:void(0);" onclick="obtener_registros('.($pagina - 1).',\''.$q.'\')">
        <span aria-hidden="true"><button type="button" style="margin: 1px" class="btn btn-soft-dark waves-effect waves-light"><</button></span>
        </a>
        </li>';
    }

    $tabla .= '<ul class="nav nav-pills">';

    for($x = 1; $x <= $paginas; $x++) 
    { 
        $active = '';
        if($x == $pagina)
        {
            $active = "nav-link active";
        }

        $tabla .= '
        <li class="nav-item">
        <a style="margin:1px;" class="'.$active.' btn btn-soft-dark waves-effect waves-light" href="javascript:void(0);" onclick="obtener_registros('.$x.')">
        <span></span>
        '.$x.'</a>
        </li>';
    } 
    //////////////
    $tabla .= '</ul>';

    if($pagina < $paginas) 
    {
        $tabla .= '
        <li>
        <a href="javascript:void(0);" onclick="obtener_registros('.($pagina + 1).')">
        <span aria-hidden="true"><button type="button" style="margin: 1px" class="btn btn-soft-dark waves-effect waves-light">></button></span>
        </a>
        </li>';
    }

    return $tabla;
}
       
  
    }

    

?>