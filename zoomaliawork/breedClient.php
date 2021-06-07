<?php

	require_once("nusoap/lib/nusoap.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cat Search</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/veterinary.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/catBreed.css">
    
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
            <li><a href="breedForm.php">SEARCH</a></li>
            
            <li><a style="color: white;">SHOP NOW</a>
                <ul>
                    <li><a href="dogproduct.php">DOG</a></li>
                    <li><a href="catproduct.php">CAT</a></li>
                </ul>
            </li>
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
            <li>
                <a href="inCart.php" style="color: white;"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 25px;"></i></a>
            </li>
          </ul>
        </nav>

        <!--Hamburger-->
        <div class="menu-toggle">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>

    </header>

    <!--End Of Navigation Bar-->


	<?php

	$client = new nusoap_client("http://localhost/zoomaliawork/breedServer.php");

    $err = $client->getError();

    if($err)
    {
        echo "Error1 <pre>" .$err. "</pre>";
    }

    
    $name = $_GET['Name'];

    $result = $client->call("getDetails", array("name" => $name));

    //checking for errors
    if($client->fault)
    {
        echo "Fault <pre>";
        print_r($result);
        echo "</pre>";
    }
    else
    {
    $err = $client->getError();

        if($err)
        {
            echo "Error1 <pre>" .$err. "</pre>";
        } 
        else
        {
            //var_dump($result);

            foreach($result as $value)
                {
                    
                    echo "<table align='center' style='width: 100%;border-collapse: collapse;'>";
                    echo "<tr>";
                    echo '<td style="padding: 12px 15px;border:1px solid #ddd;text-align: center;padding-top:100px"><img src="'.$value['Image']. '"width="300"></td>';
                    echo "</tr>";
                    echo "<tr style='background-color: #f6f6f6;'>";
                    echo '<td style="padding: 12px 15px;border:1px solid #ddd;text-align: center;">';
                    echo "<h2>" .$value['Name']. "</h2>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo '<td style="padding: 12px 15px;border:1px solid #ddd;text-align: center;">"' .$value['Description']. '"</td></tr></table>';
                    echo "<button style='background-color:#bfacb7;border: none;width: 155px; height: 30px; border-radius: 15px;margin:auto;display:block;margin-top:100px'><a href='breedForm.php'>Back to Search</a></button>";   

                }                
            
        }  
    }

	?>

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
	

