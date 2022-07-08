<!DOCTYPE html>



<div class="card">
        <h3 style="text-align: center;">Crear usuarios</h3>
        <form action="http://localhost/lindesk/products" autocomplete="off" id= "nuevoDepartamento">
            <input type="hidden" class="_method"  value="POST">
            <input type= "text" placeholder="codigoDepartamento" name="codigoDepartamento">
            <input type= "text" placeholder="nombreDepartamento" name="nombreDepartamento">
            <input type= "text" placeholder="description_dp" name="description_dp">
            <button type="submit" onclick = "crearDepartamento()"href="" class="btn btn-primary">Submit</button>
        </form>    
    </div> 

    
    <script src = "./fetch.js"></script>