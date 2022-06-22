<?php

require_once "../../Config/routes/rutes.php";


class UsersController{
    

    private $MODEL;

    public function __construct(){

        require_once (MODELS_PATH."usersModel.php");
        $this->MODEL = new UsersModel();

    }

    
////////////////////////////////////////////////////////////////////////
    public function consultaUsuarios($buscar,$page = 1,$resultadosPorPagina = 5)
    {

    
    if(!$buscar)
    {
        $query  = $this->MODEL->index($page,$resultadosPorPagina);
    }
    else
    {
        $query  = $this->grup_filtros($buscar,$page,$resultadosPorPagina);
    }


    
    if ($query['total_paginas'] > 0)
    {
        $tabla = '';
  
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
            <a style="margin:5px" href="'.HTTP_.ROOT_PATH_CORE.'/editUser/'.$row['id'].'/'.$page.'/'.$buscar.'"><i class="bx bx-pencil"></i></a>
            <a style="margin:5px" href="#" id="delete_user" data-id="'.$row['id'].'"><i class="bx bx-trash"></i></a>

            </td>
            </tr>';
        }
        
      
 
    }
    else 
    {
        $tabla = '<tr>
    
        <td colspan=7>
        No se encontraron coincidencias con sus criterios de búsqueda.
        
        
        </td>
    
    
    </tr>';
    
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

  
    public function updateUser($id,$nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion
    ,$page_buscar){

       $id=$this->MODEL->update($id,$nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion);

       return header('Location: '.HTTP_.ROOT_PATH_CORE.'/usersView'.'/'.$page_buscar);
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

    
    public function filtros($buscar,$page,$resultadosPorPagina)
    {
        $offset = ($page - 1) * $resultadosPorPagina;

        $condicionales = new Condicionales();
        $condicionales->like(['id','nomina','nombre','apellido','genero','departamento','puesto'],['nomina','nombre','apellido','puesto'],$buscar,'status=1','usuarios');
        $condicionales->limit($offset.','.$resultadosPorPagina);
        $sql = $condicionales->run();

        $condicionales_2 = new Condicionales();
        $condicionales_2->like_conteo(['status'],['nomina','nombre','apellido','puesto'],$buscar,'status=1','usuarios');
        $sql_count = $condicionales_2->run();

        $sql_conteo = $sql_count;
        $conteo = $sql_conteo->fetch(PDO::FETCH_ASSOC);
        $conteo_end = $conteo['conteo'];

        $query = array();
        $query['query'] = $sql;
        $query['total_paginas'] = $conteo_end;

        $query['depas'] = $this->depas();

        return $query;
    }

    
    public function grup_filtros($buscar,$page,$resultadosPorPagina)
    {
        $query  = $this->MODEL->filtros($buscar,$page,$resultadosPorPagina);

        return $query;
    }



    
}

?>