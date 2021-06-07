<?php
	include('connection.php');
?>


<?php

		//get values from form
		$fName=mysqli_real_escape_string($connection,$_POST['fName']);
		$lName=mysqli_real_escape_string($connection,$_POST['lName']);
		$email=mysqli_real_escape_string($connection,$_POST['email']);
		$pwd1=mysqli_real_escape_string($connection,$_POST['pwd1']);
		//encrytion
		$protectPass=md5($pwd1);

		//inserting into database
		$insert="INSERT INTO users(FirstName,LastName,Email,Password)VALUES('$fName','$lName','$email','$protectPass');";
		$query=mysqli_query($connection,$insert);
		
		//create cookies
		setcookie("Email",$email,time()+(10*365*24*60));
	    setcookie("FirstName",$fName,time()+(10*365*24*60));
	    setcookie("LastName",$lName,time()+(10*365*24*60));

	    //redirecting to index if inserted successfully
		if($query)
		{
			echo ("<script type='text/javaScript'>
	            		window.alert('Account created Successfully,Please Login');
	            		window.location.href='login.php';
	        		</script>");
		}
?>

	