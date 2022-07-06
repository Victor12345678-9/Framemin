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
        $this->orm->select(['codigoDepartamento','nombredepartamento'],'departamentos');
        $result = $this->orm->run();
        $result =$result->fetchAll();
        return $result;
    }

    public function show($params=[]){
        $code_dto=($params['aa']);

          $this->orm->select(['codigoDepartamento','nombredepartamento'],'departamentos');
          $this->orm->where(['codigoDepartamento' , '=' , $code_dto]);
          $result = $this->orm->run();
          $result =$result->fetchAll();

         return  $result;
    }
    public function delete($params=[]){
         parse_str(file_get_contents("php://input"),$params);
        
         $code_dto=$params['idDepartamento'];
        
         $this->orm->delete(['codigoDepartamento','nombreDepartamento'],'departamentos');
         $this->orm->where(['idDepartamento' , '=' , $code_dto]);
         $result = $this->orm->run();
       
         return $result;
    }

    public function create($params=[]){
       /*$required=["codigoDepartamento"];
        Val::required($required, $params);*/
        

            $nombreDepartamento = $_POST['nombreDepartamento'];
            $codigoDepartamento = $_POST['codigoDepartamento'];

            
          $this->orm->insert(['nombreDepartamento'=> $nombreDepartamento,'codigoDepartamento'=> $codigoDepartamento],'departamentos');
          
           $result = $this->orm->run();
          return $result;
    }

    public function update($params=[]){ 
        parse_str(file_get_contents("php://input"),$params);
        
        $idDepartamento=$params['idDepartamento'];
        $nombreDepartamento=$params['nombreDepartamento'];

       
          $this->orm->update(['nombreDepartamento'=> $nombreDepartamento],'departamentos');
          $this->orm->where(['idDepartamento' , '=' , $idDepartamento]);
          $result = $this->orm->run();
          
         return $result;

    }
    public function put($params=[]){ 

        return "soy el put";

    }
}

?>