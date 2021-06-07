<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/dogCat.css">
        
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
                    <a>ADOPTION</a>
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

        <!--Banner Image-->
        <div class="banner">
            <img src="./img/bannercat.jpg">
        </div>

        <!--Display Products-->    
        <div class="productDisplay">
            <div class="col-md-12">
                <div id="productContainer">
                    <?php
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, 'http://localhost/zoomaliawork/api/pet/cat');
                        curl_setopt($curl, CURLOPT_HEADER, 0);  
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 

                        $response = curl_exec($curl);

                        if($error = curl_error($curl))
                        {
                            echo $error;
                        }
                        else
                        {
                            $result = json_decode($response);

                            foreach($result as $final)
                            {
                                $view="";
                                $view=$view.'<div class="col-sm-4 col-lg-3 col-md-3">';
                                if($final->Status == "InProgress")
                                {
                                    $view=$view.'<div style="border:3px solid #FF4600; border-radius:5px; padding:16px; margin-bottom:40px; height:340px;">';
                                }
                                else
                                {
                                    $view=$view.'<div style="border:2px solid #30BB00; border-radius:5px; padding:16px; margin-bottom:40px; height:340px;">';
                                }                                
                                $view=$view.'<img src="'. $final->Image .'" alt="" class="img-responsive" width="300px">';
                                $view=$view.'<h4 style="text-align:center;" class="none" >'. $final->Name .'</h4>';
                                $view=$view.'<p align="center"><strong> Breed: '. $final->Breed .'</strong></p>';
                                if($final->Status == "InProgress")
                                {
                                    $view=$view.'<p align="center" style="color:#EB4A12;font-size:16px;"><strong>This pet has already been requested</strong></p>';
                                }
                                $view=$view.'<form action="viewPet.php" method="POST">';
                                $view=$view.'<input type="hidden" name="id" value="'.$final->CatId.'">';
                                if($final->Status != "InProgress")
                                {
                                    $view=$view.'<button type="submit" class="btn btn-success" style="margin-top:10px;position:relative;left:30%;">More Details</button>';
                                }
                                $view=$view.'</form></div></div>'; 

                                echo $view;
                            }
                        }
                        curl_close($curl);
                    ?>
                </div>
            </div>
        </div>

        <div style="clear: both;"></div>

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


