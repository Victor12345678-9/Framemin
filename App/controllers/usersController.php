<?php

require_once "./Config/constant/rutes.php";


class UsersController{
    

    private $MODEL;

    public function __construct(){

        require_once (MODELS_PATH."usersModel.php");
        $this->MODEL = new UsersModel();

    }

   
   
////////////////////////////////////////////////////////////////////////
public function consultaUsuarios($buscar,$page=1)
{
    $resultadosPorPagina = 5;

    
    if($buscar)
    {
        $query  = $this->MODEL->filtros($buscar,$page,$resultadosPorPagina);
    }
    else
    {
        $query  = $this->MODEL->index($page,$resultadosPorPagina);
    }

    
    if ($query['total_paginas'] > 0)
    {
        $tabla = '';
        $tabla .= '';

        while($row = $query['query']->fetch())
        {

            $tabla .= '<tr>
            <td>'.$row['nomina'].'</td>
            <td>'.$row['nombre'].' '.$row['apellido'].'</td>
            <td>'.$row['genero'].'</td>
            <td>'.$query['depas'][$row['departamento']].'</td>
            <td>'.$row['puesto'].'</td>
            <td>Activo</td>	
            <td>

            <a style="margin:5px" href="'.HTTP_.ROOT_PATH_CORE.'/showUser/'.$row['id'].'"><i class="bx bx-show"></i></a>
            <a style="margin:5px" href="'.HTTP_.ROOT_PATH_CORE.'/editUser/'.$row['id'].'"><i class="bx bx-pencil"></i></a>
            <a style="margin:5px" href="#" id="delete_user" data-id="'.$row['id'].'"><i class="bx bx-trash"></i></a>

            </td>
            </tr>';
        }
        
      
 
    }
    else 
    {
    $tabla ='<tr>
    <td colspan=7>
    
    No se encontraron coincidencias con sus criterios de búsqueda.
    </td>
    
    
    </tr>
  ';
    }
    $obj2 = new Helpers();
    
    $total_pages = ceil($query['total_paginas']/$resultadosPorPagina);

    $paginacion = $obj2->paginacion($page, $total_pages, $buscar);
    $dato = array();
    $dato['tabla'][] = $tabla;
    $dato['paginacion'][] = $paginacion; 

    return json_encode($dato);
}

    // public function json_tabla()
    // {

    //     $json_tabla = $this->MODEL->json_tabla(); 

    //     return json_encode($json_tabla);
    // }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
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

  

    public function depas()
    {

        return $this->MODEL->DataDepartamento();
    }


    
}

?>