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
    <!--mostrar todos los usuarios-->
<section id="forms">
    <div class="card">
        <h1 style="text-align: center;">Index</h1>
        <div class="card-body">
            <form class="form-inline needs-validation" autocomplete="off" id="index" >
                 <input type= "text" value="GET" name="_method">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>    
        </div>
    </div> 

    <div class="card">
        <h1 style="text-align: center;">Show</h1>
        <div class="card-body">
            <form class="form-inline needs-validation" autocomplete="off" id="show">
            <input type= "text" value="GET" name="_method">
                <input type= "text" placeholder="codigoDepartamento" name="codigoDepartamento">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>    
        </div>
    </div> 

      <div class="card">
        <h1 style="text-align: center;">Update</h1>
        <div class="card-body">
            
            <form class="form-inline needs-validation" autocomplete="off" id="update">
            <input type= "text" value="PUT" name="_method">
                <input type= "text" placeholder="nombreDepartamento" name="nombreDepartamento">
                <br>
                <input type= "text" placeholder="idDepartamento" name="idDepartamento">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>    
        </div>
    </div>   

    <div class="card">
        <h1 style="text-align: center;">insert</h1>
        <div class="card-body">
            
            <form class="form-inline needs-validation" autocomplete="off" id="insert" name="POST">
                <input type= "text" placeholder="Nombre Departamento" name="nombreDepartamento">
                <br>
                <input type= "text" placeholder="Codigo Departamento" name="codigoDepartamento">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>    
        </div>
    </div> 

    <div class="card">
        <h1 style="text-align: center;">Delete</h1>
        <div class="card-body">
            
            <form class="form-inline needs-validation" autocomplete="off" id="update" name="DELETE">
               
         
                <input type= "text" placeholder="idDepartamento" name="idDepartamento">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>    
        </div>
    </div>  


</section>

    <!-- <div class="card">
        <h1 style="text-align: center;">mostrar</h1>
        <div class="card-body">
            <form class="form-inline needs-validation" autocomplete="off" id="index">
                <input type="hidden" name="_method" value="PUT">    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>    
        </div>
    </div> 

    <div class="card">
        <h1 style="text-align: center;">mostrar</h1>
        <div class="card-body">
            <form class="form-inline needs-validation" autocomplete="off" id="index">
                <input type="hidden" name="_method" value="PUT">    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>    
        </div>
    </div>   -->


    <!--crear nuevo usuario
    <div class="card">
        <h1 style="text-align: center;">insertar</h1>
        <div class="card-body">
            <form class="form-inline needs-validation" autocomplete="off" id="create">
                <div class="form-row">
                    <div class="col-3">
                        <input type="text" class="form-control" id="code_dto" aria-describedby="code_dto" placeholder="code del departamento" name="code_dto">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="name_dto" aria-describedby="name_dto" placeholder="nombre del departamento" name="name_dto">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="numemple_dto" aria-describedby="numemple_dto" placeholder="# Empleados" name="numemple_dto">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="status_dto" placeholder="estatus" name="status_dto">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>-->
    <script src="./fetch.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>