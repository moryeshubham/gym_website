<?php
 include "connection.php";
session_start();
?>



<!DOCTYPE html>
<html>
<head>
	<title>
		Online Gym Management System
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--using bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

	<!-- slideshow from w3schools-->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<!-- icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		.fa:hover {      
    		opacity: 0.7;
}   
		.fa{
			font-size: 25px;
		}
		</style>
</head>


<body>
	
		<header>
		<div class="logo">
			<img src="images/new_logo.jpg">
		</div>

		<?php
			if(isset($_SESSION['login_user'])){
			?>
				<nav>
					<ul class="nav navbar-nav">
						<li><a href="index.php">HOME</a></li>
						<li><a href="trainer.php">Trainer</a></li>
						<li><a href="#benifits">MEMBER-BENIFITS</a></li>
						<li><a href="#fitness-center">FITNESS-CENTER</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
			<?php
			}
			else{
				?>
					<nav>
						<ul class="nav navbar-nav">
							<li><a href="index.php">HOME</a></li>
							<li><a href="trainer.php">Trainer</a></li>
							<li><a href="feedback.php">FEEDBACK</a></li>
							<li><a href="#fitness-center">FITNESS-CENTER</a></li>
							<li><a href="#benifits">MEMBER-BENIFITS</a></li>
							<li><a href="gym_member_login.php"><span class="glyphicon glyphicon-log-in">__LOGIN</span></a></li>
                        <li><a style="margin-right:10px;"  href="Registration.php"><span class="glyphicon glyphicon-user">__SIGN-UP</span></a></li>
						</ul>
					</nav>
			<?php }
		?>

			
		</header>

	
		<section style="height: 700px;">
		<div class="sec_img">
			<br><br>
			<h1 style="color:white;" class="project_name" style=" word-spacing: 30px; text-align: center;"><b> 
				<span style="background-color:skyblue; margin-left:300px; "> &nbsp FITNESS CLUB MANAGEMENT SYSTEM &nbsp</span> </b>
			</h1>
			<div class="box">
				<br><br><br><br>
				<h1 style="text-align: center; font-size: 35px;">Welcom to Our Gym</h1><br><br>
				<h1 style="text-align: center;font-size: 25px;">Opens at: 09:00 </h1><br>
				<h1 style="text-align: center;font-size: 25px;">Closes at: 17:00 </h1><br>
			</div>
		</div>
		</section>
	
		<div class="line_1">  </div>
	
<p id="fitness-center">
	
		<div class="slideshow" style="background-color:#00a6cb8f;  padding-bottom: 20px; width:auto; height:600px; ">
			
			<div class="w3-content w3-section" style="width: 800px; padding-top:100px; margin-left:400px; ">
				<img class="mySlides w3-animate-left" src="images/a.jpg" style="width: 540px; height: 440px;">
				<img class="mySlides w3-animate-left" src="images/b.jpg" style="width: 540px; height: 440px;">
				<img class="mySlides w3-animate-fading" src="images/c.jpg" style="width: 540px; height: 440px;">
				<img class="mySlides w3-animate-fading" src="images/d.jpg" style="width: 540px; height: 440px;">
				<img class="mySlides w3-animate-fading" src="images/e.jpg" style="width: 540px; height: 440px;">
				<img class="mySlides w3-animate-fading" src="images/f.jpg" style="width: 540px; height: 440px;">
				<img class="mySlides w3-animate-fading" src="images/g.jpg" style="width: 540px; height: 440px;">
				<img class="mySlides w3-animate-fading" src="images/h.jpg" style="width: 540px; height: 440px;">
			</div>
			</p>
		
			<script type="text/javascript">
				var a=0;
				carousel();
		
				function carousel()
				{
					var i;
					var x= document.getElementsByClassName("mySlides");
		
					for(i=0; i<x.length; i++)
					{
						x[i].style.display="none";
					}
		
					a++;  
					if(a > x.length) {a = 1}
						x[a-1].style.display = "block";
						setTimeout(carousel, 2000);
				}
			</script>
	</div>

	<section id="benifits">
		<div style="background-image: url('images/bghyt.png'); width:auto; margin-bottom: 0; height:855px;">
		</div>
	</section>
	
<?php 
 include "footer.php";
?>	

</body>

</html>