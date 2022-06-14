<!doctype html>
<html lang="en">

<?php
require_once (LAYOUT_PATH."head.php");
require_once(LAYOUT_PATH."header.php");
?>

<body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="<?php echo HTTP_.ROOT_PATH_CORE; ?>/Resources/views/productos/peticion.js"></script>
    <script src="<?php echo HTTP_.ROOT_PATH_CORE; ?>/Public/css/estilos.css"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class=" align-items-center justify-content-start">
                            <h4 class="mb-sm-0 font-size-18"> Productos </h4>



                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- <div class="card"> -->


                                    <div class="card-body">
                                        <div>
                                            <a type="button" class="btn btn-success waves-effect waves-light"
                                                href="<?php echo HTTP_.ROOT_PATH_CORE; ?>/addProduct"
                                                class="text-center">Agregar Producto</a>

                                            <!-- sample modal content -->




                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </div> <!-- end preview-->

                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <!-- <div class="card-body"> -->
                    
                <div class="d-flex flex-row-reverse">
                    <!-- <div class="d-flex"> -->
                    <div class="app-search d-none d-lg-block"  >
                        <div class="position-relative ">
						<input type="text"  class="form-control" name="busqueda" id="busqueda" placeholder="Buscar..." size="32">
                            <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                        </div>
                    </div>
                    

            </div>
                <br>

                <!-- Table -->
            <table class="table table-bordered">
            <thead>
            <tr>
            <th> Codigo </th>
            <th> Producto</th>
            <th> Descripcion</th>
            <th> Stock</th>
            
            <th WIDTH="10%"> Acciones</th>
            </tr>
            </thead>
            <tbody id="tabla_resultado"></tbody>
            </table>

            
            <ul class="pagination">
            <div id="paginacion" class="pagination"></div>
            </ul>
                       
            <div id="query"></div>
                        
                    



                    <!-- Table -->


            </div><!-- end card -->



        </div>

    </div>
    </div>
    </div> <!-- end col -->
    </div> <!-- end row -->

    </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php   include_once (LAYOUT_PATH."footer.php")  ?>

    <script src="<?php echo HTTP_.ROOT_PATH_CORE; ?>/Resources/helpers/alertProduct.js"></script>

</body>

</html>