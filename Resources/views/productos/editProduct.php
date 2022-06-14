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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Productos</h4>

                                <p class="card-title-desc">Rellene Los campos para modificar un producto.</p>
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

                                                <form class="needs-validation" autocomplete="off" id="nuevo"
                                                    method="POST" action="../updateProduct">


                                                    <input type="hidden" id="idProduct" name="idProduct"
                                                        value="<?= $product['idProduct']; ?>" />

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label" for="nombre">Codigo de Producto</label>
                                                                <input type="text" class="form-control" name="codeProduct"
                                                                    placeholder="Codigo Del Producto"
                                                                    value="<?= $product['codeProduct'] ?>" required>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label"
                                                                    for="nombre">Nombre del Producto</label>
                                                                <input type="text" class="form-control" name="nameProduct"
                                                                    placeholder="Nombre del Producto"
                                                                    value="<?= $product['nameProduct']?>" required>

                                                            </div>
                                                        </div>


                                                        <div class="col-md-3">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label"
                                                                    for="nacionalidad">Descripcion del Producto</label>
                                                                <input type="text" class="form-control"
                                                                    name="descProduct" placeholder="descripcion del Producto"
                                                                    value="<?= $product['descProduct']?>">
                                                            </div>
                                                        </div>



                                                        <div class="col-md-3">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label" for="rfc">Precio del Producto</label>
                                                                <input type="text" class="form-control" name="price"
                                                                    placeholder="Precio" required
                                                                    value="<?= $product['price']?>" required>
                                                            </div>
                                                        </div>



                                                        <div class="col-md-3">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label" for="stock">Cantidad de Productos</label>
                                                                <input type="text" class="form-control" name="stock"
                                                                    placeholder="Stock" value="<?= $product['stock']?>">
                                                            </div>
                                                        </div>





                                                       

                                                    </div>

                                            </div>






                                            
                                        </div>
                                    </div><!--  end col -->
                                </div><!-- end row -->

                            </div><!-- end card-body -->

                        </div><!-- end card -->
                        <a type="button" class="btn btn-danger waves-effect" href="../productos">Regresar</a>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div><!-- end col -->


                    </form>

                </div><!-- end col -->






                <?php   include_once (LAYOUT_PATH."footer.php")  ?>



</body>


</html>