<?php 

ruta('/', function () {
    include ("./Public/views/usuarios/usersView.php");
});


ruta('/showUser/{id}/?', function($id){
    $_GET['id'] = $id;
    if(is_numeric($_GET['id']))
    {
        include ("./Public/views/usuarios/showUser.php");
    }
    else
    {
        error_page();
    }
});
  
ruta('/usersView', function() {
    include ("./Public/views/usuarios/usersView.php");
});

ruta('/productos/{id}/?', function($id) {

    include ("./App/controllers/productsController.php");

    $_GET['id'] = $id;
    
    include ("./Public/views/productos/productos.php");



});


// ruta('/productos/{id}/?',function($id){
//     $route = new Route;
//     $route -> retornoRutas('productos/productos','productsController::index')
// })


ruta('/indexP', function() {
    include ("./Public/index.php");
});

ruta('/usersView/{pagina}/?', function($pagina) {
    $_GET['pagina'] = $pagina;
    if(is_numeric($_GET['pagina']))
    {
        include ("./Public/views/usuarios/usersView.php");
    }
    else
    {
        error_page();
    }
});

ruta('/editUser/{id}/?', function($id) {
    $_GET['id'] = $id;
    if(is_numeric($_GET['id']))
    {
        include ("./Public/views/usuarios/editUser.php");
    }
    else
    {
        error_page();
    }
});

ruta('/updateUser', function() {
    include ("./Public/views/usuarios/updateUser.php");
});

ruta('/deleteUser/{id}/?', function($id) {
    $_GET['id'] = $id;
    if(is_numeric($_GET['id']))
    {
        include ("./Public/views/usuarios/deleteUser.php");
    }
    else
    {
        error_page();
    }
});

ruta('/addUser', function() {
    include ("./Public/views/usuarios/addUser.php");
});

ruta('/insertUser', function() {
    include ("./Public/views/usuarios/insertUser.php");
}); 

?>