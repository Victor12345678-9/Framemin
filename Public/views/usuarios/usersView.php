<!doctype html>
<html lang="en">

<?php



  require_once (LAYOUT_PATH."head2.php");
  require_once(LAYOUT_PATH."header2.php");

?>

<body>





    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class=" align-items-center justify-content-start">
                            <h4 class="mb-sm-0 font-size-18"> Usuarios </h4>



                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- <div class="card"> -->


                                    <div class="card-body">
                                        <div>
                                            <a type="button" class="btn btn-success waves-effect waves-light"
                                                href="<?php echo HTTP_.ROOT_PATH_CORE; ?>/addUser"
                                                class="text-center">Agregar Usuario</a>

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
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative ">
                                <input type="text" class="form-control" name="buscar" onkeyup="buscar_ajax(this.value);" placeholder="Busqueda de registro" id="buscar" size="32" >
                                <button class="btn btn-primary" type="button"><i
                                        class="bx bx-search-alt align-middle"></i></button>
                            </div>
                        </form>
                        <div id="mostrar">
                        
                    </div>
                    </div>
                    <br>
                <div class="table-responsive">
                   


                    <table class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th> Nomina</th>
                                <th> Nombre</th>
                                <th> Genero</th>
                                <th> Departamento</th>
                                <th> Puesto</th>
                                <th> RFC</th>
                                <th> Status</th>



                                <th WIDTH="10%"> Acciones</th>

                            </tr>

                        </thead>

                        <tbody>


                            <?php if($users):?>


                            <?php foreach ($users as $usuario ) { 
                                                  
                                                    ?>

                            <tr>
                                <td><?php echo $usuario->nomina ?></td>
                                <td><?php echo $usuario->nombre." ".$usuario->apellido ?></td>
                                <td><?php echo $usuario->genero ?></td>
                                <td><?php if(isset($array[$usuario->departamento])){echo $array[$usuario->departamento];}else{echo '-';} ?>
                                </td>
                                <td><?php echo $usuario->puesto ?></td>
                                <td><?php echo $usuario->rfc ?></td>

                                <?php if($usuario->status==1){ ?>
                                <td><?php echo 'Activo' ?></td> <?php }?>

                                <td>



                                    <a style="margin:5px"
                                        href="<?php echo HTTP_.ROOT_PATH_CORE; ?>/showUser/<?php echo $usuario->id?>"><i
                                            class="bx bx-show"></i></a>
                                    <a style="margin:5px"
                                        href="<?php echo HTTP_.ROOT_PATH_CORE; ?>/editUser/<?php echo $usuario->id?>"><i
                                            class="bx bx-pencil"></i></a>
                                    <a style="margin:5px" href="#" id="delete_user"
                                        data-id="<?php echo $usuario->id?>"><i class="bx bx-trash"></i></a>

                                </td>
                            </tr>
                            <?php } ?>

                            <?php else:?>



                            <tr>
                                <td colspan="7" style="color:salmon ">No Hay Registros Actuales</td>
                            </tr>
                            <?php endif;?>




                        </tbody>


                    </table>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <?php if ($conteo>0){?>

                            <p style="color:red">Mostrando 1 a <?php echo $resultadosPorPagina ?> de
                                <?php echo $conteo ?> registros</p> <?php }?>
                        </div>
                        <div class="col-xs-12 col-sm-6" style="color:green">
                            <?php if ($paginas>0){?>

                            <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p> <?php }?>

                        </div>
                    </div>
                    <ul class="pagination">
                        <?php echo $tabla; ?>
                    </ul>




                </div>


            </div><!-- end card -->



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
<script>
<?php
if($success == "_")
{
echo    "
        Swal.fire({
        position: 'top-between',
        icon: 'success',
        title: 'Tus cambios han sido guardados',
        showConfirmButton: false,
        timer: 1500
        })
        ";
}
?>

$(document).on('click', '#delete_user', function(e) {
    var UserId = $(this).data('id');
    SwalDelete(UserId);
    e.preventDefault();
});

function SwalDelete(UserId) {
    Swal.fire({
        title: '¿Realmente Desea Eliminar?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar ',
        confirmButtonText: 'Confirmar',
    }).then((result) => {

        if (result.isConfirmed) {
            window.location = "<?php echo HTTP_.ROOT_PATH_CORE; ?>/deleteUser/" + UserId
        }

    })
}
</script>

<?php   include_once (LAYOUT_PATH."footer2.php")  ?>



</body>


</html>