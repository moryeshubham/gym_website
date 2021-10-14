<?php
 include "connection.php";
 include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
        <title>Gym_Info</title>
        <link rel="stylesheet" type="text/css" href="">
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
<div class="styling"><a href="trainer.php">Trainer Information</a></div>
  <div class="styling"><a href="add_tr.php">Add Trainer</a></div>
  <div class="styling"><a href="edit_trainer_info.php">Edit Trainer-Info</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
   
  <div class="container" style="text-align: center;">
    <h2 style="color:black; font-family: Lucida Console; text-align: center; font-size:45px;"><b>Edit Trainer Information </b></h2>
    <br>
    <br>


<?php    
    $res=mysqli_query($db,"SELECT * FROM `trainer`;");

                echo "<table class='table table-bordered table-hover ' >";
                        echo "<tr style='background-color:#49ab9b; color:white;'>";
                                //Table header
                                echo "<th>"; echo "ID-NO";	echo "</th>";
                                echo "<th>"; echo "First-Name";  echo "</th>";
                                echo "<th>"; echo "Last-Name";  echo "</th>";
                                echo "<th>"; echo "Edit_Button";  echo "</th>";
                                echo "</tr>";
                        echo "</th>";
        
                        while($row=mysqli_fetch_assoc($res))
                        {
                                echo "<tr>";
                                echo "<td>"; echo $row['id_no']; echo "</td>"; 
                                echo "<td>"; echo $row['first']; echo "</td>";
                                echo "<td>"; echo $row['last']; echo "</td>";
                                echo "<td>"; echo "<button class='btn btn-default' onclick='redirect()' style=' width:70px;  padding:7px 8px;''
                name='submit' href='edit_trainer.php' type='submit'> EDIT</button>
                <script type='text/javascript'>
                    function redirect(){
                    window.location='button_edit_tr.php' }
                </script> "; echo "</td>";
                                echo "</tr>";
                        }
                echo "</table>";  
    
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