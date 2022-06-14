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

                <div class="row">
                    <div class="col-xl-12">
                        <div id="mensajes"></div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Productos</h4>

                                <p class="card-title-desc">Rellene Los campos para registrar un nuevo producto.</p>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                                href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                                aria-selected="true">Producto</a>
                                            
                                        
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                                aria-labelledby="v-pills-home-tab">

                                                <form class="needs-validation" autocomplete="off" id="form"
                                                    method="POST" action="">



                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label" for="codeProduct">Codigo del producto</label>
                                                                <input type="text" class="form-control" name="codeProduct"
                                                                    placeholder="Codigo del producto" required>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label"
                                                                    for="nameProduct">Nombre del producto</label>
                                                                <input type="text" class="form-control" name="nameProduct"
                                                                    placeholder="Nombre del producto">

                                                            </div>
                                                        </div>


                                                     
                                                        <div class="col-md-4">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label" for="descProduct">Descripcion del producto</label>
                                                                <input type="text" class="form-control"
                                                                    name="descProduct"
                                                                    placeholder="Descripcion del producto">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-3">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label"
                                                                    for="price">Precio Del Producto</label>
                                                                <input type="text" class="form-control"
                                                                    name="price" placeholder="Precio del producto">
                                                            </div>
                                                        </div>

                                                     







                                                        <div class="col-md-3">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label" for="stock">Cantidad de Productos</label>
                                                                <input type="text" class="form-control" name="stock"
                                                                    placeholder="Cantidad de productos" required>
                                                            </div>
                                                        </div>


                                                        </div>
                                                       
                                                        </div>
                                        </div>
                                    </div><!--  end col -->
                                </div><!-- end row -->

                            </div><!-- end card-body -->

                        </div><!-- end card -->
                        <a type="button" class="btn btn-danger waves-effect" href="./productos">Regresar</a>
                        <button class="btn btn-primary" id="registrar" type="submit">Guardar</button>
                    </div><!-- end col -->


                    </form>

                </div><!-- end col -->



                <?php   include_once (LAYOUT_PATH."footer.php")  ?>



</body>

<script src="<?php echo HTTP_.ROOT_PATH_CORE; ?>/Resources/views/productos/fetch.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



</body>


</html>