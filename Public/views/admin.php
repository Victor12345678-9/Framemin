<?php





require_once("./App/models/condiciones.php");

        //Prueba 1 -- Select Normal
        

        $condicionales  = new Condicionales();
        $condicionales->select(['idProduct,nameProduct,descProduct'],'productos');
    
        $resultado= $condicionales-> run();
        // print_r($resultado);

        echo '<br>';

        //Prueba 2 -- Select con Where




        $condicionales  = new Condicionales();
        $condicionales->select(['idProduct,nameProduct,descProduct'],'productos');
        $condicionales->where(['idProduct=10','nameProduct="coca"']);
        $resultado= $condicionales-> run();
        // print_r($resultado);


        echo '<br>';
        //Prueba 3 -- Select con Where y Or

        $condicionales  = new Condicionales();
        $condicionales->select(['idProduct,nameProduct,descProduct'],'productos');
        $condicionales->where(['idProduct=10','nameProduct="coca"']);
        $condicionales->orWhere(['idProduct=10','nameProduct="coca"']);
        $resultado= $condicionales-> run();

        print_r($resultado);

       



        //Prueba 4 -- Select con Limit

        $condicionales  = new Condicionales();
        $condicionales->select(['idProduct,nameProduct,descProduct'],'productos');
        $condicionales->limit('1,10');
        $resultado= $condicionales-> run();


         //Prueba 5 -- Select con Where y Limit



          //Prueba 6 -- Select con Where Or y Limit



          //Prueba 7 -- Select con OrderBy



          //Prueba 8 -- Select con Where y OrderBy



          //Prueba 9 -- Select con Where, Or, Limit y OrderBy



?>