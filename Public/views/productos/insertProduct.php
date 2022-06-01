<?php



require_once("./App/controllers/productsController.php");
$obj= new ProductsController();
 	

   $codeProduct = $_POST['codeProduct'];
   $nameProduct = $_POST['nameProduct'];
   $descProduct = $_POST['descProduct'];
   $price = $_POST['price'];
   $stock = $_POST['stock'];


   if( $codeProduct=== '' || $nameProduct=== '' || $descProduct=== '' || $price=== '' || $stock=== ''){

       echo json_encode('error');
   }else{
    $obj->insertProduct($_POST['codeProduct'],$_POST['nameProduct'],$_POST['descProduct'],$_POST['price'],$_POST['stock']);

 	echo json_encode('Correcto:');

}
	
	
?>


