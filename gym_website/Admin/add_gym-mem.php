<?php
 include "connection.php";
 include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
        <title>Add Gym Members</title>
        <link rel="stylesheet" type="text/css" href="style-1.css">
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
       
            <!--using bootstrap-->
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

             <style>
                    body {
                        font-family: "Lato", sans-serif;
                        transition: background-color .5s;
                        }

                .sidenav {
                  height: 100%;
                  margin-top: 50px;
                  width: 0;
                  position: fixed;
                  z-index: 1;
                  top: 0;
                  left: 0;
                  background-color: #222;
                  overflow-x: hidden;
                  transition: 0.5s;
                  padding-top: 60px;
                }

                .sidenav a {
                  padding: 8px 8px 8px 32px;
                  text-decoration: none;
                  font-size: 25px;
                  color: #818181;
                  display: block;
                  transition: 0.3s;
                }

                .sidenav a:hover {
                  color: #f1f1f1;
                }

                .sidenav .closebtn {
                  position: absolute;
                  top: 0;
                  right: 25px;
                  font-size: 36px;
                  margin-left: 50px;
                }

                #main {
                  transition: margin-left .5s;
                  padding: 16px;
                }

                @media screen and (max-height: 450px) {
                  .sidenav {padding-top: 15px;}
                  .sidenav a {font-size: 18px;}
                }
                .img-circle
                {
                	margin-left: 20px;
                }
	
                .search_b{
                             margin-top: 10px;
                             margin-left: 1000px;
                             margin-bottom: 5px;
                             margin-right: 20px;
                     }

                .styling:hover
                {
                        color:white;
                        width: 300px;
                        height: 50px;
                        background-color: #00544c;
                }
                .form-control
                  {
                   background-color: #080707;
                   color: white;
                   height: 40px;
                  }

                  .tr
                  {
                    width: 400px;
                    margin: 0px auto;
                  }

             </style>

</head>
<body style="background-color:cyan; " >
<!--          ----------------sidenav---------------         -->


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))
                  {  echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['photo']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                  }
                ?>
            </div>
<br><br><br>
    <div class="styling"><a href="profile.php">Profile</a></div>
    <div class="styling"><a href="trainer.php">Trainers</a></div>
    <div class="styling"> <a href="add_gym-mem.php">Add Gym Members</a></div>
  
  
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
   
  <div class="container" style="text-align: center;">
    <h2 style="color:black; font-family: Lucida Console; text-align: center; font-size:45px;"><b>Add Gym Members</b></h2>
    <br>
    <br>
    <form class="tr" action="" method="post">
        
        
        <input type="text" name="first" class="form-control" placeholder="First Name" required=""><br>
        <input type="text" name="last" class="form-control" placeholder="Last Name" required=""><br>
        <input type="text" name="username" class="form-control" placeholder="User Name" required=""><br>
        <input type="text" name="password" class="form-control" placeholder="Password" required=""><br>
        <input type="text" name="id_no" class="form-control" placeholder="ID-NO" required=""><br>
        <input type="text" name="email" class="form-control" placeholder="Email-ID" required=""><br>
        <input type="text" name="contact" class="form-control" placeholder="Contact" required=""><br>
        <br>

        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">ADD DETAILS</button>
    </form>

<?php
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['login_user']))
      {
        mysqli_query($db,"INSERT INTO `gym_members` VALUES ('$_POST[first]', '$_POST[last]', 
        '$_POST[username]', '$_POST[password]', '$_POST[id_no]' , '$_POST[email]', '$_POST[contact]');");
        ?>
          <script type="text/javascript">
            alert("Gym-Member Added Successfully.");
          </script>

        <?php

      }
      else
      {
        ?>
          <script type="text/javascript">
            alert("You need to login first.");
          </script>
        <?php
      }
    }
?>



  </div>

</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "cyan";
}
</script>


</body>
</html>