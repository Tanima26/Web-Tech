<?php  
include '../Control/ProductDataController.php' ;

$ProductID = $_GET['ProductID'];

$product = ProductsInfo($ProductID);

	echo $product['ProductID'];
	echo "<br>";
	echo $product['ProductTitle'];
	echo "<br>";
	echo $product['catagory'];
	echo "<br>";
	echo $product['sub_catagory'];
	echo "<br>";
	echo $product['qantity'];
	echo "<br>";
	echo $product['price'];
	echo "<br>";
	echo $product['status'];
	echo "<br>";

?>