<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PROFILE</title>
        <link rel="stylesheet" type="text/css" href="">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
       
    <!--using bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    </head>
    <body style="background-color: #00e1ff66;">
        <div class="container">
            <form action="" method="post">
                <button class="btn btn-default" style="float: right; width:70px; margin-top:20px; padding:7px 8px;"
                name="submit1" type="submit"> EDIT</button>
            </form>
            <div class="wrapper" style="width: 550px; height:700px; margin-left:280px;
             margin-top:40px;  color:black; ">    <!-- middle part of box==> background-color:hotpink; -->

                <?php


                        if(isset($_POST['submit1']))
                        {
                            ?>
                            <script type="text/javascript">
                                window.location="edit.php"
                            </script>
                            <?php
                        }


                    $q=mysqli_query($db,"SELECT * FROM admin         
                    where username='$_SESSION[login_user]';");

                  
                ?>


                <br>
                <br>
                <br>
                <h2 style="text-align: center; font-size:40px"><b> MY PROFILE </b></h2> <br>

                <?php
                    $row=mysqli_fetch_assoc($q);

                    echo "<div style='text-align:center;'>
                                <img class='img-circle profile-img' height=110px width=120px src='images/".$_SESSION['photo']."'>
                         </div> <br>";

                ?>
                <div style="text-align:center; font-size:15px;"><b>&nbsp WELCOME &nbsp  </b> 
                   <h4 style="text-align: center; font-size :18px;"> <?php     
                         echo  $_SESSION['login_user'];
                      ?>  
                   </h4>
                </div><br>
                <?php
                    echo "<b>";
                    echo "<table style='text-align:center;' class='table table-boaderless table-hover'>";
                        echo "<tr>";
                            echo "<td>";
                                echo "<b> First Name: </b>";
                            echo "</td>";

                            echo "<td>";
                                echo $row['first'];
                            echo "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>";
                                echo "<b> Last Name: </b>";
                            echo "</td>";

                            echo "<td>";
                                echo $row['last'];
                            echo "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>";
                                echo "<b> User Name: </b>";
                            echo "</td>";

                            echo "<td>";
                                echo $row['username'];
                            echo "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>";
                                echo "<b> Password: </b>";
                            echo "</td>";

                            echo "<td>";
                                echo $row['password'];
                            echo "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>";
                            echo "<b> Email ID: </b>";
                            echo "</td>";

                            echo "<td>";
                            echo $row['email'];
                            echo "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>";
                            echo "<b> Contact NO: </b>";
                            echo "</td>";

                            echo "<td>";
                            echo $row['contact'];
                            echo "</td>";
                        echo "</tr>";
                    echo "</table>";
                     echo "</b>";
                ?>

           
                 
            </div>

        </div>
    </body>
</html>