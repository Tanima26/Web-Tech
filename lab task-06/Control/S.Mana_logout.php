<?php 

	session_start();

	if (isset($_SESSION['uname'])) {
		session_destroy();
		header("location: ../View/S.Mana_login_page_design.php");
	}
	else{
		header("location: ../View/S.Mana_login_page_design.php");
	}

 ?>