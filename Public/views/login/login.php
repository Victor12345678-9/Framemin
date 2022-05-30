<!doctype html>
<html lang="en">

<?php

include_once "./Config/constant/rutes.php";

require_once (LAYOUT_PATH."head.php");

?>

<body>




    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <center>
                    <div class="col-xxl-3 col-lg-4 col-md-5">
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5 text-center">
                                        <a href="index.html" class="d-block auth-logo">
                                            <img src="<?php echo HTTP_.ROOT_PATH_CORE; ?>/Storage/images/logo-sm.svg"
                                                alt="" height="24"> <span class="logo-txt">Minia</span>
                                        </a>
                                    </div>

                                    <div id="respuesta" id="respuesta"></div>

                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Bienvenido !</h5>
                                            <p class="text-muted mt-2">Inicia Sesion Para Contiunar.</p>
                                        </div>



                                     

                                        <form class="mt-4 pt-2" action="dataLogin" method="POST" name="loginForm" id="loginForm">
                                            <div class="mb-3">
                                                <label class="form-label">Usuario </label>
                                                <input type="text" class="form-control" name="username"
                                                    placeholder="Ingresa nombre de usuario " required>
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Contraseña</label>
                                                    </div>

                                                </div>

                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control"
                                                        placeholder="Ingresa Contraseña" name="password"aria-label="Password"
                                                        aria-describedby="password-addon" required
                                                        >
                                                    <button class="btn btn-light shadow-none ms-0" type="button"
                                                        id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="remember-check">
                                                        <label class="form-check-label" for="remember-check">
                                                            Remember me
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light"
                                                    type="submit">Entrar</button>
                                            </div>
                                        </form>




                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->

                    <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>









        <?php   include_once (LAYOUT_PATH."footer.php")  ?>
        </center>



</body>


</html>