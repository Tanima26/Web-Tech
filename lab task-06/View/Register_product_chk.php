
<!DOCTYPE HTML>  
<html>
<head>
<style>.error {color: #FF0000;}</style>
<title>Register A New Product in Website</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<body>

<?php
include '../Control/ProductDataController.php';
 


$P_IDErr = $P_TitleErr = $P_catagoryErr = $P_subcatagoryErr = $P_qantityErr = $P_priceErr = $P_statusErr = $P_DescriptionErr ="";
$ProductID = $ProductTitle = $catagory = $sub_catagory = $qantity = $price = $status = $description ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["ProductID"])) 
  {
    $P_IDErr = "ProductID is required";
  } 
  else 
  {
    $ProductID = $_POST["ProductID"];
    if (!preg_match("/^[a-zA-Z]/",$ProductID)) 
    {
      $P_IDErr = "Start with a letter";
    }
    if (!preg_match("/[0-9]$/",$ProductID)) 
    {
      $P_IDErr = "end with a number";
    }
  }

  if (empty($_POST["ProductTitle"])) 
  {
    $P_TitleErr = "ProductTitle is required";
  } 
  else 
  {
    $ProductTitle = $_POST["ProductTitle"];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$ProductTitle)) 
    {
      $P_TitleErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["catagory"])) 
  {
    $P_catagoryErr = "Catagory is required";
  }
  else 
  {
    $catagory = $_POST["catagory"];
    if (str_word_count($catagory)<1) 
    {
      $P_catagoryErr = "Catagory must contain 1 word"; 
    }
  } 

  if (empty($_POST["sub_catagory"])) {
    $P_subcatagoryErr = "Sub_catagory is required";
  } else {
    $sub_catagory = $_POST["sub_catagory"];
  }

  if (empty($_POST["qantity"])) 
  {
    $P_qantityErr = "Qantity is required";
  }
  else 
  {
    $qantity = $_POST["qantity"];
    if (!preg_match("/^[0-9]*$/",$qantity)) 
    {
      $P_qantityErr = "Only contains numbers";
    }
  } 

  if (empty($_POST["price"])) 
  {
    $P_priceErr = "Price is required";
  }
  else 
  {
    $price = $_POST["price"];
    if (!preg_match("/^[0-9]*$/",$price)) 
    {
      $P_priceErr = "Only contains numbers";
    }
  } 

  if (empty($_POST["status"]))
  {
    $P_statusErr = "Product's Status is required";
  } 
  else {
    $status = $_POST["status"];
  }

  if (empty($_POST["description"])) {
    $P_DescriptionErr = "Product's description is required";
  } 
  else {
    $description = $_POST["description"];

    $message = '';  
$error = '';  
if(isset($_POST["Submit"]))  
{  
     
          if(file_exists('../data/Product_data.json'))  
          {  
               $extra = array(  
                    'ProductID'         =>     $_POST['ProductID'],  
                    'ProductTitle'      =>     $_POST["ProductTitle"],  
                    'catagory'          =>     $_POST["catagory"],  
                    'sub_catagory'      =>     $_POST["sub_catagory"],  
                    'qantity'           =>     $_POST["qantity"], 
                    'price'             =>     $_POST["price"] , 
                    'status'            =>     $_POST["status"]  
               ); 
               addData($extra);
          }  
          else  
          {  
               $error = 'JSON File not exits';  
          }  
}  
  }
}
?>
<br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Register A New Product</h3><br />                 
                  <p><span class="error">* required field</span></p>

                   <form method="post">  
        
                     <br /> 
                     <label>Product's ID</label><span class="error">* <?php echo $P_IDErr;?></span>  
                     <input type="text" name="ProductID" value="<?php echo $ProductID;?>" class="form-control">
                      <br /> 
                     <label>Product's Title</label><span class="error">* <?php echo $P_TitleErr;?></span>
                     <input type="text" name = "ProductTitle" value="<?php echo $ProductTitle;?>" class="form-control" />
                     <br />
                     <label>Product's Catagory</label><span class="error">* <?php echo $P_catagoryErr;?></span>
                     <input type="text" name = "catagory" value="<?php echo $catagory;?>" class="form-control" />
                     <br />
                     <label>Product's Sub-Catagory</label><span class="error">* <?php echo $P_subcatagoryErr;?></span>
                     <input type="text" name = "sub_catagory" value="<?php echo $sub_catagory;?>" class="form-control" />
                     <br />
                     <label>Qantity</label><span class="error">* <?php echo $P_qantityErr;?></span>
                     <input type="text" name = "qantity" value="<?php echo $qantity;?>" class="form-control" />
                     <br />
                     <label>Price of the product</label><span class="error">* <?php echo $P_priceErr;?></span>
                     <input type="text" name = "price" value="<?php echo $price;?>" class="form-control" />
                     <br />
                     <label>Status</label><span class="error">* <?php echo $P_statusErr;?></span>
                     <input type="text" name = "status" value="<?php echo $status;?>" class="form-control" />
                     <br />
                     <label>Description</label><span class="error">* <?php echo $P_DescriptionErr;?></span><br />
                     <textarea name="description" rows="5" cols="40"><?php echo $description;?></textarea>
                     <br />


                    <input type="submit" name="Submit" value="Append" class="btn btn-info" /><br />                      
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  




