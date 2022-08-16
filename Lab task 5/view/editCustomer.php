<?php 

require_once '../controller/customerInfo.php';
$customer = fetchCustomer($_GET['c_id']);


 include "nav.php";



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="../controller/updateCustomer.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input value="<?php echo $customer['Name'] ?>" type="text" id="name" name="name"><br>
  <label for="mobileno">Mobile_no:</label><br>
  <input value="<?php echo $customer['Mobile_no'] ?>" type="text" id="mobileno" name="mobileno"><br>
  <label for="email">Email:</label><br>
  <input value="<?php echo $customer['Email'] ?>" type="text" id="email" name="email"><br>
  <label for="discount">Discount (%):</label><br>
  <input value="<?php echo $customer['Discount_percentage'] ?>" type="text" id="discount" name="discount"><br>
  <input type="hidden" name="id" value="<?php echo $_GET['c_id'] ?>">
  <input type="submit" name = "updateCustomer" value="Update">
  <input type="reset"> 
</form> 

</body>
</html>
