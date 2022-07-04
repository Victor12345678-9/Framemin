
<?php

include_once('Router.php');

$router = new Router;
/*start before rutes*/
//$router->before(function(){}); 
/* end before rutes*/





/*start modules products */ 
$router->put('/products', function(){$this->controllerAdd('ProductsController', 'index', 201);});
/*end modules categories*/




/*    start en de rutas */
//$router->after(function(){echo"<br>despues de la ruta";});
/* end code final rutes*/ 

$router->notFound(function(){ echo json_encode("no se ha encontrado la pagina que esta buscando "); });

$router->run();