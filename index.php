
<?php

include_once('Router.php');
$router = new Router;
/*start before rutes*/
//$router->before(function(){}); 
/* end before rutes*/


  /*start modules products */ 
  $router->get('/products', function(){
    $this->controllerAdd('ProductsController', 'index', 200);
  });

  $router->get('/products/{idDepartamento}', function($idDepartamento){
     $this->controllerAdd('ProductsController', 'show', 200,['idDepartamento' => $idDepartamento]);
  });

  /*end modules products*/
  $router->post('/products', function(){
  
    $this->controllerAdd('ProductsController', 'create', 201,['post' => $_POST]);
  });

  $router->put('/products/{idDepartamento}', function($idDepartamento){$this->controllerAdd('ProductsController', 'update', 201,['idDepartamento' => $idDepartamento]);});

  $router->delete('html/products/{idDepartamento}', function($idDepartamento){$this->controllerAdd('ProductsController', 'delete', 201,['idDepartamento'=>$idDepartamento]);
  });

/*    start en de rutas */
//$router->after(function(){echo"<br>despues de la ruta";});
/* end code final rutes*/ 

$router->notFound(function(){ echo json_encode("no se ha encontrado la pagina que esta buscando "); });

$router->run();