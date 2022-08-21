
<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<title></title>
</head>
<?php include('../Control/header.php'); ?>
<body>
<?php 
	$firstnameErrMsg =$passwordErrMsg=$usernameErrMsg= $lastnameErrMsg = $genderErrMsg = $emailErrMsg = $nidErrMsg = $mobileErrMsg = $address1ErrMsg = $sqErrMsg = $countryErrMsg = "";
    $firstname= $lastname= $gender= $email= $nid= $mobile_no= $address= $country= $username= $password= $sq="";
    $registrationStatus="";
	$errorcount=0;
	$count=0;
	
	if ($_SERVER['REQUEST_METHOD'] === "POST")
    {
        if (empty($_POST["firstname"]))
        {
        $firstnameErrMsg  = "First Name is required";
        $errorcount++;
        } 
        else {
            $firstname = $_POST["firstname"];
            if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname))
            {
              $firstnameErrMsg  = "Only letters and white space allowed";
              $errorcount++;
            }
        }

        if (empty($_POST["lastname"]))
        {
        $lastnameErrMsg  = "Last Name is required";
        $errorcount++;
        } 
        else {
            $lastname = $_POST["lastname"];
            if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname))
            {
              $lastnameErrMsg  = "Only letters and white space allowed";
              $errorcount++;
            }
        }

        if (empty($_POST["gender"])) 
        {
            $genderErrMsg = "Gender is required";
            $errorcount++;
        } 
        else 
        {
            $gender = $_POST["gender"];
        }

        if (empty($_POST["email"])) {
            $emailErrMsg = "Email is required";
            $errorcount++;
          } else {
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
              $emailErrMsg = "Invalid email format";
              $errorcount++;
            }
        }

        if(empty(($_POST["nid"]))){
			$nidErrMsg = "National Id Card is required";
			$errorcount++;
		}
        else 
        {
          $nid = $_POST["nid"];
          if (!preg_match("/^[0-9]*$/",$nid)) 
          {
            $nidErrMsg = "Only contains numbers";
            $errorcount++;
          }
        } 

        if(empty(($_POST["mobile_no"]))){
			$mobileErrMsg = "Mobile No. is required";
			$errorcount++;
		}
        else 
        {
           $mobile_no = $_POST["mobile_no"];
          if (!preg_match("/^[0-9]*$/",$mobile_no)) 
          {
            $mobileErrMsg = "Only contains numbers";
            $errorcount++;
          }
        } 

        if(empty(($_POST["address"]))){
			$address1ErrMsg = "Address is required";
			$errorcount++;
		}
        else 
        {
            $address = $_POST["address"];
        }

        if(empty(($_POST["country"]))){
			$countryErrMsg = "Country is required";
			$errorcount++;
		}
        else 
        {
            $country = $_POST["country"];
        }

        if(empty(($_POST["username"]))){
			$usernameErrMsg = "Username is required";
			$errorcount++;
		}
		else
        {
            $username = $_POST["username"];
			if($errorcount==0 and $username!="" and $password!="")
            {
                if(filesize("../data/S.Mana.data.json")>0)
                {
                    $f = fopen("../data/S.Mana.data.json", 'r');
                    $s = fread($f, filesize("../data/S.Mana.data.json"));
                    $data = json_decode($s);
                    for ($x = 0; $x < count($data); $x++) 
                    {
                        if($data[$x]->username===$username)
                        {
                        $usernameErrMsg = "Username is already exists";
						$errorcount++;
						}
					}
				}
			}
		}

        $password=$_POST["password"];
        if(empty($_POST["password"]))
        {
          $passwordErrMsg = "Password is required";
          $errorcount++;
        }
        else if(strlen($password)<8) 
        {
          $passwordErrMsg = "Password must contain 8 character";  
          $errorcount++;
        }
        else  if (!preg_match("/[#|@||%|$ ]*$/",$password))
        {
          $passwordErrMsg = "must contain #,$,%,@";
          $errorcount++;
        }
      

        if(empty(($_POST["sq"]))){
			$sqErrMsg = "Please answer a security question";
			$errorcount++;
		}
        else {
            $sq = $_POST["sq"];
            if (!preg_match("/^[a-zA-Z-' ]*$/",$sq))
            {
              $sqErrMsgg  = "Only letters and white space allowed";
              $errorcount++;
            }
        }
        

        if($errorcount==0)
        {
           
			$registrationStatus="Registration Successful";
		}

		else
        {
			$registrationStatus="Registration failed";
		}	
	}
        
    
?>


<p><span class="error">* required field</span></p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"method="POST" novalidate>

	<fieldset>
    <legend>General Information</legend>
		<label for="fname">First Name:</label>
		<input type="text" name="firstname" id="fname" value="<?php echo $firstname;?>">
		<span class="error">*<?php echo $firstnameErrMsg;?></span>
		<br><br>
        <label for="lname">Last Name:</label>
        <input type="text" name="lastname" id="lname" value="<?php echo $lastname;?>">
		<span class="error">*<?php echo $lastnameErrMsg;?></span>
		<br><br>
		Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
        <span class="error">* <?php echo $genderErrMsg;?></span>
        <br><br>
    </fieldset>

    <fieldset>
	<legend>Contact</legend>
		<label for="email">Email</label>
		<input type="text" name="email" id="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErrMsg;?></span>
		<br><br>
		<label for="nid">National Id:</label>
		<input type="text" name="nid" id="nid" value="<?php echo $nid;?>">
        <span class="error">* <?php echo $nidErrMsg;?></span>
		<br><br>
		<label for="mno">Mobile No</label>
		<input type="text" name="mobile_no" id="mno" value="<?php echo $mobile_no;?>">
        <span class="error">* <?php echo $mobileErrMsg;?></span>
	</fieldset>

    <fieldset>
		<legend>Address</legend>
		<label for="address">Street/House/Road</label>
		<input type="text" name="address" id="address" value="<?php echo $address;?>">
        <span class="error">* <?php echo $address1ErrMsg;?></span>
		<br><br>
		<label for="country">Country</label>
		<select id="country" name="country" value="<?php echo $country;?>">
			<option value="Bangladesh">Bangladesh</option>
			<option value="Saudi Arabia">Saudi Arabia</option>
			<option value="Nepal">Nepal</option>
			<option value="USA">USA</option>
		</select>
        <span class="error">* <?php echo $countryErrMsg;?></span>
	</fieldset>

    <fieldset>
		<legend>Log in Info</legend>
		<label for="username">Username</label>
		<input type="text" name="username" id="username" value="<?php echo $username;?>">
        <span class="error">* <?php echo $usernameErrMsg;?></span>
		<br><br>
		<label for="password">Password</label>
		<input type="password" name="password" id="password" value="<?php echo $password;?>">
        <span class="error">* <?php echo $passwordErrMsg;?></span>
	</fieldset>

	<fieldset>
		<legend>Security Question</legend>
		<label for="sq">Your father's name?</label>
		<input type="text" name="sq" id="sq" value="<?php echo $sq;?>">
        <span class="error">* <?php echo $sqErrMsg;?></span>
	</fieldset>
	<br>
	<input type="Submit" name="submit" value="Registration">
  <input type="reset" value="Reset">
</form>
<center><h3><?php echo $registrationStatus;?><h3></center>  
<form action="../View/S.Mana_login_page_design.php">
	<label >Go to Home page</label>
	<input type="Submit" value="Login">
</form>
<?php require('../Control/footer.php'); ?>
</body>
</html>    
