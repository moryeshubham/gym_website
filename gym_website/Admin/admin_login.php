<?php
 include "connection.php";
 include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
        <title>Gym Member Login</title>
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
    <div class="log_img">
        <br> <br><br>
        <div class="box1">
            <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"><br>
              <br> Gym Management <br>System</h1><br>
          <form name="login" action="" method="post">
            <br>
            <div class="login">
              <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br><br>
              <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br><br>
              <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
            </div>
          
          </form>
          <p style="color: white; padding-left: 15px;">
            <br><br>
            <a style="color:white; margin-left: 28px;" href="update_pass.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            Don't have an Account? &nbsp &nbsp<a style="color: white;" href="Registration.php">SIGN-UP</a>
          </p>
        </div>
    </div>
</section>

<?php
    if(isset($_POST['submit'])){
      $count=0;
      $res= mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]' ; ");
      $row=mysqli_fetch_assoc($res);
      $count= mysqli_num_rows($res);
      if($count==0){
        ?>
        <!--
          <script type="text/javascript">
            alert("username and password doesnt exist");
          </script>
        -->
        <div class="alert alert-danger" style="width:400px; height: 50px;  margin-top: 50px;
            margin-left: 470px;   background-color:rgb(230,27,35); color: white;">
          <strong>&nbsp &nbsp  &nbsp The username and password doesnt match. </strong>
        </div>
        <?php
          
      }
      else{
        /*------ if username and password matches ------*/
       $_SESSION['login_user'] = $_POST['username'];
       $_SESSION['photo']=$row['photo'];
        ?>
          <script type="text/javascript">
            window.location="index.php";
          </script>
        <?php
      }
    }


  ?>


</body>
</html>