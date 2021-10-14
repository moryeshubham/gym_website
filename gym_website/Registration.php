<?php
 include "connection.php";
 include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
        <title> Gym_Member_Registration </title>
        <link rel="stylesheet" type="text/css" href="style-1.css">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
       
    <!--using bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>

<body>
 
<section>
    <div class="reg_img">
        <br> <br><br><br>
        <div class="box2" style="height: 700px; width: 450px; background-color: #e60f0f6c;
            	margin: 70px auto; opacity: .6; color: whitesmoke;"
        >
            <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"><br>Gym Management <br> System</h1> 
            <h1 style="text-align: center; font-size: 25px;">User Registration Form</h1><br><br>
          <form name="Registration" action="" method="post">
            <div class="login">
              <input class="form-control" type="text" name="first" placeholder="First Name" required=""> <br>
              <input class="form-control"  type="text" name="last" placeholder="Last Name" required=""> <br>
              <input class="form-control"  type="text" name="username" placeholder="Username" required=""> <br>
              <input class="form-control"  type="password" name="password" placeholder="Password" required=""> <br>
              <input class="form-control"  type="text" name="id_no" placeholder="ID_NO" required=""><br>
              <input class="form-control"  type="text" name="email" placeholder="Email-ID" required=""><br>
              <input class="form-control"  type="text" name="contact" placeholder="Phone Number" required="">
              <br><br>
              <input class="btn btn-default" id="sign_up_button" type="submit" name="submit" value="Sign Up" style="color:brown; width: 70px; height: 30px"> 
                    <br><br>
            </a> &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp 
            Have An Account! &nbsp &nbsp<a style="color: white;" href="gym_member_login.php">SIGN-IN</a>  
            
          </form><br>
   
        </div>
      </div>
    </section>

    <?php

if(isset($_POST['submit']))
{
  $count=0;
  $sql="SELECT username from `gym_members`";
  $res=mysqli_query($db,$sql);

  while($row=mysqli_fetch_assoc($res))
  {
    if($row['username']==$_POST['username'])
    {
      $count=$count+1;
    }
  }
  if($count==0)
  {
    mysqli_query($db,"INSERT INTO `gym_members` VALUES('$_POST[first]', 
    '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[id_no]',
     '$_POST[email]', '$_POST[contact]','user_logo.png');");
  ?>
    <script type="text/javascript">
     alert("Registration successful");
    </script>
    
  <?php
  }
  else
  {

    ?>
      <script type="text/javascript">
        alert("The username already exist.");
      </script>
    <?php

  }

}

?>



    </body>
    </html>
