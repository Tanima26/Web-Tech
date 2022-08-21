<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
fieldset {
  background-color: #eeeeee;
}

legend {
  background-color: gray;
  color: white;
  padding: 5px 10px;
}

input {
  margin: 5px;
}
</style>
</head>
<body>  

<?php

$cookie_name="loginCheck"; 
$cookie_value="1";   
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
if (!isset($_COOKIE['count'])) { 
  echo "Welcome! This is the first time you have viewed this page today."; 
  $cookie = 1;
  setcookie("count", $cookie);
}
else
{
  $cookie = ++$_COOKIE['count'];
  setcookie("count", $cookie); 
  echo "You have viewed this page today ".$_COOKIE['count']." times.";
};

?>

<?php include('../Control/header.php'); ?>
<center>
<fieldset style = "width:50%;">
<h4 style="text-align:right;"><a href="../View/registretion.php">Sign-Up</a></h4>
<legend><B><h3>Sales Manager LOGIN</h3></B></legend>
<p style="text-align:left;"><span class="error">* required field</span></p>
<form action="../Control/S.Mana_login_chk.php" method="post">  
  UserName: <input type="text" name="uname" value="" id="name" value="" onkeyup="myFunction()">
  <span class="error">*</span>
  <br><br>
  Password:  <input type="password" name="pass" value=""  id="pass"  value="" onkeyup="myFunction()">
  <span class="error">*</span>
  <br><br>
  
  <button id="btn" name="Submit" value="Submit" disabled >Submit</button>
  <a href="../View/Forget_pass.php">Forget password</a>

</form>
</fieldset>
</center>
<script>
function myFunction() {
  var x = document.getElementById("name").value;
  var y = document.getElementById("pass").value;
  
  if(x=="" || y==""){
  	document.getElementById("btn").disabled = true;
  }
  else{
 	document.getElementById("btn").disabled = false;
  }
  
}
</script>

<?php require('../Control/footer.php'); ?>
</body>
</html>