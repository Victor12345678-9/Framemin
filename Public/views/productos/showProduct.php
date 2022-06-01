<!doctype html>
<html lang="en">

<?php



require_once (LAYOUT_PATH."head.php");
require_once(LAYOUT_PATH."header.php");

?>

    <body>

    <div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Informacion </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="../productos/products.php">Productos</a></li>
                            <li class="breadcrumb-item active">Informacion</li>
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
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="font-size-16 mb-1"><?= $product['nameProduct']?></h5>
                                            <p class="text-muted font-size-13"><?= $product['codeProduct']?></p>

                                            <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?= "Activo"?></div>
                                                <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?= $product['stock']?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
    
                        <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Producto</a>
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
                                <h5 class="card-title mb-0">Acerca del Producto</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="pb-3">
                                        <div class="row">
                                            <div class="col-xl-2">
                                                
                                            </div>
                                           
                                        </div>
                                    </div>



                                    

                                    <div class="py-3">
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <div>
                                                    <h5 class="font-size-15">Codigo Del Producto:</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl">
                                                <div class="text-muted">
                                                    <p> <?= $product['codeProduct'] ?></p>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="py-3">
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <div>
                                                    <h5 class="font-size-15">Nombre Del Producto:</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl">
                                                <div class="text-muted">
                                                    <p> <?= $product['nameProduct']?></p>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>






                                    
                                    <div class="py-3">
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <div>
                                                    <h5 class="font-size-15">Descripcion del Producto:</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl">
                                                <div class="text-muted">
                                                    <p> <?= $product['descProduct'] ?></p>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    
                                    <div class="py-3">
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <div>
                                                    <h5 class="font-size-15">Precio:</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl">
                                                <div class="text-muted">
                                                    <p> <?= $product['price'] ?></p>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    
                                    <div class="py-3">
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <div>
                                                    <h5 class="font-size-15">Stock:</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl">
                                                <div class="text-muted">
                                                    <p> <?= $product['stock'] ?></p>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    
                                    <div class="py-3">
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <div>
                                                    <h5 class="font-size-15">Status:</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl">
                                                <div class="text-muted">
                                                    <p> Activo</p>
                                                  
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


                    
                                              
                                                                
                                <!-- end card -->

                               
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                  
                    </div> <!-- container-fluid -->
                    
                </div>
                <!-- End Page-content -->
                </div><!-- end col -->
                                    
</div>
</div>
                                    
                                </div><!-- end col -->
        
        <?php   include_once (LAYOUT_PATH."footer.php")  ?>
    


    </body>


</html>