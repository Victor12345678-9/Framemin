<?php
	include_once "../../Config/routes/rutes.php";
	include_once(CONTROLLERS_PATH.'productsController.php');

	$pageActual 	= $_POST['pageActual'];
	if (isset($_POST['pageActual']) == "") {
		$pageActual 	= '';
	}
	$buscar = $_POST['buscar'];
	if (isset($_POST['buscar']) == "") {
		$buscar = '';
	}
	
	
	$paginaActual = $pageActual.$s_buscar.'/_';
	$obj= new ProductsController();	
	$obj->updateProduct($_POST['idProduct'],$_POST['codeProduct'],$_POST['nameProduct'],$_POST['descProduct'],$_POST['price'],$_POST['stock'],$paginaActual);
?>