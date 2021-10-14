<?php
    include "navbar.php";
    include "connection.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile</title>
        <style type="text/css">
            .form-control{
                width: 420px;
                height: 38px;
            }
            form{
                padding-left: 470px;
            }
        </style>
    </head>
    <body style="background-color: #e28756c2;"><br><br>
           

            <!-- delete bar -->
            <form class="navbar-form" method="post" name="del_searchbar">
                        <div>
                                <input type="text" class="form-control" name="id_no" 
                                 placeholder="Enter Trainer ID-NO." required="">
                                <button style="background-color:#49ab9b ; color:white;" type="submit" name="submit1"
                                 class="btn btn=default"> Delete
                                </button>
                        </div>
                </form>
                <?php
                 if(isset($_POST['submit1']))
                 {
                         if(isset($_SESSION['login_user']))
                         {
                                 mysqli_query($db, "DELETE  from trainer
                                 where id_no='$_POST[id_no]';");
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


            <!--showing table-->
            <?php
            $res=mysqli_query($db,"SELECT * FROM `trainer`;");

                echo "<table class='table table-bordered table-hover ' style='width:60%; margin-left:250px; margin-top:50px;' >";
                        echo "<tr style='background-color:#49ab9b;  color:white;'>";
                                //Table header
                                echo "<th>"; echo "ID-NO";	echo "</th>";
                                echo "<th>"; echo "First-Name";  echo "</th>";
                                echo "<th>"; echo "Last-Name";  echo "</th>";
                                echo "<th>"; echo "Email-Id";  echo "</th>";
                                
                                echo "</tr>";
                        echo "</th>";
        
                        while($row=mysqli_fetch_assoc($res))
                        {
                                echo "<tr>";
                                echo "<td>"; echo $row['id_no']; echo "</td>"; 
                                echo "<td>"; echo $row['first']; echo "</td>";
                                echo "<td>"; echo $row['last']; echo "</td>";
                                echo "<td>"; echo $row['email']; echo "</td>";
                              
                                echo "</tr>";
                        }
                echo "</table>";  
            ?>

<br><br><br>

            <h2 style="text-align: center; font-size:35px; color:#fff;"><b>Edit &nbsp  Trainer-Information</b></h2>
            <br>
            <br>

            <form action="" method="post" enctype="multipart/form-data">
                
                <label><h4><b> ID-NO: </b></h4></label>
                <input class="form-control" type="text" name="id_no" ><br>

                <label><h4><b> First Name: </b></h4></label>
                <input class="form-control" type="text" name="first" ><br>
                <label><h4><b>Last Name:</b></h4></label>
                <input class="form-control" type="text" name="last" <br>
                <label><h4><b>Email</b></h4></label>
                <input class="form-control" type="text" name="email" ><br>
                <label><h4><b>Timing</b></h4></label>
                <input class="form-control" type="text" name="timing" ><br>
                <label><h4><b>Status</b></h4></label>
                <input class="form-control" type="text" name="status"><br>
                <label><h4><b>Level</b></h4></label>
                <input class="form-control" type="text" name="level" ><br>
                <label><h4><b>Department</b></h4></label>
                <input class="form-control" type="text" name="department"><br>
                <button style="padding: 7px 12px; margin-left:180px;" class="btn btn-default" 
                type="submit" name="submit">Save</button><br><br><br><br><br>
            </form>

    <?php 

        if(isset($_POST['submit']))
        {
          

            $sql1="INSERT INTO `trainer` VALUES('$_POST[id_no]','$_POST[first]', '$_POST[last]', '$_POST[email]',
            '$_POST[timing]', '$_POST[status]', '$_POST[level]', '$_POST[department]'); ";  

            if(mysqli_query($db,$sql1) )
            {
                ?>
                    <script type="text/javascript">
                        alert("Saved Successfully.");
                        window.location="edit_trainer_info.php";
                    </script>

                <?php
            }

        }
    ?>        
    </body>
</html>
</html>