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
        $protectPass=md5($logPass);

        $emailSearch="SELECT * FROM users WHERE Email='$logEmail';";
        $passSearch="SELECT * FROM users WHERE Password='$protectPass';";
        $emailResult=mysqli_query($connection,$emailSearch);
        $passResult=mysqli_query($connection,$passSearch);

        if(mysqli_num_rows($emailResult)==1)
        {
            if(mysqli_num_rows($passResult)==1)
            {

                if(!empty($_POST['remember']))
                {
                    //setting cookies to remember details
                    setcookie("memberEmail",$logEmail,time()+(10*365*24*60));
                    setcookie("memberPassword",$logPass,time()+(10*365*24*60));
                }
                //creating a session
                $_SESSION['userEmail']=$logEmail;
                header('Location: index.php');
            }
            //displaying errors
            else
            {
                header('Location:login.php?passFailed=1');
            }
         }
         else
         {
            header('Location:login.php?emailFailed=1');
         }   

         if(mysqli_num_rows($emailResult)!=1 && mysqli_num_rows($passResult)!=1)
         {
            header('Location:login.php?emailPassFailed=1');
         }    
    }
?>