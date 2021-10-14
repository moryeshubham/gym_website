<?php
 include "connection.php";
 include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
        <title>PAYMENT_INFO</title>
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
                             margin-left: 940px;
                             margin-bottom: 5px;
                             margin-right: 20px;
                     }

                     th{
                             text-align: center;
                     }
                     td{
                             text-align:center;
                     }

                     .styling:hover
                {
                        color:white;
                        width: 300px;
                        height: 50px;
                        background-color: #00544c;
                }

             </style>

</head>
<body style="background-color:grey; " >

<!--          ----------------sidenav---------------         -->


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))
                { 
                    echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['photo']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div>
<br>
<br>
<div class="styling"><a href="profile.php">Profile</a></div>
<div class="styling"><a href="gym_member_info.php">Gym Member Info</a></div>
<div class="styling"> <a href="add_payment-info.php">Add New Payment</a></div>

</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>





<div style="margin-left:90px; "> <!--this div tag is used for give margin to table -->
 
<!--                 search bar           -->
        <div class="search_b">
                <form class="navbar-form" method="post" name="t_searchbar">
                        <div>
                                <input type="text" class="form-control" name="search" placeholder="
                                search Gym Member..." required="">
                                <button style="background-color:#49ab9b ; color:white;" type="submit" name="submit"
                                 class="btn btn=default">
                                <span class="glyphicon glyphicon-search"> </span>
                                </button>
                        </div>
                </form>
        </div>
<h1 style="margin-left:370px; font-size:50px; color:lime; margin-bottom:20px;"> List of Gym Members</h1>

<br>
<br>
<?php
        if(isset($_POST['submit']))
        {
                $q=mysqli_query($db,"SELECT fullname , id_no , trainer , package , amount , payment_id , payment_type FROM `payment` 
                where firstname like '%$_POST[search]%' 
                 OR id_no like '%$_POST[search]%' 
                 OR trainer like '%$_POST[search]%'
                 OR package like '%$_POST[search]%'
                 OR amount like '%$_POST[search]%'
                 OR payment_id like '%$_POST[search]%'
                 OR payment_type like '%$_POST[search]%'
                
                  ");

                if (mysqli_num_rows($q)==0)
                {
                        echo "sorry No member found , please try searching again!!";
                }
                else{
                        echo "<table class='table table-bordered table-hover ' style='width:90%;' >";
                                echo "<tr style='background-color:#49ab9b; color:white;'>";
                                //Table header
                                echo "<th>"; echo "Full Name";  echo "</th>";
                                echo "<th>"; echo "ID NO ";  echo "</th>";
                                echo "<th>"; echo "Trainer Name";  echo "</th>";
                                echo "<th>"; echo "Packages";  echo "</th>";
                                echo "<th>"; echo "Amount";  echo "</th>";
                                echo "<th>"; echo "Payment ID NO";  echo "</th>";
                                echo "<th>"; echo "Payment Type";  echo "</th>";
                        echo "</tr>";

        
                        while($row=mysqli_fetch_assoc($q))
                        {
                               echo "<tr>";
                                echo "<td>"; echo $row['fullname']; echo "</td>";
                                echo "<td>"; echo $row['id_no']; echo "</td>"; 
                                echo "<td>"; echo $row['trainer']; echo "</td>";
                                echo "<td>"; echo $row['package']; echo "</td>";
                                echo "<td>"; echo $row['amount']; echo "</td>";
                                echo "<td>"; echo $row['payment_id']; echo "</td>";
                                echo "<td>"; echo $row['payment_type']; echo "</td>";
                        echo "</tr>";
                        }
                        echo "</table>";                       
                }
        }
/*   if button is not pressed   then table data remain same as it is server data*/
        else{
                $res=mysqli_query($db,"SELECT fullname , id_no , trainer , package , amount , payment_id , payment_type  FROM `payment` ORDER BY `payment`.`id_no` ASC;");

                echo "<table class='table table-bordered table-hover ' style='width:90%;' >";
                        echo "<tr style='background-color:#49ab9b; color:white;'>";
                                //Table header
                                echo "<th>"; echo "Full Name";	echo "</th>";
                                echo "<th>"; echo "ID NO ";  echo "</th>";
                                echo "<th>"; echo "Trainer Name";  echo "</th>";
                                echo "<th>"; echo "Packages";  echo "</th>";
                                echo "<th>"; echo "Amount";  echo "</th>";
                                echo "<th>"; echo "Payment ID NO";  echo "</th>";
                                echo "<th>"; echo "Payment Type";  echo "</th>";
                        echo "</tr>";
       

                while($row=mysqli_fetch_assoc($res))
                {
                        echo "<tr>";
                                echo "<td>"; echo $row['fullname']; echo "</td>";
                                echo "<td>"; echo $row['id_no']; echo "</td>"; 
                                echo "<td>"; echo $row['trainer']; echo "</td>";
                                echo "<td>"; echo $row['package']; echo "</td>";
                                echo "<td>"; echo $row['amount']; echo "</td>";
                                echo "<td>"; echo $row['payment_id']; echo "</td>";
                                echo "<td>"; echo $row['payment_type']; echo "</td>";
                        echo "</tr>";
        }
        echo "</table>";     
        }    
 ?>

</div>




</body>
</html>