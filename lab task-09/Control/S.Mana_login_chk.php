<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<?php

session_start();
if(isset($_POST["Submit"]))
{
    $data2 = file_get_contents("../data/S.Mana_data.json");
    $mydata2 = json_decode($data2,true);
    foreach($mydata2 as $key=>$value )
    {
        if($_POST["uname"]==$value["username"] && $_POST["pass"]==$value["password"])
        {
            $_SESSION["uname"]=$_POST["uname"];
            $_SESSION["pass"]=$_POST["pass"];
            header("location: ../View/S.Mana.php");
        }
        else{
            $msg = "username or password is invalid";
        }
    }
}
?>
 <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <span class="error">*<?php
        if (isset($msg)) {
            echo $msg;
        }
    ?></span>
    <a href="../View/S.Mana_login_page_design.php">Try Again</a>
    <br>
</form>
</body>
</html>