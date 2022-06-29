<!DOCTYPE html>
<html>
<head>
<style>
.error{color: #FF0000;}
</style>
</head>
<body>

<?php

// define variables and set to empty values
$name = $email = $DOB = $gender = $degree = $BG ="";
$nameErr = $emailErr = $DOBErr = $genderErr = $degreeErr = $BGErr ="";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  //name validation check
  $name=$_POST["name"];
  if (empty($_POST["name"])) 
  {
    $nameErr = "Name is required";
  } 
  else if(!(($name[0]>='a'&&$name[0]<='z') || ($name[0]>='A'&&$name[0]<='Z')))
  { 
    $nameErr = " Must start with a letter";
  }
  else if (!preg_match("/^[a-z-A-Z-0-9' ]*$/",$name)) 
  {
    $nameErr = "Only letters and white space allowed";
  }
  else 
  {
    $name = $_POST["name"];
  }
  
  //email validation check
  if (empty($_POST["email"]))
  {
    $emailErr = "Email is required";
  } 
  else 
  {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Invalid email format";
    }
  }

  //DOB validation
  if(empty($POST["DOB"]))
  {
  	$DOBErr = "Date Of Birth is required";
  }
  else
  {
   $DOB = $_POST["DOB"];

  }

  //Gender Validation
  if (empty($_POST["gender"])) 
  {
    $genderErr = "At least one of them must be selected";
  } 
  else 
  {
    $gender = $_POST["gender"];
  }

  //Degree Validation
  if(empty($_POST["degree"]))
  {
  	$degreeErr = "Must be selected";
  }
  if(!empty($_POST["degree"]))
  {
  	$checked_count = count($_POST["degree"]);
    if($checked_count<2)
    {
    $degreeErr = "At least two of them must be selected";
	}
  }
  else{
  	$degree = $_POST["degree"];
  }

  //Blood Group Validation
  if (empty($_POST["BG"])) 
  {
    $BGErr = "Must be selected";
  } 
  else 
  {
    $BG = $_POST["BG"];
  }

}
?>

<!-- Html -->
<h2>Designing HTML form using PHP with validation of user inputs</h2>
<form method="post" action="php form validation.php">

<!-- NAME -->
<filedset>
<legend>NAME</legend>
<input type="text" name="name">
<span class="error">*<?php echo $nameErr; ?></span><br>
</filedset>

<!-- EMAIL -->
<filedset>
<legend>EMAIL</legend>
<input type="text" name="eemail" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
</filedset>

<!-- DOB -->
<filedset>
<legend>Date Of Birth</legend>
<input type="date" name="dob">
<span class="error">* <?php echo $DOBErr;?></span>
<br><br>
</filedset>

<!-- GENDER -->
<fieldset>
<legend>Gender</legend>	
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
 <span class="error">* <?php echo $genderErr;?></span>
 <br><br>
</fieldset>

<!-- DEGREE -->
<fieldset>
<legend>DEGREE</legend>
<input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="ssc") echo "checked";?> value="ssc">SSC
<input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="hsc") echo "checked";?> value="hsc">HSC
<input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="bsc") echo "checked";?> value="bsc">BSc
<input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="msc") echo "checked";?> value="msc">MSc
<span class="error">* <?php echo $degreeErr;?></span>
<br><br>
</fieldset>

<!-- Blood group -->
<fieldset>
<legend>Blood Group</legend>
<select name="aname">
    <option value="Select">Select--</option>
    <option value="A+" <?php if (isset($BG) && $BG=="A+") echo "selected";?>>A+</option>
    <option value="A-" <?php if (isset($BG) && $BG=="A-") echo "selected";?>>A-</option>
    <option value="B+" <?php if (isset($BG) && $BG=="B+") echo "selected";?>>B+</option>
    <option value="B-" <?php if (isset($BG) && $BG=="B-") echo "selected";?>>B-</option>
    <option value="AB+" <?php if (isset($BG) && $BG=="AB+") echo "selected";?>>AB+</option>
    <option value="AB-" <?php if (isset($BG) && $BG=="AB-") echo "selected";?>>AB-</option>
    <option value="O+" <?php if (isset($BG) && $BG=="O+") echo "selected";?>>O+</option>
    <option value="O-" <?php if (isset($BG) && $BG=="O-") echo "selected";?>>O-</option>
</select>
<span class="error">* <?php echo $BGErr;?></span>
<br><br>
</fieldset>


<input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $DOB;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;
echo "<br>";
echo $BG;
?>

</body>
</html>