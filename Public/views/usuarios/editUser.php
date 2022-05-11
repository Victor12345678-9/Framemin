<!doctype html>
    <html lang="en">

<?php
    include_once "../../../Config/constant/rutes.php";
    require_once (CONTROLLERS_PATH."usersController.php");
    $obj= new UsersController();
    $usuarios=$obj->showUser($_GET['id']);
    $departamentos=$obj->showDepartamentos();

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
                                                    <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Contacto</a>
                                                    <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Contratacion</a>
                                                    <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Configuraciones</a>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-md-9">
                                                    <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    
                                                        <form class="needs-validation" autocomplete="off" id="nuevo" method="POST" action="updateUser.php">
    
                                               
                                                        <input type="hidden" id="id" name="id" value="<?= $usuarios['id']; ?>" />
                                                        
                                        <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="nombre">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?= $usuarios['nombre'] ?>" required >
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="apellido">Apellido</label>
                                            <input type="text" class="form-control" name="apellido" placeholder="Apellido" value="<?= $usuarios['apellido']?>" required >
                                            
                                        </div>
                                    </div>
    
    
                                    <div class="col-md-3">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="fechaNacimiento">Fecha De Nacimiento</label>
                                            <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" value="<?= $usuarios['fechaNacimiento']?>" >
                                        </div>
                                    </div>
    
                                    <div class="col-md-3">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="lugarNacimiento">Lugar De Nacimiento</label>
                                                <input type="text" class="form-control" name="lugarNacimiento" value="<?= $usuarios ['lugarNacimiento']?>" placeholder="Lugar de Nacimiento"  >
                                            </div>
                                        </div>
    
                                            <div class="col-md-2">
                                            <div class="mb-3 position-relative">
                                            <label class="form-label" for="edad">Edad</label> 
                                            <input type="number" class="form-control" name="edad" placeholder="Edad" id="edad" maxlength="2" min="18" max="99" value="<?= $usuarios['edad']?>" >
                                           
                                        </div>
                                    </div>
                           
                                        
                                    <div class="col-md-3">
                                        <div class="mb-3 position-relative">
                                        <label class="form-label" for="genero">Genero</label> 
                                        <select type="text" class="form-select"  name="genero" required >

                                        <?php

                                         $select='';
                                        
                                        if($usuarios['genero']=='Masculino'){
                                           $select='selected';  
                                           echo '<option value="'.$usuarios['genero'].'" '.$select.'>'.$usuarios['genero'].'</option>';
                                           echo '<option value="Femenino" >Femenino</option>';
                                          
                                          } ?>
                                            

                                            <?php

                                         $select='';
                                        
                                        if($usuarios['genero']=='Femenino'){
                                           $select='selected';  
                                           echo '<option value="'.$usuarios['genero'].'" '.$select.'>'.$usuarios['genero'].'</option>';
                                           echo '<option value="Masculino" >Masculino</option>';
                                          
                                          } ?>
                                            
                                                
                                        
                               
                                       
                                        </select>
                                    </div>
                                </div>
    
                                    <div class="col-md-3">
                                            <div class="mb-3 position-relative">
                                            <label class="form-label" for="nacionalidad">Nacionalidad</label>
                                            <input type="text" class="form-control" name="nacionalidad" placeholder="Nacionalidad" value="<?= $usuarios['nacionalidad']?>" >
                                        </div>
                                    </div>
    
                                    <div class="col-md-3">
                                            <div class="mb-3 position-relative">
                                            <label class="form-label" for="estadoCivil">Estado Civil</label>
                                            <select type="text" class="form-select" name="estadoCivil"  required >
    
                                                
                                            <option  selected>Casado@</option>
                                            <option>Divorciad@</option>
                                            <option>Solter@</option>
                                        
                                        
                                           
                                            </select>
                                        </div>
                                    </div>
    
    
    
    
    
    
                                    
                                    <div class="col-md-3">
                                            <div class="mb-3 position-relative">
                                            <label class="form-label" for="rfc">RFC</label>
                                            <input type="text" class="form-control" name="rfc" placeholder="RFC" required value="<?= $usuarios['rfc']?>" required>
                                        </div>
                                    </div>
    
    
    
                                    <div class="col-md-3">
                                            <div class="mb-3 position-relative">
                                            <label class="form-label" for="curp">CURP</label>
                                            <input type="text" class="form-control" name="curp" placeholder="CURP" value="<?= $usuarios['curp']?>" >
                                        </div>
                                    </div>
    
    
    
                                    
    
                                    <div class="col-md-3">
                                            <div class="mb-3 position-relative">
                                            <label class="form-label" for="numeroCartilla">Numero de Cartilla</label>
                                            <input type="number" class="form-control" name="numeroCartilla" placeholder="Numero de cartilla" value="<?= $usuarios['numeroCartilla']?>" min=0>
                                        </div>
                                    </div>
    
                                </div>
                          
                                         </div>
    
    
    
    
    
                                         
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="numeroTelefonico">Numero Telefonico</label>
                                            <input type="text" class="form-control" name="numeroTelefonico" placeholder="Numero Telefonico" value="<?= $usuarios['numeroTelefonico']?>">
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                        <label class="form-label" for="correo">Correo</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                            <input type="email" class="form-control" name="correo" placeholder="correo"  value="<?= $usuarios['correo']?>"  >
                                        
                                        </div>
                                            
                                        </div>
                                    </div>
    
    
    
                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="lugarNacimiento">Direccion</label>
                                                <input type="text" class="form-control" name="direccion" placeholder="Direccion"  value="<?= $usuarios['direccion']?>">
                                            </div>
                                        </div>
    
    
    
                                        <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="municipio">Municipio</label>
                                                <input type="text" class="form-control" name="municipio" placeholder="Municipio"  value="<?= $usuarios['municipio']?>">
                                            </div>
                                        </div>
    
    
                                            <div class="col-md-3">
                                            <div class="mb-3 position-relative">
                                            <label class="form-label" for="edad">Codigo Postal</label>
                                            <input type="text" class="form-control" name="codigoPostal" placeholder="Codigo Postal"  value="<?= $usuarios['codigoPostal']?>" min=1 >
                                        </div>
                                    </div>
    
                                </div>
    
    
                                                        </div>
    
    
    
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        
                                    <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="empresa">Empresa</label>
                                            <input type="text" class="form-control" name="empresa" placeholder="Empresa" value="<?= $usuarios['empresa']?>">
                                        
                                        </div>
                                    </div>
    
                                 
                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="nss">Numero de Seguro Social</label>
                                                <input type="number" class="form-control" name="nss" placeholder="NSS"  value="<?= $usuarios['nss']?>" min=0>
                                            </div>
                                        </div>
    
    
    
                                        <div class="col-md-3">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="nomina">Nomina</label>
                                            <input type="text" readonly class="form-control" name="nomina" placeholder="Nomina" value="<?= $usuarios['nomina']?>" required min=1>
                                        
                                        </div>
                                    </div>
                               
    
    
                                                
                                    <div class="col-md-3">
                                        <div class="mb-3 position-relative">
                                        <label class="form-label" for="departamento">Departamento</label>  
                                        <select type="number" class="form-select" name="departamento" value="<?php $usuarios['departamento'] ?>" required>
                                     
                                        <option  style="color:grey" disabled>Seleccione Un Departamento</option>
                                        <?php foreach ($departamentos as $depas)
                                        {
                                            $select = '';
                                            if($usuarios['departamento'] == $depas['idDepartamento'])
                                            {
                                                $select = 'selected';
                                            }
                                           echo '<option value="'.$depas['idDepartamento'].'" '.$select.'>'.$depas['nombreDepartamento'].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
    
    
    
                                            <div class="col-md-3">
                                            <div class="mb-3 position-relative">
                                            <label class="form-label" for="puesto">Puesto</label>
                                            <input type="text" class="form-control" name="puesto" placeholder="Puesto" value="<?= $usuarios['puesto']?>" required >
                                        </div>
                                    </div>
    
    
                                    <div class="col-md-3">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="fechaContratacion">Fecha De Contratacion</label>
                                            <input type="date" class="form-control" name="fechaContratacion"   value="<?= $usuarios['fechaContratacion']?>" >
                                        </div>
                                    </div>
    
    </div>
    </div>
    
    
    
                                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" id="checkActivado" checked>
                                                            <label class="form-check-label" for="checkActivado">
                                                                Usuario Activado
                                                            </label>
                                                        </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div><!--  end col -->
                                            </div><!-- end row -->
                                            
                                        </div><!-- end card-body -->
                                        
                                    </div><!-- end card -->
                                    <a type="button" class="btn btn-danger waves-effect" href="usersView.php">Cancelar</a>
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                </div><!-- end col -->
                                    
                                    
                                    </form>
                                    
                                </div><!-- end col -->
        
    
    
    
    
        
        <?php   include_once (LAYOUT_PATH."footer2.php")  ?>
    
    
    
        </body>
    
    
    </html>