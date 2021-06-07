<?php
	//linking connection to database
	include('connection.php');

	//validating email
	$email=$_POST['email'];
	$sql="SELECT * FROM users WHERE Email='$email';";
	$result=mysqli_query($connection,$sql);
	if(mysqli_num_rows($result)>0){

		echo "Email already exists!";

	}
	else{

		echo "<p style='color:green;'>Email is valid<p>";

	}
?>