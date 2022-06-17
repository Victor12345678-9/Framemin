<?php
require_once "../../Config/routes/rutes.php"; 
require_once (CONEXION_PATH."conexion.php");

class UsersModel
{
    private $PDO;

    public function __construct()
    {
        $con = new db();
        $this->PDO=$con->conexion(); 

        require_once ("../../vendor/orm/Models.php");
        $this->MODELS = new Models();

        require_once ("../../vendor/orm/condiciones.php");
        $this->CONDICIONALES = new Condicionales();
        
    }



    public function index($page,$resultadosPorPagina)
    { 
        $offset = ($page - 1) * $resultadosPorPagina;
  
        $condicionales = new Condicionales();
        $condicionales->select(['id','nomina','nombre','apellido','genero','departamento','puesto'],'usuarios');
        $condicionales->where(['status=1']);
        $condicionales->limit($offset.','.$resultadosPorPagina);
        $sql = $condicionales->run();

        $condicionales_2 = new Condicionales();
        $condicionales_2->select_count(['status'],'usuarios');
        $condicionales_2->where(['status=1']);
        $sql_count = $condicionales_2->run();

        $sql_conteo = $sql_count;
        $conteo = $sql_conteo->fetch(PDO::FETCH_ASSOC);
        $conteo_end = $conteo['conteo'];

        $query = array();
        $query['query'] = $sql;
        $query['total_paginas'] = $conteo_end;

        
        $query['depas'] = $this->array_depa();
        return $query;
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

        $query['depas'] = $this->array_depa();

        return $query;
    }


    

    public function insert($nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion)
    {
        $condicionales = new Condicionales();
        $condicionales->insert(
        [
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
        ],'usuarios');
        $mostrar = $condicionales->run();
    }

    
    public function update($id,$nombre,$apellido,$fechaNacimiento,$lugarNacimiento,$genero,$nacionalidad,$estadoCivil,$rfc,$curp,$numeroCartilla,$numeroTelefonico,$correo,$direccion,$municipio,$codigoPostal,$empresa,$nss,$nomina,$departamento,$puesto,$fechaContratacion)
    {
        $condicionales = new Condicionales();
        $condicionales->update(
        [
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
        ],'usuarios');

        $condicionales->where(['id='.$id]);
        $condicionales->run();

        return $id; 
    }


    public function delete($id)
    {
        $condicionales = new Condicionales();
        $condicionales->update(['status' => '0'],'usuarios');
        $condicionales->where(['id='.$id]);
        $condicionales->run();
    }


    public function show($id)
    {

        $condicionales = new Condicionales();
        $condicionales->select(
        [
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
        ],'usuarios');
        $condicionales->where(['id='.$id]);
        $mostrar = $condicionales->run();

        return $mostrar->fetch();
    }



    





























    
////////////////////////////////////////////////////////////////////////////////////////////////////////////
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