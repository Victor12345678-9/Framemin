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


        
        public function insert($nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$edad,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion){

		      $insertar = $this->PDO->prepare("INSERT INTO usuarios VALUES(null,:nombre,:apellido,:fechaNacimiento,:lugarNacimiento,:edad,:genero,:nacionalidad,:estadoCivil,:rfc,:curp,:numeroCartilla,:numeroTelefonico,:correo,:direccion,:municipio,:codigoPostal,:empresa,:nss,:nomina,:departamento,:puesto,:fechaContratacion,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
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

        public function update ($id,$nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$edad,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion){

            $update=$this->PDO->prepare("UPDATE usuarios SET nombre= :nombre,apellido=:apellido,fechaNacimiento=:fechaNacimiento,lugarNacimiento=:lugarNacimiento,edad=:edad,genero=:genero,nacionalidad=:nacionalidad,estadoCivil=:estadoCivil,rfc=:rfc,curp=:curp,numeroCartilla=:numeroCartilla,numeroTelefonico=:numeroTelefonico,correo=:correo,direccion=:direccion,municipio=:municipio,codigoPostal=:codigoPostal,empresa=:empresa,nss=:nss,nomina=:nomina,departamento=:departamento,puesto=:puesto,fechaContratacion=:fechaContratacion WHERE id=:id");
            $update->bindParam(':id',$id);
            $update->bindParam(':nombre',$nombre);
            $update->bindParam(':apellido',$apellido);
            $update->bindParam(':fechaNacimiento',$fechaNacimiento);
            $update->bindParam(':lugarNacimiento',$lugarNacimiento);
            $update->bindParam(':edad',$edad);
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

   
       public function verDepartamentos (){

            $departamentos=$this->PDO->prepare('SELECT * FROM departamentos');
            $departamentos->execute();
            return $departamentos->fetchAll();

       }

       public function joinDepartamento(){
        $innner=$this->PDO->prepare("SELECT usuarios.departamento,departamentos.nombreDepartamento  FROM usuarios, departamentos WHERE usuarios.departamento = departamentos.idDepartamento;");
        $innner->execute();

        return $innner->fetchAll();

       }

   ////// 
       public function DataDepartamento()
       {
        $innner=$this->PDO->prepare("SELECT idDepartamento,nombreDepartamento  FROM departamentos;");
        $innner->execute();

        return $innner->fetchAll();

       }

       public function page_nav($pagina, $table, $resultadosPorPagina,$View)
       {
                if(is_numeric($pagina))
                {
                    $data = array();
                    # El límite es el número de resultados por página
                    $limit = $resultadosPorPagina;
                    # El offset es saltar X resultados que viene dado por multiplicar la página - 1 * los resultados por página
                    $offset = ($pagina - 1) * $resultadosPorPagina;
                    # Necesitamos el conteo para saber cuántas páginas vamos a mostrar
                    
                    $sentencia = $this->PDO->query("SELECT count(*) AS conteo FROM $table WHERE status=1");
                    $conteo = $sentencia->fetchObject()->conteo;
                    # Para obtener las páginas dividimos el conteo entre los resultados por página, y redondeamos hacia arriba
                    $paginas = ceil($conteo / $resultadosPorPagina);
                   
                  
                    # Ahora obtenemos los resultados usando ya el OFFSET y el LIMIT
                    $sentencia = $this->PDO->prepare("SELECT * FROM $table WHERE status=1 LIMIT $offset,$limit ");
                    $sentencia->execute();
                    $users = $sentencia->fetchAll(PDO::FETCH_OBJ);
                    # Y más abajo los dibujamos...
                    
                    $data['conteo'] = $conteo;
                    $data['paginas'] = $paginas;
                    $data['users'] = $users;   
                    
                    $tabla = '';

                    
                    if ($pagina > 1) { 
                    
                    $tabla .= '
                    <li>
                    <a href="./'.$View.'.php?pagina='.($pagina - 1).'">
                    <span aria-hidden="true"><button type="button" style="margin: 1px" class="btn btn-soft-dark waves-effect waves-light"><</button></span>
                    </a>
                    </li>';
                    }
        
                    $tabla .= '
                    <ul class="nav nav-pills">
                    <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                    ';

                    for ($x = 1; $x <= $paginas; $x++) 
                    { 
                        $active = '';
                        if($x == $pagina)
                        {
                            $active = "nav-link active";
                        }
        
                        $tabla .= '
                        <li class="nav-item">
                        <a style="margin:1px;" class="'.$active.' btn btn-soft-dark waves-effect waves-light"  href="./'.$View.'.php?pagina='.$x.'">
                        <span></span>
                        '.$x.'</a>
                        </li>';
                    } 
              
                    $tabla .= '</ul>';
        
                    $tabla .= '
                    <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                    ';
                    
                    if ($pagina < $paginas) 
                    {
                    $tabla .= '
                    <li>
                    <a href="./'.$View.'.php?pagina='.($pagina + 1).'">
                    <span aria-hidden="true"><button type="button" style="margin: 1px" class="btn btn-soft-dark waves-effect waves-light">></button></span>
                    </a>
                    </li>';
                    }

                    $data['tabla'] = $tabla;

                }
    
                return $data;
               // return $page;
       }
   /////// 

       
  
    }

    

?>