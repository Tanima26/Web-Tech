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
$nameErr = $passErr = $genderErr = $websiteErr =$pass1Err=$pass2Err=$pass3Err= "";
$name = $pass1 = $pass2 = $pass3 = $gender = $comment = $website = "";
$TEMP="abc1234#$";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
 
       
        if(empty($_POST["pass2"]))
        {
            $pass2Err = "Password is required";

        }
        else if(strlen($_POST["pass2"])<8) 
        {
            $pass2Err = "Password must contain 8 character";  
        }
        else  if (!preg_match("/[#|@||%|$ ]*$/",$_POST["pass2"]))
        {
            $pass2Err = "must contain #,$,%,@";
        }
        if(strcmp($_POST["pass1"],$TEMP)==1)
        {
            $pass2Err="same as current password .please type another";
        }
        if(strcmp($_POST["pass2"],$_POST["pass3"])==0)
        {
            $pass2Err="password dont match";
        }
 
}


?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<fieldset style = "width:50%;">
		<legend><b>CHANGE PASSWORD</b></legend>
            <lable>Current password</lable>
			<input type="password" name="pass1">
			<span class="error">* <?php echo $pass1Err;?></span><br>

             <lable>New password</lable>
			<input type="password" name="pass2">
			<span class="error">* <?php echo $pass2Err;?></span><br>

            <lable>Retype password</lable>
			<input type="password" name="pass3">
			<span class="error">* <?php echo $pass3Err;?></span><br>
	</fieldset><br><br>
 
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $pass1;
echo "<br>";
echo $pass2;
echo "<br>";
echo $pass3;
echo "<br>";

?>

</body>
</html>