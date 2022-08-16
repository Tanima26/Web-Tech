<?php  
require_once '../controller/customerInfo.php';

$customers = fetchAllCustomer();


    include "nav.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<thead>
		<tr>
        <th>Name</th>
		<th>Mobile_no</th>
		<th>Email</th>
		<th>Discount_percentage</th>
		<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($customers as $i => $customer): ?>
			<tr>
				<td><a href="../view/showCustomer.php?c_id=<?php echo $customer['c_id'] ?>"><?php echo $customer['Name'] ?></a></td>
				<td><?php echo $customer['Mobile_no'] ?></td>
				<td><?php echo $customer['Email'] ?></td>
				<td><?php echo $customer['Discount_percentage'] ?></td>
				<td><a href="../view/editCustomer.php?c_id=<?php echo $customer['c_id'] ?>">Edit</a>&nbsp<a href="../controller/deleteCustomer.php?id=<?php echo $customer['c_id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>