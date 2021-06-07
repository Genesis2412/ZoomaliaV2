<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Your Donation</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/donateCheck.css">
</head>
	<body>
		<!--Navigation Bar-->
		<header>
		    <div class="logo">
		      <a href="#"><img src="./img/logo.svg" alt="ZOOMALIA"></a>
		    </div>

		    <nav>
		      <ul>
		        <li><a class="active" href="index.php">HOME</a></li>
		        <li><a href="index.php#aboutUs">ABOUT US</a></li>
		        <li><a href="index.php#service">SERVICES</a></li>
		        <li><a href="dogCat_adopt.php">ADOPTION</a></li>
		        <li><a href="donate.php">DONATION</a></li>
		        <li><a href="veterinary.php">VETERINARY</a></li>
		        <li><a href="index.php#contactUs">CONTACT US</a></li>
		        <li>
		            <a style="color: white;"><i class="fa fa-user" aria-hidden="true" style="font-size: 25px;"></i></a>
		            <ul>
		              <li>
		              	<!--Show/hide links-->
		                <?php if(isset($_SESSION['userEmail'])): ?>
		                    <a href="logout.php">LOGOUT</a>
		                <?php else: ?>
		                    <a href="login.php">LOGIN</a>
		                <?php endif; ?>
		              </li>
		              <li>
		                <?php if(!isset($_SESSION['userEmail'])): ?>
		                <a href="register.php">REGISTER</a>
		                <?php endif; ?>
		              </li>
		              <?php if(isset($_SESSION['userEmail'])): ?>
		                <li>
		                    <a href="#">MY DONATION</a>
		                </li>
		              <?php endif; ?>
		            </ul>
		        </li>
		      </ul>
		    </nav>

		    <!--Hamburger-->
		    <div class="menu-toggle">
		      <i class="fa fa-bars" aria-hidden="true"></i>
		    </div>

		</header>
	    <!--End Of Navigation Bar-->

		<div class="hero">
			<?php
				//Using PDO
				$servername = "localhost";
				$username = "root";
				$password = "";

				//checking if user is logged in
				if(isset($_SESSION['userEmail']))
				    {
				    	$emailS=$_SESSION['userEmail'];
				    }

				try {
				    $conn = new PDO("mysql:host=$servername;dbname=Zoomalia", $username, $password);
				    // set the PDO error mode to exception
				    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				    //echo "Connected successfully";
				    }
				catch(PDOException $e)
				    {
				    echo "Connection failed: " . $e->getMessage();
				    }
				    
				    $res = $conn->prepare("SELECT * FROM donation WHERE Email='$emailS';");
			        $res->execute();

			        $row = $res->fetch(PDO::FETCH_ASSOC);	
			        if ($res->rowCount() > 0)
			        {
			        
			?>	
						<!--Displaying data in a table-->
			        	<div class="tableBox">
			        		<img src="./img/donatePic.jpg">
			        		<h3 style="text-decoration: underline;">HERE ARE YOUR DETAILS ABOUT DONATION:</h3>	
			        		<br><br>	
			        		<table>
						        <th>First Name</th>
						        <th>Last Name</th>
					         	<th>Email</th>
					         	<th>Phone</th>
					        	<th>City</th>
					        	<th>Zip</th>
						        <th>Address</th>
						        <th>Account Number</th>
					         	<th>Expiry Month</th>
					         	<th>Expiry Year</th>
					         	<th>Amount</th>
					         	<th>Date/Time Donated</th>
						        <tr>      
				    				<td><?php echo $row['FirstName']?> </td>
									<td><?php echo $row['LastName']?> </td>
									<td><?php echo $row['Email']?> </td>
									<td><?php echo $row['Phone']?> </td>
									<td><?php echo $row['City']?> </td>
									<td><?php echo $row['Zip']?> </td>
									<td><?php echo $row['Address']?> </td>
									<td><?php echo $row['AccountNo']?> </td>
									<td><?php echo $row['ExpiryMonth']?> </td>
									<td><?php echo $row['ExpiryYear']?> </td>
									<td><?php echo $row['Amount']?> </td>
									<td><?php echo $row['DateDone']?> </td>
						<br><br>
							<h3 id="thanks">THANK YOU ONCE AGAIN FOR YOU KIND CONTRIBUTION</h3>
						</div>		        
			<?php   
					echo "</tr>";
					echo "</table>";     
		        	}
		        	else{

			?>
						<!--If no donation-->
				    	<div id="error"> 
				       		<img src="./img/sorry.png">
				       	</div>
				       	<div id="message">			   
			       			<h3>YOU DID NOT DO ANY DONATION<h3>
			       			<br>
			       			<h3><a href="donate.php">DONATE HERE</a><h3>
			       			<br>
				       		<h3>THANK YOU</h3>
				       	</div>
		    <?php
		        	} 
			?>
		</div>

		<!--Navigation Bar Javascript-->
	    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
			<script type="text/javascript">
				$(document).ready(function()
				{
				  $('.menu-toggle').click(function()
				  {
				    $('nav').toggleClass('active')
				  })      
				})
			</script>
	    <!--End Of Navigation Bar Javascript-->

	</body>
</html>