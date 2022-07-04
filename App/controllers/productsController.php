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
        $this->orm->select(['code_dto','name_dto'],'departaments');
        $result = $this->orm->run();
        $result =$result->fetchAll();
        return $result;
    }

    public function show($params=[]){
        $code_dto=$params['id'];

        $this->orm->select(['code_dto','name_dto'],'departaments');
        $this->orm->where(['code_dto' , '=' , $code_dto]);
        $result = $this->orm->run();
        $result =$result->fetchAll();

        return $result;
    }
    public function delete($params=[]){
        $code_dto=$params['id'];
        
        $this->orm->delete(['code_dto','name_dto'],'departaments');
        $this->orm->where(['code_dto' , '=' , $code_dto]);
        $result = $this->orm->run();
        $result =$result->fetchAll();
        return $result;
    }

    public function create($params=[]){
       /*$required=["codigoDepartamento"];
        Val::required($required, $params);*/
        $this->orm->insert( $params['post'] ,'departaments');
        $result = $this->orm->run();
        return $result;
    }

    public function update($params=[]){ 
        $code_dto = $params['idDepartamento'];
         $this->orm->update($params['post'],'departamentos');
         $this->orm->where(['idDepartamento' , '=' , $code_dto]);
         $result = $this->orm->run();
        return "soy el update";

    }
    public function put($params=[]){ 

        return "soy el put";

    }
}

?>