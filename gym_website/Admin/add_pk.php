<?php
 include "connection.php";
 include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
        <title>Add packages</title>
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
<body style="background-color:#d27474e3; " >
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
  
  <div class="styling"><a href="packages.php">Packages Information</a></div>
  <div class="styling"><a href="add_pk.php">Add Packages</a></div>
  
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
   
  <div class="container" style="text-align: center;">
    <h2 style="color:black; font-family: Lucida Console; text-align: center; font-size:45px;"><b>Add  New  Packages</b></h2>
    <br>
    <br><br>
    <form class="tr" action="" method="post">
        
        <input type="text" name="p_id" class="form-control" placeholder="ID-NO" required=""><br><br>
        <input type="text" name="amount" class="form-control" placeholder="Amount" required=""><br><br>
        <input type="text" name="description" class="form-control" placeholder="Description" required=""><br><br>
        
        <input type="text" name="package" class="form-control" placeholder="Package Name" required=""><br><br>
       

        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">ADD DETAILS</button>
    </form>

<?php
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['login_user']))
      {
        mysqli_query($db,"INSERT INTO `packages` VALUES ('$_POST[p_id]' , '$_POST[amount]', '$_POST[description]' , '$_POST[package]');");
      
        ?>
          <script type="text/javascript">
            alert("Package Added Successfully.");
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
  document.body.style.backgroundColor = "";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "";
}
</script>


</body>
</html>