
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Online Vaccine Booking</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="css/button/button.css">
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
	
	</head>
<?php

if(isset($_SESSION['email']) && !empty($_SESSION['email'])) 
{ 
      
   
 
$a=$_SESSION['email'];
//$b=$_SESSION['pid']; 
?>
	<body>
	
	<div class="site-content">
			<header class="site-header" data-bg-image="">
				<div class="container">
					<div class="header-bar">
						<a href="index.php" class="branding">
							<img src="images/childvaccinelogo.png" alt="" class="logo">
							<div class="logo-type">
								<h1 class="site-title">ChildHealthKerala</h1>
								<small class="site-description">Protecting Kerala's Future !</small>
							</div>
						</a>

						<nav class="main-navigation">
							<button class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
							<li class="home menu-item"><a href="index.php"><img src="images/home-icon.png" alt="Home"></a></li>
								<li class="menu-item"><a href="contactus1.php">Contact us</a></li>
								<li class="menu-item"><a href="healthlogin.php">HealthCenter</a></li>
								<li class="menu-item"><a href="registration.php">Register</a></li>
								<li class="menu-item"><a href="login.php">Login</a></li>
							</ul>
						</nav>

						<div class="mobile-navigation"></div>
					</div>
				</div>
			</header>
		</body>

	<?php   } 
		
		else{
			?>
<body>
	<div class="site-content">
			<header class="site-header" data-bg-image="">
				<div class="container">
					<div class="header-bar">
						<a href="index.php" class="branding">
							<img src="images/childvaccinelogo.png" alt="" class="logo">
							<div class="logo-type">
								<h1 class="site-title">ChildHealthKerala</h1>
								<small class="site-description">Protecting Kerala's Future !</small>
							</div>
						</a>

						<nav class="main-navigation">
							<button class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
								<li class="home menu-item"><a href="index.php"><img src="images/home-icon.png" alt="Home"></a></li>
								<li class="menu-item"><a href="contactus1.php">Contact us</a></li>
								<li class="menu-item"><a href="healthlogin.php">HealthCenter</a></li>
								<li class="menu-item"><a href="registration.php">Register</a></li>
								<li class="menu-item"><a href="login.php">Login</a></li>
							
							</ul>
						</nav>

						<div class="mobile-navigation"></div>
					</div>
				</div>
			</header>
		</body>
       <?php
		}
		?>		
	<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
