<?php

require_once "./Config/constant/rutes.php";


class UsersController{
    

    private $MODEL;

    public function __construct(){

        require_once (MODELS_PATH."usersModel.php");
        $this->MODEL = new UsersModel();

    }


   
    public function insertUser($nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion){
        
        $id=$this->MODEL->insert($nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion);
        

      

    //  return header('Location: '.HTTP_.ROOT_PATH_CORE.'/usersView');
    }


     public function showUser($id){
         return $this->MODEL->show($id);

    }

  
    public function updateUser($id,$nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion){

       $id=$this->MODEL->update($id,$nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion);
       
       return header('Location: '.HTTP_.ROOT_PATH_CORE.'/usersView/_');
    }

    public function destroyUser($id){
        $this->MODEL->delete($id);

        return header('Location: '.HTTP_.ROOT_PATH_CORE.'/usersView');
    }

    public function showDepartamentos(){
      
        return $this->MODEL->DataDepartamento(); 

    }


//////
    public function depas()
    {

        return $this->MODEL->DataDepartamento();
    }

    public function tabla_consulta($tabla_sql,$filtros,$page)
    {

        if($filtros){

            $tabla_consulta = $this->MODEL->tabla_consulta($tabla_sql,$filtros,$page); 

        }else{

            $tabla_default= $this->MODEL->tabla_default($tabla_sql,$filtros,$page);

            }
        
       $tabla='';
          


        if ($conteo_final > 0) //controller retornar $conteo_final 
    {
        $tabla .= '<table class="table table-bordered">
        <thead>
        <tr>
        <th> Nomina</th>
        <th> Nombre</th>
        <th> Genero</th>
        <th> Departamento</th>
        <th> Puesto</th>
        <th> Status</th>
        <th WIDTH="10%"> Acciones</th>
        </tr>
        </thead>
        <tbody>';

        while($row = $query->fetch())
        {

            $tabla .= '<tr>
            <td>'.$row['nomina'].'</td>
            <td>'.$row['nombre'].' '.$row['apellido'].'</td>
            <td>'.$row['genero'].'</td>
            <td>'.$depa[$row['departamento']].'</td>
            <td>'.$row['puesto'].'</td>
            <td>Activo</td>	
            <td>

            <a style="margin:5px" href="'.HTTP_.ROOT_PATH_CORE.'/showUser/'.$row['id'].'"><i class="bx bx-show"></i></a>
            <a style="margin:5px" href="'.HTTP_.ROOT_PATH_CORE.'/editUser/'.$row['id'].'"><i class="bx bx-pencil"></i></a>
            <a style="margin:5px" href="#" id="delete_user" data-id="'.$row['id'].'"><i class="bx bx-trash"></i></a>

            </td>
            </tr>';
        }

        $tabla .= '</tbody></table>
        <ul class="pagination">'.$this->paginacion($page, $total_pages, $_POST['usuarios']).'</ul>';
    }
    else 
    {
       $tabla = "No se encontraron coincidencias con sus criterios de búsqueda.";
    }













        return json_encode($tabla_consulta);
    }
 

}


?>