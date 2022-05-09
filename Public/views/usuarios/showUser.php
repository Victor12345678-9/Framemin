<!doctype html>
<html lang="en">




<?php

include_once "../../../Config/constant/rutes.php";
require_once (CONTROLLERS_PATH."usersController.php");

$obj= new UsersController();

$departamentos=$obj->innerDep();
$user=$obj-> showUser($_GET['id']);






include_once (LAYOUT_PATH."head2.php");

?>









    <body>






	<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Perfil</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Usuarios</a></li>
                                            <li class="breadcrumb-item active">Perfil</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-9 col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm order-2 order-sm-1">
                                                <div class="d-flex align-items-start mt-3 mt-sm-0">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-xl me-3">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid rounded-circle d-block">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-16 mb-1"><?= $user['nombre']?></h5>
                                                            <p class="text-muted font-size-13">ID Departamento:  <?= $user['departamento']?></p>

                                                            <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                                <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?= $user['puesto']?></div>
                                                                <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?= $user['correo']?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                        </div>

                                        <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Personales</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab">Contacto</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link px-3" data-bs-toggle="tab" href="#post" role="tab">Contratacion</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="tab-content">
                                    <div class="tab-pane active" id="overview" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Acerca de Personales</h5>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <div class="pb-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Nombre :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p class="mb-2"><?= $user['nombre']?></p>
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Apellidos :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['apellido']?></p>

                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


													<div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Fecha De Nacimiento :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['fechaNacimiento']?></p>

                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


													<div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Lugar De Nacimiento :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['lugarNacimiento']?></p>

                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Edad:</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['edad']?></p>

                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Genero :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['genero']?></p>

                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Nacionalidad :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['nacionalidad']?></p>

                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Estado Civil :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['estadoCivil']?></p>

                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



													<div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">RFC :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['rfc']?></p>

                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


													<div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">CURP :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['curp']?></p>

                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="py-2">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Numero de Cartilla :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['numeroCartilla']?></p>

                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




















                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->

                                        <!-- end card -->
                                    </div>
                                    <!-- end tab pane -->

									<div class="tab-pane" id="about" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Acerca de Contacto</h5>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                   <div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Numero Telefonico :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['numeroTelefonico']?></p>
                                                            
                                                        </div>
                                                    </div>



													<div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Correo :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['correo']?></p>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Direccion :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['direccion']?></p>
                                                            
                                                        </div>
                                                    </div>

													<div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Municipio :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['municipio']?></p>
                                                            
                                                        </div>
                                                    </div>



													<div class="py-3">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">Codigo Postal :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    <p><?= $user['codigoPostal']?></p>
                                                            
                                                        </div>
                                                    </div>








                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>

                                    <div class="tab-pane" id="post" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Post</h5>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-xl-8">
                                                            

                                                            <div class="mt-5">
                                                                <div class="d-flex align-items-start">
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <h5 class="font-size-15 text-truncate"><a href="#" class="text-dark">Project discussion with team</a></h5>
                                                                        <p class="font-size-13 text-muted mb-0">24 Mar, 2020</p>
                                                                    </div>
                                                                    
                                                                </div>
                                                                

                                                                <div class="pt-3">
                                                                    <ul class="list-inline">
                                                                        <li class="list-inline-item me-3">
                                                                            <a href="javascript: void(0);" class="text-muted">
                                                                                <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Development
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-inline-item me-3">
                                                                            <a href="javascript: void(0);" class="text-muted">
                                                                                <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 08 Comments
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                    <p class="text-muted">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
    
                                                                    <div>
                                                                        <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end post -->

                                                            <hr class="my-5">

                                                            <div>
                                                              
                                                                
                                <!-- end card -->

                               
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->














     
    
    <?php   include_once (LAYOUT_PATH."footer2.php")  ?>



    </body>


</html>