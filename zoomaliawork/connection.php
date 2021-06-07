<?php

	//connecting to database
	$servername='localhost';
	$username='root';
	$password='';
	$database='Zoomalia';

	$connection=mysqli_connect($servername,$username,$password,$database);

	//check connection
	if(!$connection)
	{
		die("Connection failed, try again later");
	}
	/*else
	{
		echo "Connection is successful";
	}*/

?>