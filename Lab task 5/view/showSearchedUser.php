
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table,td,th{
			border:1px solid black;
		}
	</style>
</head>
<body>

<?php 
    include "nav.php";

?>

<table>
	<thead>
		<tr>
			<th>User_id</th>
			<th>User_name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($allSearchedUsers as $i => $user): ?>
			<tr>
				<td><a href="../view/showCustomer.php?id=<?php echo $user['c_id'] ?>"><?php echo $user['c_id'] ?></a></td>
				<td><?php echo $user['Name'] ?></td>
				<td><a href="../view/editCustomer.php?id=<?php echo $user['c_id'] ?>">Edit</a>&nbsp<a href="../controller/deleteCustomer.php?id=<?php echo $user['c_id'] ?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>