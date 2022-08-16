<?php 

require_once '../model/model.php';

if (deleteCustomer($_GET['id'])) {
    header('Location: ../view/showAllCustomer.php');
}

 ?>