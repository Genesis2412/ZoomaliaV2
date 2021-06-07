<?php

    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./css/viewPet.css">
        
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
                <li><a href="veterinary.php">VETERINARY</a></li>
                <li><a href="index.php#contactUs">CONTACT US</a></li>
                <li>
                    <a style="color: white;"><i class="fa fa-user" aria-hidden="true" style="font-size: 25px;"></i></a>
                    <ul>
                        <li>
                        <!--Hide/Show links-->
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

        <?php
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
    
            $ch = curl_init();
            if(str_contains($id, 'D'))
            {
                $data = json_encode(array("DogId" => $id));
                curl_setopt($ch, CURLOPT_URL, "http://localhost/zoomaliawork/api/pet/dogOne");
            }
            elseif(str_contains($id, 'C'))
            {
                $data = json_encode(array("CatId" => $id));
                curl_setopt($ch, CURLOPT_URL, "http://localhost/zoomaliawork/api/pet/catOne");
            }
            
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            $final = json_decode($output);

            $view = "";
            $view=$view.'<div class="display">';
            $view=$view.'<div class="container">';
            $view=$view.'<div class="row">';
            $view=$view.'<div class="col">';
            $view=$view.'<img src="'.$final->Image.'">';
            $view=$view.'</div>';
            $view=$view.'<div class="col">';
            $view=$view.'<h3>'.$final->Name.'</h3><br>';
            $view=$view.'<h5>Breed: '.$final->Breed.'</h5><br>';
            $view=$view.'<p>';
            $view=$view.$final->Name.' is very joyful. He promotes social interaction and
                        love to provide people with unconditional love. He is very easy to train and is very
                        faithful. He will definitely win every hearts in your family.';
            $view=$view.'</p>';
            $view=$view.'<h5>If you think you are ready to adopt '.$final->Name.'</h5><br>';
            $view=$view.'<button class="btn btn-success" id="adoptBtn">Click Here</button>';
            $view=$view.'</div></div></div>';

            echo $view;
    
            curl_close($ch);
        }
        ?>

        <div class="adoptForm">
        <h3>Adoption Form</h3>
            <div class="container">
                <form id="adopt_form">
                    <div class="row">
                        <div class="col-25">
                            <label for="Name">Name</label>
                        </div>
                        <div class="col-75">
                            <input type="hidden" id="pId" name="pId" value="<?php  if(str_contains($id, 'D')){echo $final->DogId;}else{echo $final->CatId;} ?>">
                            <input type="hidden" id="pName" name="pName" value="<?php  if(str_contains($id, 'D')){echo $final->Name;}else{echo $final->Name;} ?>">
                            <input type="hidden" id="pBreed" name="pBreed" value="<?php  if(str_contains($id, 'D')){echo $final->Breed;}else{echo $final->Breed;} ?>">
                            <input type="hidden" id="pImage" name="pImage" value="<?php  if(str_contains($id, 'D')){echo $final->Image;}else{echo $final->Image;} ?>">
                            <input type="hidden" id="pStatus" name="pStatus" value="<?php  if(str_contains($id, 'D')){echo $final->Status;}else{echo $final->Status;} ?>">

                            <input type="text" id="name" name="name" placeholder="Full Name">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-25">
                            <label for="Address">Address</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="address" name="address" placeholder="Address">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-25">
                            <label for="PhoneNumber">Phone Number</label>
                        </div>
                        <div class="col-75">
                            <input type="number" id="pNumber" name="pNumber" placeholder="Phone Number">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="HomeNumber">Home Number</label>
                        </div>
                        <div class="col-75">
                            <input type="number" id="hNumber" name="hNumber" placeholder="Home Number">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="DateOfBirth">Date Of Birth</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="dob" name="dob" placeholder="Format: dd/MM/yyyy">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="Reason for Adoption">Reason for Adoption</label>
                        </div>
                        <div class="col-75">
                            <textarea id="reason" name="reason" placeholder="Reason for adoption"></textarea>
                        </div>
                    </div>

                    <div class="row">
                    <span id="error_message" class="text-danger" style="text-align:center"></span>    
                    <span id="success_message" class="text-success" style="text-align:center"></span>
                    </div>

                    <div class="row">
                        <input type="button" name="submitForm" id="submitForm" value="REQUEST"/>
                    </div>
                </form>
            </div>
        </div>

        <div style="clear:both"></div>

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

        <!--Toggle Registration Form-->
        <script>
            $(document).ready(function(){
              $("#adoptBtn").click(function(){
                $(".adoptForm").toggle(1000);
              });
            });
        </script>

        <script>
            $(document).ready(function(){
            $("#submitForm").click(function(){
                var pId = $('#pId').val();  
                var pName = $('#pName').val();
                var pBreed = $('#pBreed').val();  
                var pImage = $('#pImage').val();  
                var pStatus = $('#pStatus').val();
                var name = $('#name').val();
                var address = $('#address').val();
                var pNumber = $('#pNumber').val();
                var hNumber = $('#hNumber').val();
                var dob = $('#dob').val();
                var reason = $('#reason').val();
                //alert(pId+" "+pName);

                if(pId == '' || pName == '' || pBreed == '' || pImage == '' ||  pStatus == '' ||  name == '' ||  address == '' ||  pNumber == '' ||  hNumber == '' ||  dob == '' ||  reason == '') 
                { 
                    $('#error_message').html("All field are required");
                }
                else
                {                 
                    $('#error_message').html(''); 
                    $.ajax({  
                            url:"adoptRequest.php", 
                            method:"POST",  
                            data:{pId:pId, pName:pName, pBreed:pBreed, pImage:pImage, pStatus:pStatus, name:name, address:address, pNumber:pNumber, hNumber:hNumber, dob:dob, reason:reason},  
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

    </body>
</html>