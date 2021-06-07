<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./css/adminLoginRegister.css">
        <title>Login</title>    
    </head>
    <body>
        <div class="hero">
            <div class="form-box">
                <!--LoginIcon-->
                <div id="title">
                    <img src="./img/loginIcon.png"/>
                </div>

                <!--DisplayErrorMessage-->
                <div id="errorLogin">
                    <?php
                        
                        if(isset($_GET['emailPassFailed']))
                        {
                            echo "<p align=center>Incorrect Email/Password, Please try again</p>";
                        }
                        else if(isset($_GET['passFailed']))
                        {
                            echo "<p align=center>Incorrect Password, Please try again</p>";
                        }
                    ?>
                </div>

                <!--LoginForm-->
                <!--Cookies to save email and password if checkbox remember is checked-->
                <form id="login" class="inputLogin" method="POST" action="adminLoginCheck.php">
                        <input type="Email" class="input-field" name="email" placeholder="Enter Email" value="<?php if(isset($_COOKIE["memberEmail"])) { echo $_COOKIE["memberEmail"]; } ?>" required>
                        <input type="password" class="input-field" name="password" placeholder="Enter Password" value="<?php if(isset($_COOKIE["memberPassword"])) { echo $_COOKIE["memberPassword"]; } ?>" required>
                        <input type="checkbox" class="check-box" name="remember"><span>Remember Password</span>
                        <button type="submit" class="submitLog" name="submit">Login</button>
                </form>

                <div id="logo">
                    <img src="./img/logo.svg" alt="Zoomalia Logo">
                </div>

            </div>        
        </div>
    </body>
</html>