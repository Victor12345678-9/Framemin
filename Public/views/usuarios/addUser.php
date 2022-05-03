<!doctype html>
<html lang="en">

<?php

include "../../../Config/constant/rutes.php";


require_once (LAYOUT_PATH."head2.php");

?>

    <body>
       

    <?php  require_once(LAYOUT_PATH."header2.php");?>

    <div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
      
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Usuarios</h4>
                                        <p class="card-title-desc">Rellene Los campos para registrar un nuevo usuario.</p>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Generales</a>
                                                <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">#</a>
                                                <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">#</a>
                                                <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">#</a>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-md-9">
                                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
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
                                                    </div>
               
                                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    

    
</div>
  
</div>
                                                    </div>
                                              
                                                </div>
                                            </div><!--  end col -->
                                            
                                        </div><!-- end row -->
                                        
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                                <a type="button" class="btn btn-danger waves-effect" href="usersView.php">Cancelar</a>
                                <button class="btn btn-primary" type="submit">Guardar</button>
                                </form>
                            </div><!-- end col -->
    




    
    <?php   include_once (LAYOUT_PATH."footer2.php")  ?>



    </body>


</html>