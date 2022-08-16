<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>  
		function validateform(){  
		var name=document.myform.name.value;  
		var mobileno=document.myform.mobileno.value;  
		var mobileno=document.myform.email.value;
		var mobileno=document.myform.discount.value;
		  
		if (name==null || name==""){  
		  alert("Name can't be blank");  
		  return false;  
		}else if(mobileno==null || mobileno==""){  
		  alert("Mbileno can't be blank");  
		  return false;  
		  }  
		}
		function checkName() {
			if (document.getElementById("name").value == "") {
			  	document.getElementById("nameErr").innerHTML = "Name can't be blank";
			  	document.getElementById("name").style.borderColor = "red";
			}else{
			  	document.getElementById("nameErr").innerHTML = "";
			  	document.getElementById("name").style.borderColor = "black";

			}
			
        }
        function checkMobileno(){
        	if (document.getElementById("mobileno").value == "") {
			  	document.getElementById("mobilenoErr").innerHTML = "Mobile no can't be blank";
			  	document.getElementById("mobileno").style.borderColor = "red";
			}else{
				document.getElementById("mobilenoErr").innerHTML = "";
			  	document.getElementById("mobileno").style.borderColor = "black";
			}
        }

		function checkEmail(){
        	if (document.getElementById("email").value == "") {
			  	document.getElementById("emailErr").innerHTML = "Email can't be blank";
			  	document.getElementById("email").style.borderColor = "red";
			}else{
				document.getElementById("emailErr").innerHTML = "";
			  	document.getElementById("email").style.borderColor = "black";
			}
        }

		function checkDiscount(){
        	if (document.getElementById("discount").value == "") {
			  	document.getElementById("discountErr").innerHTML = "Discount (%) can't be blank";
			  	document.getElementById("discount").style.borderColor = "red";
			}else{
				document.getElementById("discountErr").innerHTML = "";
			  	document.getElementById("discount").style.borderColor = "black";
			}
        }
  

</script>  
</head>

<body>

	<?php 
	include "../view/nav.php";

     ?>

	<form name="myform" action="../controller/createCustomer.php" method="POST" enctype="multipart/form-data" onsubmit="return validateform()" >
	<label for="name">Name:</label><br>
	<input type="text" name="name" id="name" onblur="checkName()" onkeyup="checkName()">
    <p id="nameErr"></p><br/>  
	<label for="mobileno">Mobile_no:</label><br>
	<input type="text" id="mobileno" name="mobileno" onblur="checkMobileno()" onkeyup="checkMobileno()">
	<p id="mobilenoErr"></p><br>
	<label for="email">Email:</label><br>
	<input type="text" id="email" name="email" onblur="checkEmail()" onkeyup="checkEmail()">
	<p id="emailErr"></p><br>
	<label for="discount">Discount (%):</label><br>
	<input type="text" id="discount" name="discount" onblur="checkDiscount()" onkeyup="checkDiscount()">
	<p id="discountErr"></p><br>
	<input type="submit" name = "addCustomer" value="Add">
	<input type="reset"> 
</form>  
</body>
</html>