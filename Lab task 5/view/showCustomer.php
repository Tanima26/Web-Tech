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

<table>
	<tr>
		<th>Name</th>
		<th>Mobile_no</th>
		<th>Email</th>
		<th>Discount_percentage</th>
	</tr>
	<tr>
		<td><a href="../view/showCustomer.php?c_id=<?php echo $customer['c_id'] ?>"><?php echo $customer['Name'] ?></a></td>
		<td><?php echo $customer['Mobile_no'] ?></td>
		<td><?php echo $customer['Email'] ?></td>
		<td><?php echo $customer['Discount_percentage'] ?></td>
	</tr>

</table>


</body>
</html>