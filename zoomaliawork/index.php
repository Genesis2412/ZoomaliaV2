<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">    
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="./css/index.css">
      <title>Zoomalia</title>
  </head>
  <body>
      <!--Navigation Bar-->
      <header>
        <div class="logo">
          <a href="#"><img src="./img/logo.svg" alt="ZOOMALIA"></a>
        </div>

        <nav>
          <ul>
            <li><a class="active" href="#">HOME</a></li>
            <li><a href="#aboutUs">ABOUT US</a></li>
            <li><a href="#service">SERVICES</a></li>
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


    <!--Slider-->
    <div class="slider">
        <video autoplay="autoplay" muted="muted" loop="loop">
          <source src="./video/dog2.mp4" type="video/mp4">
        </video>

      <!--textOnbackground-->
      <div class="container">
                <div class="slidercontent">
                  <img src="./img/logo.svg" id="slider_logo">
                    <h1>ZOOMALIA</h1>
                    <p>“Animals are such agreeable friends, they ask no questions; 
                                          they pass no criticisms.” –George Eliot
                    </p>
                </div>
      </div>
    </div>
    <!--End of Slider-->
  
    <!--About-->
    <a name="aboutUs"></a>
    <section id="about">
      <div class="container">
        <div class="row">
            <div class="col-md-6">
              <img src="./img/dog and cat.jpg" alt="dogcat" width=100%>
            </div>
            <div class="col-md-6"><br><br>
              <div class="about-content">
              <h2>About Us</h2>                  
                <p>
                  Zoomalia, is a Mauritian community driven animal welfare organization with no affiliation 
                  to any political, ethnic or religious group.<br><br>                   
                  <h5>Our Mission:</h5>
                  Zoomalia<span id="dots">...</span><span id="more"> aims to improve the lives of companion animals in Mauritius and assist in humanely
                  managing the population of dogs and cats via education and sterilization. Our goal is to prevent and eliminate all cruelty to all animals whether arising through ignorance, 
                  neglect or deliberate cruelty.<br><br>
                  <b>Our Vision:</b>
                  <br>
                  That all animals be treated with kindness and respect.</span>
                </p>
              </div>
              <button type="button" onclick="myFunction()" id="myBtn" class="btn btn-primary">Read More>></button>
            </div>
         </div> 
        </div>
        <a name="service"></a>
    </section>

    <!--Services-->
    <section id="services">
      <div class="container">
        <h2>Our Services</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="icon">
                   <i class="fa fa-paw"></i>
                </div>
                <h3>Adoption</h3>
                <p>Give the dog or cat a family and a shelter</p>                    
            </div> 
         
            <div class="col-md-4 text-center">
              <div class="icon">
                <i class="fa fa-heart"></i>
              </div>   
              <h3>Donation</h3>
              <p>Donate food, toys, and accessories (collar,kennel,shampoo and more)</p>                
            </div>

            <div class="col-md-4 text-center">
              <div class="icon">
                 <i class="fa fa-medkit"></i>
              </div>
              <h3>Veterinary Services</h3>
              <p>Best of the qualified vets to treat your animals (Sterilise,check-up,operation) </p>                  
            </div>              
        </div>
      </div>
      <a name="contactUs"></a>
    </section>

    <!--Contact Us-->
    <section id="contact">
      <div class="container">
        <h2>Get In Touch</h2>
        <div class="row">
          <div class="col-md-6">
            <span id="error_message" class="text-danger"></span>    
            <span id="success_message" class="text-success"></span>
            <form id="submit_form" class="contact-form">
              <div class="form-group">
                <input type="text" id="fName" class="form-control" placeholder="Enter Firstname" name="fName" required value="<?php if(isset($_SESSION["userEmail"])) {if(isset($_COOKIE["FirstName"])){ echo $_COOKIE["FirstName"]; }} ?>">
              </div>
              <div class="form-group">
                <input type="text" id="lName" class="form-control" placeholder="Enter Lastname" name="lName" required value="<?php if(isset($_SESSION["userEmail"])) {if(isset($_COOKIE["LastName"])){ echo $_COOKIE["LastName"]; }} ?>">
              </div>
              <div class="form-group">
                  <input type="number" id="pNumber" class="form-control" placeholder="Enter Phone number" name="pNumber" required>
              </div>
              <div class="form-group">
                <input type="email" id="email" class="form-control" placeholder="Enter your email id" name="email" required value="<?php if(isset($_SESSION["userEmail"])) {if(isset($_COOKIE["Email"])){ echo $_COOKIE["Email"]; }} ?>">
              </div>
              <div class="form-group">
                  <textarea class="form-control" id="message" rows="4" placeholder="Your Message" name="message" required></textarea>
              </div>
              <input type="button" name="submit" id="submit" class="btn btn-info" value="SEND MESSAGE"/>
            </form>
          </div>
          <div class="col-md-6 contact-info">
              <div class="follow"><b>Address: </b><i class="fa fa-map-marker"></i>ABC Road,Moka, MAURITIUS</div>                             
              <div class="follow"><b>Phone: </b><i class="fa fa-phone"></i>+230 4350066</div>
              <div class="follow"><b>Email: </b><i class="fa fa-envelope"></i><a href="mailto:zoomalia@intnet.mu">zoomalia@intnet.com</a></div>
              <div class="follow"><label><b>Get Social:  </b></label>
                <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.pinterest.com" target="_blank"><i class="fa fa-pinterest"></i></a>
                <a href="https://www.snapchat.com" target="_blank"><i class="fa fa-snapchat"></i></a>
              </div>
          </div>
        </div>
      </div>
    </section>

    <!--Footer-->
    <section id="footer">
      <div class="container">
        <p>&copy;  2021 Zoomalia All rights reserved</p>
      </div>
    </section>
    <!--End-->

    <!--Read more Javascript-->
    <script type=text/javascript>
      function myFunction() 
      {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") 
        {
          dots.style.display = "inline";
          btnText.innerHTML = "Read more";
          moreText.style.display = "none";
        } 
        else 
        {
          dots.style.display = "none";
          btnText.innerHTML = "Read less";
          moreText.style.display = "inline";
        }
      }
    </script>
    <!-- End Of Read more Javascript-->

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

    <!--Sending Message via Ajax(JQuery)-->
    <script>  
      $(document).ready(function(){ 
        $('#submit').click(function(){  
          var fName = $('#fName').val();  
          var lName = $('#lName').val();
          var pNumber = $('#pNumber').val();  
          var email = $('#email').val();  
          var message = $('#message').val();  
          if(fName == '' || lName == '' || pNumber == '' || email == '' ||  message == '') 
          { 
            $('#error_message').html("All field are required"); 
          } 
          else  
          { 
            $('#error_message').html(''); 
            $.ajax({  
                    url:"messageCheck.php", 
                    method:"POST",  
                    data:{fName:fName, lName:lName, pNumber:pNumber, email:email, message:message},  
                    success:function(data){ 
                       $("form").trigger("reset");  
                          $('#success_message').fadeIn().html(data);  
                          setTimeout(function(){
                               $('#success_message').fadeOut("Slow"); 
                          }, 2000); 
                        } 
                    });
                  }
                });
              });
    </script>
    <!--End Of Script-->
  </body>
</html>