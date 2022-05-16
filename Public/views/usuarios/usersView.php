<!doctype html>
<html lang="en">
<?php

include_once "./Config/constant/rutes.php";
require_once ("./App/controllers/usersController.php");

$obj= new UsersController();
$depas = $obj->depas();

////
$array = array();
$array[0] = '';
foreach($depas as $index => $value)
{
    $array[] = $value[1]; 
}
////



include_once (LAYOUT_PATH."head2.php");

?>



<?php

        
        # Cuántos resultados mostrar por página
        $resultadosPorPagina = 5 ;
        // Por defecto es la página 1; pero si está presente en la URL, tomamos esa
        $pagina = 1;
        if (isset($_GET["pagina"]) && is_numeric($_GET['pagina'])) {
            $pagina = $_GET["pagina"];
        }


        $data = $obj->ver_paginas($pagina,'usuarios',$resultadosPorPagina,'usersView');

        $conteo = $data['conteo'];
        $paginas =  $data['paginas'];
        $users = $data['users'];  
        $tabla = $data['tabla'];
 ?>

    <body>

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
                            <a type="button"  class="btn btn-success waves-effect waves-light" href="/addUser" class="text-center">Agregar Usuario</a>

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
                                                    <td><?php if(isset($array[$usuario->departamento])){echo $array[$usuario->departamento];}else{echo '-';} ?></td> 
                                                    <td><?php echo $usuario->puesto ?></td>
                                                    <td><?php echo $usuario->rfc ?></td>

                                                    <?php if($usuario->status==1){ ?>
                                                    <td><?php echo 'Activo' ?></td> <?php }?>
                                         
                                                    <td>
                                                  
                                                   
                   
                                                <a style="margin:5px" href = "<?php echo HTTP_.ROOT_PATH_CORE; ?>/showUser/<?php echo $usuario->id?>"  ><i  class="bx bx-show"></i></a>
                                                <a style="margin:5px" href = "<?php echo HTTP_.ROOT_PATH_CORE; ?>/editUser/<?php echo $usuario->id?>"><i class="bx bx-pencil"></i></a>
                                                <a style="margin:5px" href = "<?php echo HTTP_.ROOT_PATH_CORE; ?>/deleteUser/<?php echo $usuario->id?>" onclick="confirmation()"><i class="bx bx-trash"></i></a>    
                                                
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
 <?php echo $tabla; ?>
</ul>




</div>
                                       
 
                                </div><!-- end card -->
                                                            


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