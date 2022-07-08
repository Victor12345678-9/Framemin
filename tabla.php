
<?php include_once "./App/controllers/productsController.php";
$obj = new ProductsController();
$result = $obj ->index();

 ?> 


<table class="table table-bordered">
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
       

            <td> <a onclick="deleteDepartamento(<?php echo $key['idDepartamento'];?>)" style="margin:5px" href="#">
            <i class="bx bx-show">Eliminar</i></a>  <td>

            <td> <a style="margin:5px" href=""><i class="bx bx-show">Modificar</i></a>  <td>
            <td> <a style="margin:5px" href=""><i class="bx bx-show">Ver</i></a>  <td>
            
            </tr>
            

<?php }?>
<TBODY>


<script src="./fetch.js"></script>