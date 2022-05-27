<?php

require_once "./Config/constant/rutes.php";


class UsersController{
    

    private $MODEL;

    public function __construct(){

        require_once (MODELS_PATH."usersModel.php");
        $this->MODEL = new UsersModel();

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

            if($pagina == $x)
            {
                $tabla .= '
                <li class="nav-item">
                <a style="margin:1px;" class="'.$active.' btn btn-soft-dark waves-effect waves-light" href="javascript:void(0);" onclick="obtener_registros('.$x.',\''.$q.'\')">
                <span></span>
                '.$x.'</a>
                </li>';
            }
            else
            {
                $tabla .= '
                <li class="nav-item">
                <a style="margin:1px;" class="'.$active.' btn btn-soft-dark waves-effect waves-light" href="javascript:void(0);" onclick="obtener_registros('.$x.',\''.$q.'\')">
                <span></span>
                '.$x.'</a>
                </li>';
            }
        }


       

        if($pagina < $paginas) 
        {
            $tabla .= '
            <li>
            <a href="javascript:void(0);" onclick="obtener_registros('.($pagina + 1).',\''.$q.'\')">
            <span aria-hidden="true"><button type="button" style="margin: 1px" class="btn btn-soft-dark waves-effect waves-light">></button></span>
            </a>
            </li>';
        }

        return $tabla;
    }
////////////////////////////////////////////////////////////////////////
    public function tabla_consulta_usuarios($buscar,$page)
    {
        $resultadosPorPagina = 7;
        if($buscar)
        {
            $query  = $this->MODEL->tabla_consulta_usuarios_sql_con_buscar($buscar,$page,$resultadosPorPagina);
        }
        else
        {
            $query  = $this->MODEL->tabla_consulta_usuarios_sql_sin_buscar($page,$resultadosPorPagina);
        }
        

        $tabla = '';
        $tabla .= '<table class="table table-bordered">';
        
        if ($query['total_paginas'] > 0)
        {
            
           

            while($row = $query['query']->fetch())
            {

                $tabla .= '
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
                ';
            }

            $tabla .= '</table>
            <ul class="pagination">'.$this->paginacion($page, $query['total_paginas'], $buscar).'</ul>';
        }
        else 
        {

            $tabla = '';
            // $tabla .= '<table class="table table-bordered">';
              
        $tabla .= "<tr> <td colspan=7>  No se encontraron coincidencias con sus criterios de búsqueda.</tr></td>";

        $tabla .= '</table>';
        }
        

        return json_encode($tabla);
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