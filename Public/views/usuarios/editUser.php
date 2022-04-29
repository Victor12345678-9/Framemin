<!doctype html>
<html lang="en">

<?php
include_once "../../../Config/constant/rutes.php";
require_once (CONTROLLERS_PATH."usersController.php");
$obj= new UsersController();
$usuarios=$obj->showUser($_GET['id']);



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
            
                    <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Editar Usuarios</h4>
                                        <p class="card-title-desc">Rellene Los Campos Para Actualizar Usuario</p>
                                    </div>
                                    <div class="card-body p-4">
                                        
                                    <div class="row">
                                                <div class="col-md-5">
                                                    <div class="mb-3 position-relative">
                                                    <form class="needs-validation" autocomplete="off" id="nuevo" method="POST" action="updateUser.php">

                                                        <input type="hidden" name="id" value="<?= $usuarios['id'] ?>">

                                                        <label class="form-label" for="nombre">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" value = "<?= $usuarios['nombre'] ?>" required>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="apellido">Apellido</label>
                                                        <input type="text" class="form-control" name="apellido" value = "<?= $usuarios['apellido'] ?>"  placeholder="apellido" required>
                                                        
                                                    </div>
                                                </div>


                                                <div class="col-md-5">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="nomina">Nomina</label>
                                                        <input type="number" class="form-control" name="nomina" value = "<?= $usuarios['nomina'] ?>"  placeholder="nomina"  required>
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="correo">Correo</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                                            <input type="email" class="form-control" name="correo" value = "<?= $usuarios['correo'] ?>"  placeholder="correo"  required>
                                                           
                                                        </div>
                                                        
                                                    </div>
                                                 
                                                            
                                                           
                                                        </div>
                                                </div>
                                                <a type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal" href="usersView.php">Regresar</a>
                                                <button class="btn btn-primary" type="submit"  data-bs-dismiss="modal" >Guardar</button>
                                                </form>
                                            </div>
                                </div>
                            </div>
      </div>
    </div>
                   

    




    
    <?php   include_once (LAYOUT_PATH."footer2.php")  ?>



    </body>


</html>