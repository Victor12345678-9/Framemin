<!doctype html>
<html lang="en">




<?php

include_once "../../../Config/constant/rutes.php";
require_once (CONTROLLERS_PATH."usersController.php");

$obj= new UsersController();
$usuarios=$obj->show();
$departamentos=$obj->innerDep();






include_once (LAYOUT_PATH."head2.php");

?>



<?php

        include_once (CONEXION_PATH."conexion.php");
        $obj2 = new db();
        $con = $obj2 ->conexion();
        # Cuántos resultados mostrar por página
        $resultadosPorPagina = 5;
        // Por defecto es la página 1; pero si está presente en la URL, tomamos esa
        $pagina = 1;
        if (isset($_GET["pagina"])) {
            $pagina = $_GET["pagina"];
        }
        # El límite es el número de resultados por página
        $limit = $resultadosPorPagina;
        # El offset es saltar X resultados que viene dado por multiplicar la página - 1 * los resultados por página
        $offset = ($pagina - 1) * $resultadosPorPagina;
        # Necesitamos el conteo para saber cuántas páginas vamos a mostrar
        $sentencia = $con->query("SELECT count(*) AS conteo FROM usuarios WHERE status=1");
        $conteo = $sentencia->fetchObject()->conteo;
        # Para obtener las páginas dividimos el conteo entre los resultados por página, y redondeamos hacia arriba
        $paginas = ceil($conteo / $resultadosPorPagina);

        # Ahora obtenemos los resultados usando ya el OFFSET y el LIMIT
        $sentencia = $con->prepare("SELECT * FROM usuarios WHERE status=1 LIMIT $offset,$limit ");
        $sentencia->execute();
        $users = $sentencia->fetchAll(PDO::FETCH_OBJ);
        # Y más abajo los dibujamos...
 ?>





    <body>
        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" id="sa-basic">Click me</button>
                                                   

                                               
<button type="button" class="btn btn-primary btn-sm waves-effect waves-light" id="sa-title">Click me</button>
                                                      
 <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" id="sa-success">Click me</button>

    <?php  include_once (LAYOUT_PATH."header2.php");?>



                
    <div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box  align-items-center justify-content-start">
                    <h4 class="mb-sm-0 font-size-18">   Usuarios    </h4>
        

                     
               

                    <div class="row">
            <div class="col-lg-6">
                <!-- <div class="card"> -->
                   

                    <div class="card-body">
                        <div>
                            <a type="button"  class="btn btn-success waves-effect waves-light" href="addUser.php" class="text-center">Agregar Usuario</a>

                            <!-- sample modal content -->
          
                                           
        



                            
                                          
                                        </div>
                                       
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div> <!-- end preview-->

                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col -->
                    <!-- <div class="card-body"> -->

                        <div class="table-responsive">
                           


                        <table class="table table-bordered dt-responsive  nowrap w-100" >
                                        <thead>
                                            <tr>
                                            <th> Nomina</th> 
                                            <th> Nombre</th> 
                                            <th> Genero</th> 
                                            <th> Departamento</th> 
                                            <th> Puesto</th> 
                                            <th> RFC</th>
                                            <th> Status</th>
                                       
                                           
                                            
                                            <th WIDTH="10%" > Acciones</th>

                                            </tr>

                                            </thead>

                                            <tbody> 

                                            <?php if($users):?>
                                            
                                               
                                                <?php foreach ($users as $usuario ) { 
                                                  
                                                    ?>
                                                    
                                                <tr>
                                                    <td><?php echo $usuario->nomina ?></td>
                                                    <td><?php echo $usuario->nombre." ".$usuario->apellido ?></td>
                                                    <td><?php echo $usuario->genero ?></td>
                                                    <td><?php echo ($departamentos[$usuario->departamento-1]['nombreDepartamento'])?></td>
                                                    <td><?php echo $usuario->puesto ?></td>
                                                    <td><?php echo $usuario->rfc ?></td>

                                                    <?php if($usuario->status==1){ ?>
                                                    <td><?php echo 'Activo' ?></td> <?php }?>
                                         
                                                    <td>
                                                  <center>
                                                      
                                               
                                                    <a  href = "deleteUser.php?id=<?php echo $usuario->id?>" onclick="confirmation()"><i class="bx bx-trash"></i></a>    
                                                <a style ="float:left" href = "editUser.php?id=<?php echo $usuario->id?>"><i class="bx bx-pencil"></i></a></center> 
                                                
                                                  </td>
                                                </tr>
                                            <?php } ?>

                                            <?php else:?>

                                         
                                         
                                              <tr><td colspan="7" style="color:salmon " >No Hay Registros Actuales</td></tr>
                                            <?php endif;?>


                                                    

                                            </tbody>

                                        
                                        </table>


                                        <div class="row">
                <div class="col-xs-12 col-sm-6">
                 <?php if ($conteo>0){?>
                    
                    <p style="color:red">Mostrando  1 a <?php echo $resultadosPorPagina ?> de <?php echo $conteo ?> registros</p> <?php }?>
                    </div>
                <div class="col-xs-12 col-sm-6" style="color:green">
                    <?php if ($paginas>0){?>

                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p> <?php }?>
                    
                </div>
            </div>
            <ul class="pagination">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li>
                    <a href="./usersView.php?pagina=<?php echo $pagina - 1 ?>">
                        <span aria-hidden="true"><button type="button" style="margin: 1px" class="btn btn-soft-dark waves-effect waves-light"><</button></span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="<?php if ($x == $pagina) echo "active" ?>">
                      
                        
                        <a  type="button" style="margin: 1px" class="btn btn-soft-dark waves-effect waves-light"  href="./usersView.php?pagina=<?php echo $x ?>">
                        <span></span>
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a href="./usersView.php?pagina=<?php echo $pagina + 1 ?>">
                        <span aria-hidden="true"><button type="button" style="margin: 1px" class="btn btn-soft-dark waves-effect waves-light">></button></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
                                       
                                       
                                                            


                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

    

<script type="text/javascript">
     function confirmation() 
     {
        if(confirm("Desea seguir?"))
	{
       
	   return true;
	}
	else
	{
	   return false;
	}
     }
    </script>


    
    <?php   include_once (LAYOUT_PATH."footer2.php")  ?>



    </body>


</html>