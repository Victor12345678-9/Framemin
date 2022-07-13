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



<div class="card">
        <h3 style="text-align: center;">Crear usuarios</h3>
        <form action="http://localhost/lindesk/products" autocomplete="off"  class="form"id= "nuevoDepartamento">
            <input type="hidden" class="_method"  value="POST">
            <input type= "text" placeholder="codigoDepartamento" name="codigoDepartamento">
            <input type= "text" placeholder="nombreDepartamento" name="nombreDepartamento">
            <input type= "text" placeholder="description_dp" name="description_dp">
            <button type="submit" onclick = "crearDepartamento()"href="" class="btn btn-primary">Crear</button>
        </form>    
    </div> 
    <a href="./tabla.php" class="btn btn-danger ">regresar</a>
    
    <script src = "./fetch.js"></script>