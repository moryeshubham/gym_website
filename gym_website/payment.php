<?php
 include "connection.php";
 include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
        <title>Payment</title>
        <link rel="stylesheet" type="text/css" href="style-1.css">
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
       
            <!--using bootstrap-->
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

             <style>
                    
             </style>

</head>
<body style="background-color: #2bedf3c4;">
    <h1 style="margin-left:470px; margin-top:50px; font-size: 55px;font-family: Lucida Console;">
    <b>Make New Payment</b></h1> 
    <form name="payment_form" action="" method="POST">
    
    <label style=" margin-left:520px; margin-top:50px; font-size:16px;">Full Name :-</label>
    <input class="form-control" style="height: 40px; width: 390px; margin-left:520px; " type="text"
     name="fullname" placeholder="Full Name" required=""> <br>

     <label style=" margin-left:520px; margin-top:20px; font-size:16px;">ID-NO :-</label>
    <input class="form-control" style="height: 40px; width: 390px; margin-left:520px;" type="text"
     name="id_no" placeholder="ID-NO" required=""> <br>
  <!--trainer-->
  <label  style=" margin-left:520px; margin-top:20px; font-size:16px;">Trainer :-</label>
  <select style="height: 40px; width: 280px; margin-left:520px; " name="trainer">
    <option disabled selected>-- Select Trainer--</option>
    <?php
       
        $records = mysqli_query($db, "SELECT first From trainer");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['first'] ."'>" .$data['first'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
<br><br>
  <!--package-->
  <label style=" margin-left:520px; margin-top:20px; font-size:16px;">Package</label>
  <select style="height: 40px; width: 280px; margin-left:520px;" name="package">
    <option disabled selected>-- Select Package--</option>
    <?php
       
        $record = mysqli_query($db, "SELECT package From packages");  // Use select query here 

        while($data = mysqli_fetch_array($record))
        {
            echo "<option value='". $data['package'] ."'>" .$data['package'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select> <br>
  

  <!--amount -->
  <label style=" margin-left:520px; margin-top:30px; font-size:16px;">Amount :-</label>
  <input class="form-control" style="height: 40px; width: 390px; margin-left:520px;" type="text"
     name="amount" placeholder="Amount" required=""> <br>

   <!--payment-id -->
  <label style=" margin-left:520px; margin-top:20px; font-size:16px;">Payment-ID</label>
  <input class="form-control" style="height: 40px; width: 390px; margin-left:520px;" type="text"
     name="payment_id" placeholder="Payment-ID" required=""> <br>


    <!--payment-type -->
  <label style=" margin-left:520px; margin-top:20px; font-size:16px;">Payment-Type</label>
  <input class="form-control" style="height: 40px; width: 390px; margin-left:520px;" type="text"
     name="payment_type" placeholder="Payment-type" required=""> <br>

     <input class="btn btn-default" id="submit_fd" type="submit" name="submit1" 
     value="SUBMIT" style="color:white; background-color: #333;
      width: 80px; height: 40px; margin-left: 680px; margin-bottom:80px; margin-top:40px; " > 
</form>


<?php

        if(isset($_POST['submit1']))
        {
            $ql="INSERT INTO `payment` VALUES ('$_POST[fullname]','$_POST[id_no]','$_POST[trainer]'
            ,'$_POST[package]','$_POST[amount]','$_POST[payment_id]','$_POST[payment_type]');";
            mysqli_query($db,$ql);

            ?>
            <script type="text/javascript">
             alert("Payment successful");
             window.location="payment.php";
            </script>
        <?php
        }
        else if(isset($_POST['submit23'])){
            ?>
            <script type="text/javascript">
             alert("payment not successful");
             </script>
             <?php
        }
?>
</body>
</html>