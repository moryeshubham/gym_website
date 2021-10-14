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
    <body style="background-color: #763c63bd;"><br><br>
            <h2 style="text-align: center; font-size:35px; color:#fff;"><b>Edit &nbsp Information</b></h2>

            <?php
                $sql="SELECT * FROM admin WHERE username='$_SESSION[login_user]'";
                $result = mysqli_query($db, $sql);

                while($row = mysqli_fetch_assoc($result))
                {
                    $first=$row['first'];
                    $last=$row['last'];
                    $username=$row['username'];
                    $password=$row['password'];
                    $email=$row['email'];
                    $contact=$row['contact'];
                    
                }
            ?> 

            <div class="profile_info" style="text-align: center;">
                <span style="color: white; font-size:25px;">Welcome</span>
                <h4 style="color: white; font-size:25px;"><?php echo $_SESSION['login_user']; ?> </h4>
            </div>
            <br>
            <br>

            <form action="" method="post" enctype="multipart/form-data">
                
                <label><h4><b> Profile Image </b></h4></label>
                <input class="form-control" type="file" name="file"><br>

                <label><h4><b> First Name: </b></h4></label>
                <input class="form-control" type="text" name="first" value="<?php echo $first; ?>"><br>
                <label><h4><b>Last Name:</b></h4></label>
                <input class="form-control" type="text" name="last" value="<?php echo $last; ?>"><br>
                <label><h4><b>Username</b></h4></label>
                <input class="form-control" type="text" name="username" value="<?php echo $username; ?>"><br>
                <label><h4><b>Password</b></h4></label>
                <input class="form-control" type="text" name="password" value="<?php echo $password; ?>"><br>
                <label><h4><b>Email</b></h4></label>
                <input class="form-control" type="text" name="email" value="<?php echo $email; ?>"><br>
                <label><h4><b>Contact</b></h4></label>
                <input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>"><br><br>
                <button style="padding: 7px 12px; margin-left:180px;" class="btn btn-default" type="submit" name="submit">Save</button><br><br><br><br><br>
            </form>

    <?php 

        if(isset($_POST['submit']))
        {
            move_uploaded_file($_FILES['file']['tmp_name'],
            "images/".$_FILES['file']['name']);
            $first=$_POST['first'];
            $last=$_POST['last'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $contact=$_POST['contact']; 
            $photo=$_FILES['file']['name'];

            $sql1="UPDATE admin SET photo='$photo', first='$first', last='$last', username='$username', password='$password',
            email='$email', contact='$contact' WHERE username='".$_SESSION['login_user']."'; ";  

            if(mysqli_query($db,$sql1) )
            {
                ?>
                    <script type="text/javascript">
                        alert("Saved Successfully.");
                        window.location="profile.php";
                    </script>

                <?php
            }

        }
    ?>        
    </body>
</html>
</html>