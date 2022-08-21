
<!DOCTYPE html>  
 <html>  
      <head>  
        <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
        <div class="container" style="width:500px;">              
                <div class="table-responsive"> 
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Product ID</th> 
                               <th>Product Title</th>  
                               <th>Catagory</th>   
                               <th>Sub-Catagory</th> 
                               <th>Quantity</th>   
                               <th>Price</th> 
                               <th>Status</th>    
                          </tr>  
                          <?php   
                          include '../Control/ProductDataController.php' ;

                          $data = loadData();

                          foreach($data as $row)  
                          {  
                              ?>
                               <tr>
                               <td><a href="../Control/Product_details.php?ProductID=<?php echo $row['ProductID'] ?>"><?php echo $row['ProductID'] ?></a></td>
                               <td><?php echo $row['ProductTitle'] ?></td>
                               <td><?php echo $row['catagory'] ?></td>
                               <td><?php echo $row['sub_catagory'] ?></td>
                               <td><?php echo $row['qantity'] ?></td>
                               <td><?php echo $row['price'] ?></td>
                               <td><?php echo $row['status'] ?></td>
                               </tr>
                               <?php 
                          }  
                          ?>  
                     </table> 
                     <a href="Register_product_chk.php" class="btn btn-primary">Add New</a> 
                   </div>
                 </div>
      </body>  
 </html>  
