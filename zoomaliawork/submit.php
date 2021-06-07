<?php
	//linking connection to database
	include('connection.php');
	//validating form using AJAX

	//check if we clicked the button in donate.php
	if (isset($_POST['submit'])) 
	{

		$amount= $_POST['amount'];
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$email= $_POST['email'];
		$phone= $_POST['phone'];
		$city= $_POST['city'];
		$zip= $_POST['zip'];
		$address= $_POST['address'];
		$accno= $_POST['accno'];
		$month= $_POST['month'];
		$year= $_POST['year'];

		$errorEmpty = false;

		$errorEmail = false;

	//check if fields are empty
		if(empty($amount) || empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($city) || empty($zip) || empty($address) || empty($accno) || empty($month) || empty($year))
	 	{

			echo "<h2 style='color:red;' >Please fill all fields!</h2>";

			$errorEmpty = true;
		}
		//validating email
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{

			echo "<h2 style='color:red;' >enter a valid email!</h2>";
			$errorEmail= true;
			}
		else {
			echo "<h2 style='color:green;' >Thank you for your donation! :) </h2>";
			}
	}
	else 
	{
			echo " there was an error";
	}


?>

<script>
	$("#money,#form-fname,#form-lname,#form-email,#form-phone,#form-city,#form-zip,#form-address,#form-acc,#form-month,#form-year").removeClass("input-error");

	var errorEmpty = "<?php echo $errorEmpty; ?>";
	var errorEmail = "<?php echo $errorEmail; ?>";

	if (errorEmpty ==true) {
		$("#money,#form-fname,#form-lname,#form-email,#form-phone,#form-city,#form-zip,#form-address,#form-acc,#form-month,#form-year").addClass("input-error");
	}
	if(errorEmail == true) {
		$("#form-email").addClass("input-error");
	}
	if(errorEmpty ==false && errorEmail == false) {
		$("#money,#form-fname,#form-lname,#form-email,#form-phone,#form-city,#form-zip,#form-address,#form-acc,#form-month,#form-year").val("");
	}


</script>
<?php

	//inserting values into table
	if(!empty($amount) && !empty($fname) && !empty($lname) && !empty($phone) && !empty($city) && !empty($zip) && !empty($address) && !empty($accno) && !empty($month) && !empty($year))
	{
		$sql= "INSERT INTO donation(FirstName,LastName,Email,Phone,City,Zip,Address,AccountNo,ExpiryMonth,ExpiryYear,Amount)
		VALUES ('$fname','$lname','$email','$phone','$city','$zip','$address','$accno','$month','$year','$amount')";
		$query=mysqli_query($connection,$sql);
	}
	

?>
