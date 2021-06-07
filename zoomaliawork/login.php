<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./css/login.css">
        <title>Login</title>    
    </head>
    <body>
        <div class="hero">
            <div class="close">
                <a href="index.php" id="close-btn"><img src="./img/cross-button.png"></a>
            </div>

            <div class="form-box">
                <!--LoginIcon-->
                <div id="title">
                    <img src="./img/login-icon.png"/>
                </div>

                <!--DisplayErrorMessage-->
                <div id="errorLogin">
                    <?php
                        if(isset($_GET['passFailed']))
                        {
                            echo "<p align=center>Incorrect Password, Try again</p>";
                        }
                        else if(isset($_GET['emailFailed']))
                        {
                            echo "<p align=center>Incorrect email, Try again</p>";
                        }
                        else if(isset($_GET['emailPassFailed']))
                        {
                            echo "<p align=center>Incorrect email and password, Try again</p>";
                        }
                    ?>
                </div>

                <!--LoginForm-->
                <!--Cookies to save email and password if checkbox remember is checked-->
                <form id="login" class="inputLogin" method="POST" action="loginCheck.php">
                        <input type="Email" class="input-field" name="email" placeholder="Enter Email" value="<?php if(isset($_COOKIE["memberEmail"])) { echo $_COOKIE["memberEmail"]; } ?>" required>
                        <input type="password" class="input-field" name="password" placeholder="Enter Password" value="<?php if(isset($_COOKIE["memberPassword"])) { echo $_COOKIE["memberPassword"]; } ?>" required>
                        <input type="checkbox" class="check-box" name="remember"><span>Remember Password</span>
                        <button type="submit" class="submitLog" name="submit" <?php if(isset($_COOKIE["memberEmail"])) { ?> checked <?php } ?>>Login</button>
                </form>
            </div>        
        </div>
    </body>
</html>