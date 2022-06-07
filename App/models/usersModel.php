<?php
require_once "./Config/constant/rutes.php";    
require_once (CONEXION_PATH."conexion.php");
require_once (MODELS_PATH."Models.php");

class UsersModel
{
    private $PDO;

    public function __construct()
    {
        $con = new db();
        $this->PDO=$con->conexion(); 
        $this->MODELS = new Models();
    }



    public function index($page,$params,$resultadosPorPagina,$table,$where)
    { 
        $query = $this->MODELS->indexGeneric($page,$params,$resultadosPorPagina,$table,$where);
        $query['depas'] = $this->array_depa();

        return $query;
    }


    public function filtros($buscar,$page,$resultadosPorPagina)
    {
        $array_busqueda = array(
        'nomina','nombre','apellido','puesto'
        );
        $query = $this->MODELS->filtrosGeneric($buscar,$page,$resultadosPorPagina,'usuarios',$array_busqueda);
        $query['depas'] = $this->array_depa();

        return $query;
    }


    

    public function insert($nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion)
    {
        $datos = 
        array(
            'nombre'               => $nombre,
            'apellido'             => $apellido,
            'fechaNacimiento'      => $fechaNacimiento,
            'lugarNacimiento'      => $lugarNacimiento,
            'genero'               => $genero,
            'nacionalidad'         => $nacionalidad,
            'estadoCivil'          => $estadoCivil,
            'rfc'                  => $rfc,
            'curp'                 => $curp,
            'numeroCartilla'       => $numeroCartilla,
            'numeroTelefonico'     => $numeroTelefonico,
            'correo'               => $correo,
            'direccion'            => $direccion,
            'municipio'            => $municipio,
            'codigoPostal'         => $codigoPostal,
            'empresa'              => $empresa,
            'nss'                  => $nss,
            'nomina'               => $nomina,
            'departamento'         => $departamento,
            'puesto'               => $puesto,
            'fechaContratacion'    => $fechaContratacion,
            'status'               => 1
        );
        $insertar =  $this->MODELS->insertGeneric('usuarios', $datos);

        return $insertar;
    }

    
    public function update($id,$nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion)
    {
        $datos = 
        array(
            'nombre'                => $nombre,
            'apellido'              => $apellido,
            'fechaNacimiento'       => $fechaNacimiento,
            'lugarNacimiento'       => $lugarNacimiento,
            'genero'                => $genero,
            'nacionalidad'          => $nacionalidad,
            'estadoCivil'           => $estadoCivil,
            'rfc'                   => $rfc,
            'curp'                  => $curp,
            'numeroCartilla'        => $numeroCartilla,
            'numeroTelefonico'      => $numeroTelefonico,
            'correo'                => $correo,
            'direccion'             => $direccion,
            'municipio'             => $municipio,
            'codigoPostal'          => $codigoPostal,
            'empresa'               => $empresa,
            'nss'                   => $nss,
            'nomina'                => $nomina,
            'departamento'          => $departamento,
            'puesto'                => $puesto,
            'fechaContratacion'     => $fechaContratacion
        );
        $this->MODELS->update_global('usuarios', $datos, 'id', $id);

        return $id; 
    }




    public function delete($id)
    {
        $datos = 
        array(
            'status'    => 0
        );
        $this->MODELS->update_global('usuarios', $datos,'id', $id);

        return true;
    }


    public function show($id)
    {

        $where = 'id = '.$id;
        $datos = 
        array(
            'id',
            'nombre',
            'fechaNacimiento',
            'apellido',
            'departamento',
            'puesto',
            'correo',
            'genero',
            'lugarNacimiento',
            'nacionalidad',
            'estadoCivil',
            'rfc',
            'curp',
            'numeroTelefonico',
            'direccion',
            'municipio',
            'codigoPostal',
            'empresa',
            'nss',
            'nomina',
            'fechaContratacion'
            //'*'
        );
        $mostrar = $this->MODELS->select_('usuarios', $datos, $where);

        return $mostrar->fetch();
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
  

}



?>