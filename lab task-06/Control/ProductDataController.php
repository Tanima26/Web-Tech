<?php  

function readData(){
    $data = file_get_contents('../data/Product_data.json');  
    $data = json_decode($data, true); 
    return $data;
}
function storeData($data){

    $current_data = file_get_contents('../data/Product_data.json');  
    $array_data = json_decode($current_data, true);  
     
    $array_data[] = $data;  
    $final_data = json_encode($array_data);  
    return $final_data;
}

function loadData(){
return readData();

}
function addData($data){
    $final_data = storeData($data);
    if(file_put_contents('../data/Product_data.json', $final_data))  
        {  
            header("location:../View/Products_list.php");
        }  

}
function ProductsInfo($data){

$all_data = readData();
    foreach($all_data as $row)  {
        if ($row['ProductID']==$data) {
            $d_data = array(
                'ProductID' => $row['ProductID'],
                'ProductTitle' => $row['ProductTitle'],
                'catagory' => $row['catagory'],
                'sub_catagory' => $row['sub_catagory'],
                'qantity' => $row['qantity'],
                'price' => $row['price'],
                'status' => $row['status'],
            );
        return $d_data;
        }
    }

}

?>