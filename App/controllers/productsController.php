<?php

include_once($_SERVER['DOCUMENT_ROOT'] .'/lindesk/vendor/orm/Orm.php');
include_once($_SERVER['DOCUMENT_ROOT'] .'/lindesk/app/middlewares/Val.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/lindesk/vendor/orm/Bd.php');
/*fills = id,code_dto, name_dto, status_dto, numemple_dto, create_tsmp, update_tsmp	
* Table = departaments
*/

class ProductsController
{
    private $orm;

    public function __construct(){
        $this->orm = new Orm();
        $con = new db();
        $this->bd = $con->conexion();
    }   

    public function index($params=[]){
       
        try{
            $this->orm->select(['idDepartamento','codigoDepartamento','nombreDepartamento','description_dp'],'departamentos');
            $result = $this->orm->run();
            $result = $result->fetchAll();
        }catch (Exception $e){
            $result=json_encode(['msgBackend'=>"no se ha podido realizar tu consulta con exito",$e]);
        }
        return $result;
        
    }

    public function show($params=[]){
        
        try{
            $idDepartamento=($params['idDepartamento']);
            $this->orm->select(['codigoDepartamento','nombreDepartamento'],'departamentos');
            $this->orm->where(['idDepartamento' , '=' , $idDepartamento]);
            $result = $this->orm->run();
            $result =$result->fetchAll();
        }catch (Exception $e){
            $result = json_encode(['msgBackend'=>"no se ha podido realizar tu consulta con exito",$e]);
        }
        return $result;
    }


    public function create($params=[]){

            $name_dto = $_POST['nombreDepartamento'];
            $code_dto = $_POST['codigoDepartamento'];
            $desc_dto = $_POST['description_dp'];
        try{
            $this->orm->insert([
                                'nombreDepartamento'=> $name_dto,
                                'codigoDepartamento'=> $code_dto,
                                'description_dp'=> $desc_dto],
                                'departamentos');
            $result = $this->orm->run();
        }catch (Exception $e){
            $result = json_encode(['msgBackend'=>"no se ha podido realizar tu consulta con exito",$e]);
        }
        return $result;
    }

    public function update($params=[]){
    
 
        parse_str(file_get_contents("php://input"),$parameter);
        $idDepartamento=$params['idDepartamento'];
        $nombreDepartamento=$parameter['nombreDepartamento'];
        $description_dp = $parameter['description_dp'];

        print_r($idDepartamento);
        print_r($nombreDepartamento);
        print_r($description_dp);

        // try{

        //   $this->orm->update(['nombreDepartamento'=> $nombreDepartamento,'description_dp'=> $description_dp],'departamentos');
        //   $this->orm->where(['idDepartamento' , '=' , $idDepartamento]);
        //   $result = $this->orm->run();

        // }catch (Exception $e){
        //     $result = json_encode(['msgBackend'=>"no se ha podido realizar tu consulta con exito",$e]);
        // }
        // return $result;

    }

    public function delete($params=[]){
        try{
                
                if($params==''){

                     parse_str(file_get_contents("php://input"),$parameter);
                    $id = $parameter['idDepartamento'];
                }else{
                    $idDepartamento=$params['idDepartamento'];
                }
           
           $this->orm->delete([''],'departamentos');
        $this->orm->where(['idDepartamento' , '=' , $idDepartamento]);
           
            $result = $this->orm->run();

        }catch (Exception $e){
            $result = json_encode(['msgBackend'=>"no se ha podido realizar tu consulta con exito",$e]);
        }
        
        return $result;
    }
}

?>