<?php
 include "connection.php";
 include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
        <title>Gym_Info</title>
        <link rel="stylesheet" type="text/css" href="style-1.css">
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
       
            <!--using bootstrap-->
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

             <style>
                     .search_b{
                             margin-top: 30px;
                             margin-left: 1040px;
                             margin-bottom: 5px;
                             margin-right: 20px;
                     }
             </style>

</head>
<body style="background-color:grey; " >

<div style="margin-left:20px; "> <!--this div tag is used for give margin to table -->
  <!--                 search bar           -->
        <div class="search_b">
                <form class="navbar-form" method="post" name="t_searchbar">
                        <div>
                                <input type="text" class="form-control" name="search" placeholder="
                                search Here..." required="">
                                <button style="background-color:#49ab9b ; color:white;" type="submit" name="submit"
                                 class="btn btn=default">
                                <span class="glyphicon glyphicon-search"> </span>
                                </button>
                        </div>
                </form>
        </div>
<h1 style="margin-left:500px; font-size:50px; color:lime; margin-bottom:20px;"> List of Trainers</h1>

<br>
<br>
<?php
        if(isset($_POST['submit']))
        {
                $q=mysqli_query($db,"SELECT * FROM trainer where first like '%$_POST[search]%' 
                 OR last like '%$_POST[search]%' 
                 OR level like '%$_POST[search]%'
                 OR status like '%$_POST[search]%'
                 OR department like '%$_POST[search]%'
                  ");

                if (mysqli_num_rows($q)==0)
                {
                        echo "sorry please try again.";
                }
                else{
                        echo "<table class='table table-bordered table-hover ' >";
                        echo "<tr style='background-color:#49ab9b; color:white;'>";
                                //Table header
                                echo "<th>"; echo "ID-NO";	echo "</th>";
                                echo "<th>"; echo "First-Name";  echo "</th>";
                                echo "<th>"; echo "Last-Name";  echo "</th>";
                                echo "<th>"; echo "Email-Id";  echo "</th>";
                                echo "<th>"; echo "Time";  echo "</th>";
                                echo "<th>"; echo "Status";  echo "</th>";
                                echo "<th>"; echo "Level";  echo "</th>";
                                echo "<th>"; echo "Department";  echo "</th>";
                                echo "</tr>";
                        echo "</th>";
        
                        while($row=mysqli_fetch_assoc($q))
                        {
                                echo "<tr>";
                                echo "<td>"; echo $row['id_no']; echo "</td>"; 
                                echo "<td>"; echo $row['first']; echo "</td>";
                                echo "<td>"; echo $row['last']; echo "</td>";
                                echo "<td>"; echo $row['email']; echo "</td>";
                                echo "<td>"; echo $row['timing']; echo "</td>";
                                echo "<td>"; echo $row['status']; echo "</td>";
                                echo "<td>"; echo $row['level']; echo "</td>";
                                echo "<td>"; echo $row['department']; echo "</td>";
                                echo "</tr>";
                        }
                echo "</table>";                       
                }
        }
/*   if button is not pressed   then table data remain same as it is server data*/
        else{
                $res=mysqli_query($db,"SELECT * FROM `trainer`;");

                echo "<table class='table table-bordered table-hover ' >";
                        echo "<tr style='background-color:#49ab9b; color:white;'>";
                                //Table header
                                echo "<th>"; echo "ID-NO";	echo "</th>";
                                echo "<th>"; echo "First-Name";  echo "</th>";
                                echo "<th>"; echo "Last-Name";  echo "</th>";
                                echo "<th>"; echo "Email-Id";  echo "</th>";
                                echo "<th>"; echo "Time";  echo "</th>";
                                echo "<th>"; echo "Status";  echo "</th>";
                                echo "<th>"; echo "Level";  echo "</th>";
                                echo "<th>"; echo "Department";  echo "</th>";
                                echo "</tr>";
                        echo "</th>";
        
                        while($row=mysqli_fetch_assoc($res))
                        {
                                echo "<tr>";
                                echo "<td>"; echo $row['id_no']; echo "</td>"; 
                                echo "<td>"; echo $row['first']; echo "</td>";
                                echo "<td>"; echo $row['last']; echo "</td>";
                                echo "<td>"; echo $row['email']; echo "</td>";
                                echo "<td>"; echo $row['timing']; echo "</td>";
                                echo "<td>"; echo $row['status']; echo "</td>";
                                echo "<td>"; echo $row['level']; echo "</td>";
                                echo "<td>"; echo $row['department']; echo "</td>";
                                echo "</tr>";
                        }
                echo "</table>";  
        }    
 ?>

</div>




</body>
</html>