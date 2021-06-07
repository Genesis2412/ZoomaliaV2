<?php
	session_start();
	
	//unsetting the session
	unset($_SESSION['adminName']);

	//redirecting to homepage
	echo ("<script type='text/javaScript'>
	            window.alert('You Have Been Logged Out Successfully');
	            window.location.href='adminLogin.php';
	        </script>");
?>