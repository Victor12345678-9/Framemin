<?php





require_once ("../../vendor/orm/condiciones.php");

        //Prueba 1 -- Select Normal
        

    /*

        $condicionales  = new Condicionales();
        $condicionales->select(['idProduct,nameProduct,descProduct'],'productos');
        $resultado= $condicionales-> run();
        print_r($resultado);
        echo '<br>';
        
     */

        //Prueba 2 -- Select con Where



     /*

        $condicionales  = new Condicionales();
        $condicionales->select(['idProduct,nameProduct,descProduct'],'productos');
        $condicionales->where(['idProduct=10','nameProduct="coca"']);
        $resultado= $condicionales-> run();
        print_r($resultado);
        echo '<br>';
        
     */

        //Prueba 3 -- Select con Where y Or

     /* 
        $condicionales  = new Condicionales();
        $condicionales->select(['idProduct,nameProduct,descProduct'],'productos');
        $condicionales->where(['idProduct=10','nameProduct="coca"']);
        $condicionales->orWhere(['idProduct=10','nameProduct="coca"']);
        $resultado= $condicionales-> run();
        print_r($resultado);

     */ 
       
        //Prueba 4 -- Select con Limit
     
     /*
       
        $condicionales  = new Condicionales();
        $condicionales->select(['idProduct,nameProduct,descProduct'],'productos');
        $condicionales->limit('0,10');
        $resultado= $condicionales-> run();
        print_r($resultado);
     */

         //Prueba 5 -- Select con Where y Limit


     /*
        $condicionales  = new Condicionales();
        $condicionales->select(['idProduct,nameProduct,descProduct'],'productos');
        $condicionales->where(['idProduct>10','stock<3000']);
        $condicionales->limit('0,10');
        $resultado= $condicionales-> run();
        print_r($resultado);

     */  



          //Prueba 6 -- Select con Where Or y Limit
     /*
        $condicionales  = new Condicionales();
        $condicionales->select(['idProduct,nameProduct,descProduct'],'productos');
        $condicionales->where(['idProduct>10','stock<3000']);
        $condicionales->orWhere(['idProduct=10','nameProduct="coca"']);
        $condicionales->limit('0,10');
        $resultado= $condicionales-> run();
        print_r($resultado);

     */      


          //Prueba 7 -- Select con OrderBy
     
      /*
        
        $condicionales  = new Condicionales();
        $condicionales->select(['idProduct,nameProduct,descProduct'],'productos');
        $condicionales->orderBy('idProduct ASC,nameProduct DESC');
        $resultado= $condicionales-> run();
        
      */  

       


          //Prueba 8 -- Select con Where y OrderBy

      
        
      /*
        
        $condicionales  = new Condicionales();
        $condicionales->select(['idProduct,nameProduct,descProduct'],'productos');
        $condicionales->where(['idProduct<1000','price>1000']);
        $condicionales->orderBy('idProduct ASC,nameProduct DESC');
        $resultado= $condicionales-> run();
        print_r($resultado);  
         
      */ 


          //Prueba 9 -- Select con Where, Or, Limit y OrderBy

      
  class Productos{


        public function __construct(){

        }
        
        public function index(){

                $sql = new Condicionales();
                
               //between
                // $sql->select(['price'],'productos')->between('price',['15','50']);
             
                $sql->select(['usuarios.departamento,departamentos.idDepartamento'],'departamentos')->rightJoin("usuarios");
                $resultado = $sql->run(); 
                
                return $resultado;
        }


        public function create(){

         $sql = new Condicionales();
         $sql->insert(
            [
                'codeProduct'    =>            23459871,
                'nameProduct'    =>            'PruebaAdmin',
                'descProduct'    =>            'DescAdmin',
                'price'          =>            2500,
                'stock'          =>            50,
                'status'         =>            1
            ],'productos');

         $resultado = $sql->run(); 
          
         return $resultado;
      }


      //   public function show(){

      //    $sql = new Condicionales();
      //    $codeProduct=23459871;
         
      //    $sql->select(['idProduct,codeProduct,nameProduct,price,status'],'productos')->where(['codeProduct='.$codeProduct])->limit('1,10');
      //    $resultado = $sql->run(); 
      //    return $resultado;
      // }

      
      public function destroy(){

         $sql = new Condicionales();
         $idProduct= 11111248;
         $sql->update(['status' => '0'],'productos')->where(['idProduct='.$idProduct]);
         $resultado = $sql->run();
         print_r($resultado); 
      }

      public function update(){

         $sql = new Condicionales();
         $idProduct= 11111248;
         $sql->update(
            [
            'idProduct'           => $idProduct,
            'codeProduct'         => 23459871,
            'nameProduct'         => 'Sprite',
            'descProduct'         => 'coca 10 litros',
            'price'               => 1000,
            'stock'               => 10,
            'status'               => 1
            ],'productos')->where(['idProduct='.$idProduct]);

            $resultado = $sql->run();
            return $resultado;
          
         
      }

     
} 

?>

<!-- Aqui Inicia La Vista-->


         <?php

         $obj= new Productos();
         $resultado = $obj->index();

         print_r($resultado);
       
         
         

                     ?>









<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<!-- <body>
    <br><br>
    <br><br>
    <br><br>


    <center>
        <table border="1">
            <tr>
                <th>Departamento</th>
                <th>ID Departamento</th>
               
                
                
            </tr>
            
            <?php foreach($resultado  as $valor){ ?>
              
            <tr>
                <td><?php echo $valor['departamento'] ?></td>
                <td><?php echo $valor['idDepartamento'] ?></td>
              
               
               
               

            </tr>
            <?php } ?>

             


        </table>
    </center> 

</body> -->

</html>