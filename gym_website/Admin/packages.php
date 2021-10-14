<?php
 include "connection.php";
 include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
        <title>Packages</title>
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
                             margin-left: 970px;
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

             </style>

</head>
<body style="background-color:lawngreen; " >
<!--          ----------------sidenav---------------         -->


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))
                  {  echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['photo']."'>";
                    echo "</br></br>";

                    echo "Welcome <br> ".$_SESSION['login_user']; 
                  }
                ?>
            </div>
<br><br><br>
  <div class="styling"><a href="packages.php">Packages Information</a></div>
  <div class="styling"><a href="add_pk.php">Add Packages</a></div>

</div>  
           

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "lawngreen";
}
</script>



<div style="margin-left:20px; "> <!--this div tag is used for give margin to table -->

<!--                 search bar           -->
        <div class="search_b">
                <form class="navbar-form" method="post" name="t_searchbar">
                        <div>
                                <input  type="text" class="form-control" name="search" 
                                placeholder="Serach Here"
                                 required="">
                                <button style="background-color:#49ab9b ; color:white;" type="submit" name="submit"
                                 class="btn btn=default">
                                <span class="glyphicon glyphicon-search"> </span>
                                </button>
                        </div>
                </form>

                <form class="navbar-form" method="post" name="del_searchbar">
                        <div>
                                <input type="text" class="form-control" name="p_id" 
                                 placeholder="Enter Trainer ID-NO." required="">
                                <button style="background-color:#49ab9b ; color:white;" type="submit" name="submit1"
                                 class="btn btn=default"> Delete
                                </button>
                        </div>
                </form>

                
        </div>
<h1 style="margin-left:450px; font-size:50px; color:white; margin-bottom:20px; margin-top:50px;"><b> Package Details </b></h1>

<br>
<br>
<?php
        if(isset($_POST['submit']))
        {
                $q=mysqli_query($db,"SELECT * FROM packages where 
                p_id like '%$_POST[search]%' 
                 OR amount like '%$_POST[search]%' 
                 OR description like '%$_POST[search]%'
                 OR package like '%$_POST[search]%'
                 
                  ");

                if (mysqli_num_rows($q)==0)
                {
                        echo "sorry please try again.";
                }
                else{
                        echo "<table style='width:60%;  margin-left:260px; margin-top:50px;
                        ' class='table table-bordered table-hover ' >";
                        echo "<tr style='background-color:#49ab9b; color:white;'>";
                                //Table header
                                echo "<th>"; echo "ID-NO";	echo "</th>";
                                echo "<th>"; echo "Packages";  echo "</th>";
                                echo "<th>"; echo "Description";  echo "</th>";
                                echo "<th>"; echo "Amount";  echo "</th>";
                                echo "</th>";
        
                        while($row=mysqli_fetch_assoc($q))
                        {
                                echo "<tr>";
                                echo "<td>"; echo $row['p_id']; echo "</td>"; 
                                echo "<td>"; echo $row['package']; echo "</td>";
                                echo "<td>"; echo $row['description']; echo "</td>";
                                echo "<td>"; echo $row['amount']; echo "</td>";
                                echo "</tr>";
                        }
                echo "</table>";                       
                }
        }
/*   if button is not pressed   then table data remain same as it is server data*/
        else{
                $res=mysqli_query($db,"SELECT * FROM packages;");

                echo "<table style='width:60%; margin-left:260px; margin-top:50px;
                ' class='table table-bordered table-hover ' >";
                        echo "<tr style='background-color:#49ab9b; color:white;'>";
                                //Table header
                                echo "<th>"; echo "ID-NO";	echo "</th>";
                                echo "<th>"; echo "Packages";  echo "</th>";
                                echo "<th>"; echo "Description";  echo "</th>";
                                echo "<th>"; echo "Amount";  echo "</th>";
                                echo "</tr>";
                        echo "</th>";
        
                        while($row=mysqli_fetch_assoc($res))
                        {
                                echo "<tr>";
                                echo "<td>"; echo $row['p_id']; echo "</td>"; 
                                echo "<td>"; echo $row['package']; echo "</td>";
                                echo "<td>"; echo $row['description']; echo "</td>";
                                echo "<td>"; echo $row['amount']; echo "</td>";
                                echo "</tr>";
                        }
                echo "</table>";  
        }   
        
        

        if(isset($_POST['submit1']))
        {
                if(isset($_SESSION['login_user']))
                {
                        mysqli_query($db, "DELETE  from packages
                        where p_id='$_POST[p_id]';");
                ?>

                        <script type="text/javascript">
                                alert("Delete Successful.");
                        </script>
                <?php
                }
                else{
                        ?>
        
                        <script type="text/javascript">
                                alert("Please login.");
                        </script>
                <?php  
                }
        }
       
 ?>

</div>



</body>
</html>