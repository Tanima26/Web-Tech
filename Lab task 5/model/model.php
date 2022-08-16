<?php 

require_once '../model/db_connect.php';


function showAllCustomers(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `customer_info` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showCustome($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `customer_info` where c_id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchUser($name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `customer_info` WHERE Name LIKE '%$name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addCustomer($data){
	$conn = db_conn();
    $selectQuery = "INSERT into customer_info (Name, Mobile_no, Email, Discount_percentage)
VALUES (:name, :mobileno, :email, :discount)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':mobileno' => $data['mobileno'],
        	':email' => $data['email'],
        	':discount' => $data['discount']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateCustomer($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE customer_info set Name = ?, Mobile_no = ?, Email = ? where c_id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['mobileno'], $data['email'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteCustomer($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `customer_info` WHERE `c_id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}