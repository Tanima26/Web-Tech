<?php  
require_once '../model/model.php';


if (isset($_POST['addCustomer'])) {
	$data['name'] = $_POST['name'];
	$data['mobileno'] = $_POST['mobileno'];
	$data['email'] = $_POST['email'];
	$data['discount'] = $_POST['discount'];
	

  if (addCustomer($data)) {
  	echo 'Successfully added!!';
  }
} else {
	echo 'You are not allowed to access this page.';
}

?>