
<?php

include_once('Router.php');

$router = new Router;
/*start before rutes*/
//$router->before(function(){}); 
/* end before rutes*/





/*start modules products */ 
  $router->get('/products', function(){$this->controllerAdd('ProductsController', 'index', 201);});
/*end modules categories*/

  $router->get('/products/{aa}', function($aa){
     $this->controllerAdd('ProductsController', 'show', 201,['aa' => $aa]);
  });

  //$router->post('/products', function(){$this->controllerAdd('ProductsController', 'create', 201);});
  $router->put('/products', function(){$this->controllerAdd('ProductsController', 'update', 201);});
  $router->delete('/products', function(){$this->controllerAdd('ProductsController', 'delete', 201);});



/*    start en de rutas */
//$router->after(function(){echo"<br>despues de la ruta";});
/* end code final rutes*/ 

$router->notFound(function(){ echo json_encode("no se ha encontrado la pagina que esta buscando "); });

$router->run();