<?php  

    include "../Config/constant/rutes.php";


    include (LAYOUT_PATH."head.php");
    
    require_once ('C:/xampp/htdocs/mvc2/controller/usersController.php');
    $obj= new UsersController();
    $usuarios=$obj->show();
    
   ?>

    

<!doctype html>
<html lang="en">


    <body>

    <?php  include (LAYOUT_PATH."header.php");?>



            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Usuarios</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Usuarios</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                       
                           
                                    <div class="card-body">
                                        <div>
                                            <button type="button"  class="btn btn-success waves-effect  waves-light" class="text-center" data-bs-toggle="modal" data-bs-target="#myModal">Agregar Usuario</button>

                                            <!-- sample modal content -->
                                            <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Agregar Usuario</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           




                                            <form class="needs-validation" autocomplete="off" id="nuevo" method="POST" action="insertUser.php">


                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="nombre">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="apellido">Apellido</label>
                                                        <input type="text" class="form-control" name="apellido" placeholder="apellido" required>
                                                        
                                                    </div>
                                                </div>


                                                <div class="col-md-5">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="nomina">Nomina</label>
                                                        <input type="number" class="form-control" name="nomina" placeholder="nomina"  required  min="1">
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="correo">Correo</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                                            <input type="email" class="form-control" name="correo" placeholder="correo"  required>
                                                           
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                              
                                            </div>
                                           
                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Cancelar</button>
                                                            <button class="btn btn-primary" type="submit">Guardar</button>
                                                        </div>
                                        </form>
                                                          
                                                        </div>
                                                       
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div> <!-- end preview-->

                                    </div><!-- end card-body -->
        
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
                                                  <a style ="float:left" href = "./view/usuarios/editUser.php?id=<?= $link['id']?>"><i class="bx bx-pencil"></i></a></center> 
                                               
                                                  </td>
                                                  <?php endforeach;?>

                                            <?php else:?>
                                    <tr><td colspan="5" style="color:salmon " >No Hay Registros Actuales</td></tr>
                                            <?php endif;?>

                                        </tr>


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

                
              





























    
    
    <?php   include_once (LAYOUT_PATH."footer.php")  ?>



    </body>


</html>