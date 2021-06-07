<?php
    include ('connection.php');
    session_start();
?>

<?php

    //Once clicked
    if(isset($_POST['submit']))
    {
        $logEmail=mysqli_real_escape_string($connection,$_POST['email']);
        $logPass=mysqli_real_escape_string($connection,$_POST['password']);

        $search="SELECT FirstName,Email,Password FROM admin WHERE Email='$logEmail';";
        $result=mysqli_query($connection,$search);
            
        if(mysqli_num_rows($result)>0)
        {
            while($data=mysqli_fetch_array($result))
            {
                if(password_verify($logPass, $data['Password']))
                {
                    if(!empty($_POST['remember']))
                    {
                        //setting cookies to remember details
                        setcookie("memberEmail",$logEmail,time()+(10*365*24*60));
                        setcookie("memberPassword",$logPass,time()+(10*365*24*60));
                    }

                    $_SESSION['adminName']=$data['FirstName'];
                    header('Location: adminPage.php');                
                }
                else
                {
                    header('Location:adminLogin.php?passFailed=1');
                }
            }
        }
        else
        {
            header('Location:adminLogin.php?emailPassFailed=1');
        }
    }
?>