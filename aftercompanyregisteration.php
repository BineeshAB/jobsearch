<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	$sn = $_SESSION['companyid'];
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Company Registeration Page
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/rowcolstyle.css">
		<link rel="stylesheet" href="css/aboutstyle.css">
	</head>
	<body>
		<div class="header" id="navbar">
			<center><span style="color:#4FC3F7;font-size: 32px;font-weight: bold;">Job</span><span style="color:#76FF03;font-size: 32px;font-weight: bold;">Search</span></center>
		</div>
		
		<div class="content">
			<div class="aboutdesign">
				
				<h2>Your Account Will Be Activate in 24 Hours After Verifying.</h2>
				<h2>We Will Contact You For Verification.</h2>
				<h2>Your Verification ID is <span style="color:red;"><?php echo "0".$sn; ?></span></h2>
				<h2>If Your Account isn't Activated Then Please Inform As at Our Mail address bineeshab@gmail.com our call us on 1234567890</h2><br><br><br>
				<center><h2><a href="index.php">OK</a></h2></center>
				
			</div>
		</div>
		<div class="footer">
			<p>A Project for <b>Tybsc</b>. All Rights Reserved <i class="fa fa-copyright" aria-hidden="true"></i> 2020. This Website Is Made By <a href="">Bineesh</a></p>
		</div>
		
		<script>
			window.onscroll = function() {myFunction()};

			var navbar = document.getElementById("navbar");
			var sticky = navbar.offsetTop;

			function myFunction() {
				if (window.pageYOffset >= sticky) {
					navbar.classList.add("sticky")
				} else {
					navbar.classList.remove("sticky");
				}
			}
		</script>
	</body>
</html>