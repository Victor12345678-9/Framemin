<?php
	include_once "../../Config/routes/rutes.php";
	include_once(CONTROLLERS_PATH.'productsController.php');
	$obj= new ProductsController();
	
	$obj->updateProduct($_POST['idProduct'],$_POST['codeProduct'],$_POST['nameProduct'],$_POST['descProduct'],$_POST['price'],$_POST['stock']);
?>