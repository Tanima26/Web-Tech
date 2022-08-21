<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
.right {color: greenyellow;}
</style>
<title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<body>

<?php
       $newpasswordErr=$retypenewpasswordErr="";
       $pass= $repass="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pass=$_POST["NewPassword"];
            if(empty($_POST["NewPassword"])) {
                $newpasswordErr = "Please Fill Up The Block";
            }
            else if(strlen($pass)<8) 
            {
              $newpasswordErr = "Password must contain 8 character";  
            }

            if(empty($_POST["RetypeNewPassword"])) {
                $retypenewpasswordErr = "Please Fill Up The Block";
            }
            elseif($_POST["RetypeNewPassword"]!=$_POST["NewPassword"]){
                $retypenewpasswordErr = "Passwords don't match";
            }
    }
?>
<?php
           if(isset($_POST["Submit"]))  
           {
             $msg = "password changed successfully"; 
           }  
?>
<div class="container" style="width:500px;"> 

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
    <legend>Change password</legend>   
    <span class="right">
    <?php
        if (isset($msg)) {
            echo $msg;
        }
    ?>    
    </span>
    
    <br>
    New Password: <span class="error">* <?php echo $newpasswordErr;?></span>
    <input type="password" name="NewPassword" value="<?php echo $pass;?>" class="form-control">
    <br><br>  
    Retype New Password: <span class="error">* <?php echo $retypenewpasswordErr;?></span>
    <input type="password" name="RetypeNewPassword" value="<?php echo $repass;?>" class="form-control">
    <br><br>  
    <input type="submit" name="Submit" value="Change Password"  class="btn btn-info" />
    <a href="../View/S.Mana_login_page_design.php" class="btn btn-info">Login Again</a>
    </form>
    </div> 

</body>
</html>
