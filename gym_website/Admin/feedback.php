<?php
 include "connection.php";
 include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
        <title> Feedback_Form </title>
        <link rel="stylesheet" type="text/css" href="style-1.css">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
       
    <!--using bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>

<body style="background-color: rgb(8,162,164);">
<br>

<div class="box3" style="height: 600px; width: 450px; background-color:white ;
            	margin: 70px auto;  " >
            <h1 style="text-align: center; font-size: 40px; padding-top:40px; color:hotpink;"><b> Feedback &nbsp  Form</b> </h1><br>
           
            <form name="Feedback" action="" method="post">
            <br>
                <input class="form-control" style="height: 40px; width: 280px; margin-left:80px; background-color:yellow;" type="text" name="name" placeholder="Full Name" required=""> <br>
                <input class="form-control" style="height: 40px; width: 280px; margin-left:80px; background-color:yellow;" type="text" name="contact" placeholder="Contact" required=""> <br>
                <input class="form-control" style="height: 40px; width: 280px; margin-left:80px; background-color:yellow;" type="text" name="email" placeholder="Email-Id" required=""> <br><br>
                <textarea  name="feedback_comment" placeholder="Your Feedback....." style="height:140px; width: 320px; margin-left:65px; background-color:yellow;"></textarea> 
              
                <input class="btn btn-default" id="submit_fd" type="submit" name="submit" value="SUBMIT" style="color:white; background-color: rgb(8,162,164); width: 80px; height: 40px; margin-left: 180px; margin-top:40px;" > 
            </form>
 </div>

         

    <?php

        if(isset($_POST['submit']))
        {
            $ql="INSERT INTO `feedback_comments` VALUES ('$_POST[name]','$_POST[contact]','$_POST[email]','$_POST[feedback_comment]');";
            if(mysqli_query($db,$ql)){
                $q="SELECT * FROM `feedback_comments` ORDER BY `feedback_comment` DESC";
                $res=mysqli_query($db,$q);

                echo "<table class='table table-bordered table-hover ' >";
                        echo "<tr style='background-color:#49ab9b; color:white;'>";
                                //Table header
                                echo "<th>"; echo "Name";	echo "</th>";
                                echo "<th>"; echo "Comments";  echo "</th>";
                        echo "</tr>";
                echo "</th>";

				while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
							echo "<td>"; echo $row['name']; echo "</td>";
                            echo "<td>"; echo $row['feedback_comment']; echo "</td>";
						echo "</tr>";
					}
                echo "</table>";
            }}


        else{
                $q="SELECT * FROM `feedback_comments` ORDER BY `feedback_comment` DESC";
                $res=mysqli_query($db,$q);

                echo "<table class='table table-bordered table-hover ' >";
                        echo "<tr style='background-color:#49ab9b; color:white;'>";
                                //Table header
                                echo "<th>"; echo "Name";	echo "</th>";
                                echo "<th>"; echo "Comments";  echo "</th>";
                        echo "</tr>";
                echo "</th>";

                while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
							echo "<td>"; echo $row['name']; echo "</td>";
                            echo "<td>"; echo $row['feedback_comment']; echo "</td>";
						echo "</tr>";
					}
                echo  "</table>";  
                }
?>



<?php
	include "footer.php" ?>
</body>
</html>