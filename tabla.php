
<?php 

include_once "./App/controllers/productsController.php";
$obj = new ProductsController();
$result = $obj ->index();

 ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>



<section id="forms">
    

        <div class="card-body">
            <!--mostrar todos los usuarios-->
            <form action="http://localhost/lindesk/products" autocomplete="off">
                <input class="_method" type="hidden" value="GET">
                <a type="button" class="btn btn-primary"
                href="./crear.php" class="text-center">Agregar</a>
                </div>
            </form>
    
    

</section>
<center>
<table>
            <thead>
            <tr>
            <th> Codigo </th>
            <th> Nombre</th>
            <th> Descripcion</th>
            <th > Acciones</th>
            </tr>
<TBODY>
<?php foreach ($result as $key){ ?>
            <tr>    
            <td><?php echo $key['codigoDepartamento'];?></td>
            <td><?php echo $key['nombreDepartamento'];?></td>
            <td><?php echo $key['description_dp'];?></td>
       

            <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-2"></i> Edit</a>
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-2"></i> Delete</a>
                            </div>
                          </div>

                          
            <td> <a onclick="deleteDepartamento(<?php echo $key['idDepartamento'];?>)" style="margin:5px" href="">
            <i class="bx bx-show">Eliminar</i></a>  <td>

            
            <td> <a style="margin:5px" href=""><i class="bx bx-show">Modificar</i></a>  <td>
            <td> <a onclick="showDepartamento(<?php echo $key['idDepartamento'];?>)" style="margin:5px" href="">
            <i class="bx bx-show">Ver</i></a>  <td>
            </tr>

            

<?php  }?>


<TBODY>
<div name="resultado" id="resultado"></div>
</center>

<script src="./fetch.js"></script>
