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
<h1 style="margin-left:500px; font-size:50px; color:lime; margin-bottom:20px;"> Packages</h1>

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
                        echo "<table class='table table-bordered table-hover ' style='width:60%; margin-left:200px;' >";
                        echo "<tr style='background-color:#49ab9b; color:white;'>";
                                //Table header
                                echo "<th>"; echo "ID-NO";	echo "</th>";
                                echo "<th>"; echo "Packages";  echo "</th>";
                                echo "<th>"; echo "Description";  echo "</th>";
                                echo "<th>"; echo "Amount";  echo "</th>";
                                echo "</tr>";
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
                $res=mysqli_query($db,"SELECT * FROM `packages`;");

                echo "<table class='table table-bordered table-hover '  style='width:60%; margin-left:200px;'>";
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
 ?>

</div>




</body>
</html>