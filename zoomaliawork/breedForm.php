<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/veterinary.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/breedCat.css">
    <title>CAT CATALOGUE || ZOOMALIA</title>

</head>
<body style="background-color:#e6e1f0;">

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
            <li><a href="breedForm.php">CAT INFO</a></li>
            <li><a href="dogCatalogue.php">DOG CATALOGUE</a></li>
            <li>
                <a href="">ADOPTION</a>
                <ul>
                    <li><a href="adoptDog.php">DOG</a></li>
                    <li><a href="adoptCat.php">CAT</a></li>
                </ul>
            </li>
            <li><a href="donate.php">DONATION</a></li>
            <li><a href="veterinary.php">VETERINARY</a></li>
            <li><a href="#contactUs">CONTACT US</a></li>
            <li>
                <a style="color: white;"><i class="fa fa-user" aria-hidden="true" style="font-size: 25px;"></i></a>
                <ul>
                  <li>
                    <!--Hide/show links-->
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

    <!--End Of Navigation Bar-->


	<div class="form" align="center">

		<h1>Find Cat Breed </h1>

		<form action="breedClient.php" method="GET">

		<h5>Enter Breed Name:</h5>

		<input type="text" name="Name" placeholder="Breed">

		<input id="form-submit" type="submit" name="Search" /> 

		</form>

	</div>

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

