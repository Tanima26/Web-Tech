<?php 
    session_start();
    if (isset($_SESSION['uname'])) {
        echo "<h1>Welcome Sales Manager--- ". $_SESSION['uname']. "</h1>";
        
    }else{
        header("location: ../View/S.Mana_login_page_design.php");
    }

?>

 
<html>
<head>
</head>
<body>

<table>
<tr>
     <th><h2>[____TO-DO____]</h2></th>
</tr>
<br>
<tr>
    <td><h4><a href="../View/Register_product_chk.php"> Register A New Product</a></h4></td>
</tr>
<br>
<tr>
    <td><h4><a href="../View/Products_list.php">Show the list of the products</a></h4></td>
</tr>
<br>
<tr>
    <td><h4><a href="../View/addCustomer.php">Register A Discounted Customer</a></h4></td>
</tr>
<br>
<tr>
    <td><h4><a href="../Control/S.Mana_Logout.php">Logout</a></h4></td>
</tr>

</table>

</body>
</html>





