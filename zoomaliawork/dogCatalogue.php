<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/dogCatalogue.css">
        
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
                <li><a href="breedForm.php">CAT CATALOGUE</a></li>
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
            <img src="./img/bannerdogx.jpg">
        </div>
        
        <div class="blocks">
            <div class="select">
                <?php
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, 'https://api.thedogapi.com/v1/breeds');
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

                        echo '<select name="dogs" id="dogSelect">';
                        echo '<option value="SELECT TYPE" disabled selected="selected">SELECT TYPE</option>';
                        echo '<option value="All">All</option>';

                        foreach($result as $final)
                        {
                            echo "<option value='$final->id'>".$final->name."</option>";
                        }

                        echo '</select>';
                    }
                ?>
            </div>

            <div class="fav">
                <a href="#" id="favi" onclick="favoriteDogs();return false;">Your Favorites</a>
            </div>
        </div>

        <div style="clear:both;"></div>

        <!--Display Products-->    
        <div class="productDisplay">
            <div class="col-md-12">
                <div id="productContainer">
                    <?php
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, 'https://api.thedogapi.com/v1/breeds?limit=12&page=0');
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
                                $view=$view.'<div style="border:2px solid #8F8F8F; border-radius:5px; padding:16px; margin-bottom:40px; height:520px;">';                              
                                $view=$view.'<img src="'. $final->image->url .'" alt="" class="img-responsive" style="width:280px;height:230px;background-size:cover;">';
                                $view=$view.'<h4 style="text-align:center;" class="none">'. $final->name .'</h4>';
                                $view=$view.'<p style="text-align:center;" class="none"><strong> id: '. $final->id .'</strong></p>';
                                $view=$view.'<p style="text-align:center;font-style: italic;" class="none" >'. $final->temperament .'</p>';
                                $view=$view.'<p style="text-align:center;" class="none">'. $final->weight->imperial .' kgs</p>';
                                $view=$view.'<p style="text-align:center;" class="none">'. $final->height->imperial .' at the withers</p>';
                                $view=$view.'<p style="text-align:center;" class="none">'. $final->life_span .' average life span</p>';
                                $view=$view.'<button onclick="getBtnValue(this)" value="'.$final->image->id.'"><i onclick="myFunction(this)" id="heart" class="fa fa-heart-o" aria-hidden="true"></i></button>';
                                $view=$view.'</div></div>';

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

        <!--AJAX Get Products-->
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("#dogSelect").on('change',function()
                {
                    var value=$(this).val();
                    $.ajax(
                    {
                        url:'apiViewDog.php',
                        type:'POST',
                        data:'request='+value,
                        beforeSend:function()
                        {
                            $("#productContainer").html()
                        },
                        success:function(data)
                        {
                            $("#productContainer").html(data)
                        }
                    });
                });
            });
        </script>

        <!--Get all dogs on click-->
		<script type="text/javascript">
			function favoriteDogs()
			{
				$.ajax({
					type:"POST",
					url:"getFavorites.php",
					success: function(value){
						$("#productContainer").html(value);
					}
				});
			}
		</script>

        <!--Heart Effect-->
        <script>  
            function myFunction(x) 
            {
                if ( x.classList.contains( "fa-heart-o") ) {
                    x.classList.remove( "fa-heart-o" );
                    x.classList.add( "fa-heart" );
                }
            }
        </script>
        
        <!--Delete product on click-->
		<script type="text/javascript">
			function getBtnValue(button)
			{
				var ID=button.value;
				$.ajax({
					type:"POST",
					url:"addToFavorites.php",
					data: {ID:ID},
					success: function(value){
                        if(value != "")
                        {
                            alert(value);
                        }
                        else
                        {
                        } 
					}
				});
			}
		</script>
    </body>
</html>


