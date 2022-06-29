<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $passErr = $genderErr = $websiteErr = "";
$name = $pass = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  }
   else {
      $name = $_POST["name"];
       // check if name only contains letters and whitespace
       if (!preg_match("/^[a-z-A-Z-0-9' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
       }
        if ( strlen($name)<2) {
          $nameErr = "User name must contain 2 character";
       }
  }
  $pass=$_POST["pass"];
  if(empty($_POST["pass"]))
  {
    $passErr = "Password is required";

  }
  else if(strlen($pass)<8) 
  {
    $passErr = "Password must contain 8 character";  
  }
  else  if (!preg_match("/[#|@||%|$ ]*$/",$pass))
   {
    $passErr = "must contain #,$,%,@";
   }
 
}


?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<fieldset style = "width:30%;">
		<legend><b>LOG IN</b></legend>
            <lable>User Name</lable>
			<input type="text" name="name">
			<span class="error">* <?php echo $nameErr;?></span><br>
            <lable> Password </lable>
            <input type="pasword" name="pass">
			<span class="error">* <?php echo $passErr;?></span>
	</fieldset><br><br>
 
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $pass;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>