<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
		<link href="./css/donateForm.css" rel="stylesheet" type="text/css">	
		<title>Donate Now!</title>

		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script>
			$(document).ready(function(){
				
				$("form").submit(function(event){
					event.preventDefault(); //disable action and method

					var amount = $("#money").val();
					var fname = $("#form-fname").val();
					var lname = $("#form-lname").val();
					var email = $("#form-email").val();
					var phone = $("#form-phone").val();
					var city = $("#form-city").val();
					var zip = $("#form-zip").val();
					var address = $("#form-address").val();
					var accno = $("#form-acc").val();
					var month = $("#form-month").val();
					var year = $("#form-year").val();
					var submit = $("#form-submit").val(); 

					$(".form-message").load("submit.php", {
						amount:amount,
						fname: fname,
						lname:lname,
						email:email,
						phone:phone,
						city:city,
						zip:zip,
						address:address,
						accno:accno,
						month:month,
						year:year,
						submit: submit
					});

				});
			})
		</script>
	</head>
	<body>
		
			<!--Navigation Bar-->
			<header>
				<div class="logo">
				  <a href="#"><img src="./img/logo.svg" alt="ZOOMALIA"></a>
				</div>

				<nav>
				  <ul>
				    <li><a class="active"href="index.php">HOME</a></li>
				    <li><a href="index.php#aboutUs">ABOUT US</a></li>
				    <li><a href="index.php#service">SERVICES</a></li>
					<li><a href="breedForm.php">CAT INFO</a></li>
				    <li><a href="dogCatalogue.php">DOG CATALOGUE</a></li>
					<li>
						<a href="">ADOPTION</a>
						<ul>
							<li><a href="adoptDog.php">DOG</a></li>
							<li><a href="adoptCat.php">CAT</a></li>
						</ul>
					</li>
				    <li><a href="#">DONATION</a></li>
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
				                <a href="donateSelect.php">MY DONATION</a>
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

			<!--Banner Picture-->
			<img src="./img/dog5donate.jpg" width="100%" height="auto" style="padding-top: 30px">
			<div class="donateTitle">
				<h1 >Donate Now!</h1>
			</div>
			</br></br>

			<form name="payment" action="submit.php" method="POST" id="contactform">

				<div class="form" style="padding-left: 30px;">
					<h3 style="font-weight: normal;">Choose your donation amount:</h3>
					<select id="money" name="amount">						
							<option value="200">Rs 200</option>
							<option value="300">RS 300</option>
							<option value="500">Rs 500</option>
							<option value="1000">Rs 1000</option>
							<option value="1500">Rs 1500</option>
							<option value="2000">Rs 2000</option>
							<option value="3500">Rs 3500</option>
							<option value="5000">Rs 5000</option>						
					</select>
				</div>
				</br>

				<div class="form" align="center">
					<h2>Enter Your Informations(It's Secure)</h2>
					<br><br><br>
					<h4>Name:</h4>
					<input id="form-fname" type="text" name="fname" placeholder="First Name" value="<?php if(isset($_SESSION["userEmail"])) {if(isset($_COOKIE["FirstName"])){ echo $_COOKIE["FirstName"]; }} ?>">
					<input id="form-lname" type="text" name="lname" placeholder="Last Name" value="<?php if(isset($_SESSION["userEmail"])) {if(isset($_COOKIE["LastName"])){ echo $_COOKIE["LastName"]; }} ?>">

					<br><br>

					<h4>Email:</h4>
					<input id="form-email" type="text" name="email" placeholder="email@example.com" value="<?php if(isset($_SESSION["userEmail"])) {if(isset($_COOKIE["Email"])){ echo $_COOKIE["Email"]; }} ?>">
					<br><br>	


					<h4>Phone</h4>
					<input id="form-phone" type="tel" name="phone" pattern="[0-9]{8}">
					<br><br>
				</div>

				<div class="form" align="center">
					<h4>City & Zip:</h4>
					<input id="form-city" type="text" name="city" placeholder="City">
					<input id="form-zip" type="number" name="zip" maxlength="5" size="5"  placeholder="zip code">
					<br><br>
				</div>

				<div class="form" align="center">
					<h4>Address:</h4>
					<input id="form-address" type="text" name="address">
					<br><br>
				</div>

				<div class="form" align="center">
					<h4>Account Number:</h4>
					<!--Card imahes-->
					<input id="form-acc" type="number" name="accno" maxlength="16" size="16"/></br>
					<img src="./img/maestro_normal.jpg" width="55px" height="35px">
					<img src="./img/amex_normal.jpg" width="55px" height="35px">
					<img src="./img/discover_normal.jpg" width="55px" height="35px">
					<img src="./img/mastercard_normal.jpg" width="55px" height="35px">
					<img src="./img/visa_normal.jpg" width="55px" height="35px"></br></br>		
				<h4>Expiration Date:</h4>
					<!--Month-->
					<select id="form-month" name="month" >
						<option>month</option>
						<option value="January">January</option>
						<option value="February">February</option>
						<option value="March">March</option>
						<option value="April">April</option>
						<option value="May">May</option>
						<option value="June">June</option>
						<option value="July">July</option>
						<option value="August">August</option>
						<option value="September">September</option>
						<option value="October">October</option>
						<option value="November">November</option>
						<option value="December">December</option>
					</select>

					<!--Year-->
					<select id="form-year" name="year">
						<option>year</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
						<option value="2028">2028</option>
						<option value="2029">2029</option>
						<option value="2030">2030</option>
					</select>
					<br><br>
				</div>

				<div class="form" align="center">				
					<input id="form-submit" type="submit" name="Submit" /> 
				</div>

				<br><br>
				<p class="form-message" align="center" style="font-size: 14px;" ></p>
			</form> 

			<!--Footer-->
			<section id="footer">
				<div class="container">
					<p>&copy;  2021 Zoomalia All rights reserved</p>
				</div>
		    </section>
			<!--End-->

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


