
<?php

	include('connection.php');

		//if fName is set
		if(isset($_POST['fName']))
		{
			$fName=mysqli_real_escape_string($connection,$_POST['fName']);
			$lName=mysqli_real_escape_string($connection,$_POST['lName']);
			$pNumber=mysqli_real_escape_string($connection,$_POST['pNumber']);
			$email=mysqli_real_escape_string($connection,$_POST['email']);		
			$message=mysqli_real_escape_string($connection,$_POST['message']);

			//inserting into database
			$insert="INSERT INTO messageinfo(FirstName, LastName, PhoneNo, Email, Message) VALUES ('$fName', '$lName', '$pNumber', '$email', '$message');";
			$query=mysqli_query($connection,$insert);

			//checking if message is saved in database
			if($query)
			{
				echo "Message Saved";
			}
		}
?>


		
