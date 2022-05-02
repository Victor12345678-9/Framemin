<!doctype html>
<html lang="en">

<?php

include_once "../../../Config/constant/rutes.php";
require_once (CONTROLLERS_PATH."usersController.php");
$obj= new UsersController();
$usuarios=$obj->show();



include_once (LAYOUT_PATH."head2.php");

?>

    <body>
        

    <?php  include_once (LAYOUT_PATH."header2.php");?>



                
    <div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box  align-items-center justify-content-start">
                    <h4 class="mb-sm-0 font-size-18">   Usuarios</h4>

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
                    <div class="card-body">

                        <div class="table-responsive">
                           


                        <table class="table table-bordered dt-responsive  nowrap w-100" >
                                        <thead>
                                            <tr>
                                            <th> Nomina</th>     
                                            <th> Nombre</th> 
                                            <th> Apellido</th> 
                                            <th WIDTH="30%"> Correo</th>
                                            <th WIDTH="10%" > Acciones</th>

                                            </tr>

                                            </thead>

                                            <tbody> 

                                            <?php if($usuarios):?>
                                            
                                                <?php foreach ($usuarios as $row => $link): ?>
                                              
                                              <tr>
                                                 
                                              
                                              
                                                  <td data-field="nomina"><?php echo  $link['nomina']; ?></td >
                                                  <td data-field="nombre"><?php echo  $link['nombre']; ?></td >
                                                  <td data-field="apellido"><?php echo  $link['apellido']; ?></td>
                                                  <td data-field="correo"><?php echo  $link['correo']; ?></td>
                                                  <td>
                                                  <center>
                                                  <a  href = "deleteUser.php?id=<?= $link['id']?>"><i class="bx bx-trash"></i></a>    
                                                  <a style ="float:left" href = "editUser.php?id=<?= $link['id']?>"><i class="bx bx-pencil"></i></a></center> 
                                               
                                                  </td>
                                                  <?php endforeach;?>

                                            <?php else:?>
                                              <tr><td colspan="5" style="color:salmon " >No Hay Registros Actuales</td></tr></
                                            <?php endif;?>




                                            </tbody>

                                        
                                        </table>
                                       



                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

    




    
    <?php   include_once (LAYOUT_PATH."footer2.php")  ?>



    </body>


</html>