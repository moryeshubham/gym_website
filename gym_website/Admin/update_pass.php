<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Password</title>
        <link rel="stylesheet" type="text/css" href="">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
       
    <!--using bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    </head>

    <body style=" background-color:violet;">
            
                <h1 style="text-align: center; margin-top:100px;"><b>CHANGE &nbsp YOUR &nbsp PASSWORD</b></h1><br><br>
                    <br>
                <form action="" method="post">
                    <input type="text" name="username" class="form-control" placeholder="Username" required=""
                    style="width:400px;height:40px; margin-left:480px;  margin-bottom:35px;">

                    <input type="text" name="email" class="form-control" placeholder="Email ID" required=""
                    style="width:400px; height: 40px; margin-left:480px;  margin-bottom:35px;">

                    <input type="text" name="password" class="form-control" placeholder="New Password" required=""
                    style="width:400px; height: 40px; margin-left:480px;  margin-bottom:60px;">
                    <button class="btn btn-default" style="margin-left:610px;" type="submit" name="submit">Update  Password</button>
                </form>

                <?php
                        if(isset($_POST['submit']))
                        {
                            if(mysqli_query($db,"UPDATE admin SET password='
                            $_POST[password]' WHERE username='$_POST[username]'
                            AND email='$_POST[email]';"))
                            {

                            ?>
                            <script type="text/javascript">
                            alert("Your password has been changed!!");
                          </script>
                           <?php
                            }

                         }
                ?>
    </body>


    </html>