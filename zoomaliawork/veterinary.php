<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Veterinary Services</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/veterinary.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
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
            <li><a href="#">VETERINARY</a></li>
            <li><a href="index.php#contactUs">CONTACT US</a></li>
            <li>
                <a style="color: white;"><i class="fa fa-user" aria-hidden="true" style="font-size: 25px;"></i></a>
                <ul>
                  <li>
                    <!--Show/Hide links-->
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


    <!--Banner-->
    <div id="bannerPic">
        <img src="./img/dog6donatecopy.jpg">
    </div>

    <!--FirstSection-->
    <section class="photo">
        <h1>Veterinary Services </h1><br>
            <div id="photo_image">
                <img src="./img/dog1donate.jpg"/>
            </div>

            <div id="photo_content">
                Our team of veterinary surgeons provide non-stop veterinary treatment and assistance to your pet 7 days a week in our clinic situated at Curepipe.
                </br>
                Our vets are also available for afterhours emergency cases and house visits.
                </br>
                Zoomalia provide sterilisations, 
                vaccinations and treatment for sick and injured animals from Monday to Saturday 9am to 4pm. Our clinic is closed on Sundays and on public holidays.</br>
                Please contact us for an appointment.
            </div>

            <div class="getBranch">
                <h5>Get Your Zoomalia Vet Clinic</h5>
                <form id="setCode">
                    <input type="text" id="getPlace" name="nameCode" placeholder="Enter Country ISO Code">
                    <input type="button" id="getPlaceBtn" value="Get Clinic">
                </form>
                <div id="success_message"></div>
            <div>
                

            <div class="follow"><label><b>Get Social:  </b></label>
                <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.pinterest.com" target="_blank"><i class="fa fa-pinterest"></i></a>
                <a href="https://www.fa-snapchat.com" target="_blank"><i class="fa fa-snapchat"></i></a>
            </div>
    </div>
    </section>

    <section class="sterilisation">
        <div id="photo_image1">
            <img src="./img/dog2donate.jpg"/>
        </div>

        <div id="photo1_content">
            <h5>Sterilisation</h5><br>
            Sterilisation Fees Dogs: Rs 1,000/dog</br>
            Sterilisation Fees Cats: Rs 600 for 1 cat and Rs1,000 for 2 cats (Rs500 per cat)</br>
            Vaccination Fees: Rs 300 </br></br>
            Zoomalia also provides subsidised low cost sterilisations to pets of those who come from financially disadvantaged households.</br>
            Although we do ask for minimum donations, NO animal will ever be refused sterilisation because of lack of funds.</br>
            Please contact the Zoomalia shelter to speak to receptionist for financial assistance information.
        </div>
    </section>   

    <section class="transportation">
        <div id="photo_image2">
            <img src="./img/dogdonate.jpg"/> 
        </div>

        <div id="photo2_content">
            <h5>Transportation Services:</h5><br>
            For sterilisation only Zoomalia offers a limited transportation service on certain working days for those pet owners who do not have their own vehicles.</br>
            As this is a popular service, please call the shelter to make an appointment. First come, first served.
            We ask for a minimum “fuel” donation depending on distance from shelter however NO pet owner wanting to sterilise their animals will be turned away for lack of funds.
            </br>

            Please speak to receptionist for rates.

            All payments for services and transportation should be paid at reception to receive an official PAWS receipt.
        </div>
    </section>

    <section class="otherServices">
        <div id="photo_image3">  
            <img src="./img/dog7donate.jpg"/>
        </div>

        <div id="photo3_content">
            You can contribute to our shelter in any form(donate food,toys,cat beds etc).</br> Every contribution matters to us.
            </br></br>
            <h5>Other services:</h5> 
            You are travelling abroad and don't know with whom or where to leave your pets?</br>
            Zoomalia is here for you.</br>Contact us asap.
        </div>
    </section>


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

    <!--Form submission Ajax-->
		<script>  
	      $(document).ready(function(){ 
	        $('#getPlaceBtn').click(function(){  
	          var getPlace = $('#getPlace').val();
            //alert(getPlace); 
            $.ajax({  
                    url:"branchClient.php", 
                    method:"POST",  
                    data:{getPlace:getPlace},
                    success: function(value){
                      $("#setCode").trigger("reset");  
                        $('#success_message').html(value);  
                      }		
                    });                  
                });
              });
		</script>
</body>
</html>