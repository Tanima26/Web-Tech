<?php  
require_once '../model/model.php';
$name=$mobileno=0;

if (isset($_POST['updateCustomer'])) {
	$data['name'] = $_POST['name'];
	$data['mobileno'] = $_POST['mobileno'];
	$data['email'] = $_POST['email'];
	$data['discount'] = $_POST['discount'];

	echo var_dump($data['name']);
	echo var_dump($data['mobileno']);
	echo var_dump($data['email']);
	echo var_dump($data['discount']);
	echo var_dump($_POST['id']);



  if (updateCustomer($_POST['id'], $data)) {
  	echo 'Successfully updated!!';
  	//redirect to showStudent
header('Location: ../View/showCustomer.php?c_id=' . $_POST["id"]);

  }
} else {
	echo 'You are not allowed to access this page.';
}


?>