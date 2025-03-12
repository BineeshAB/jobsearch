<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	$personuser = $_SESSION['pun'];
	
	$companyuser = $_SESSION['cun'];
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			About Page
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/rowcolstyle.css">
		<link rel="stylesheet" href="css/aboutstyle.css">
	</head>
	<body>

		<div class="header" id="navbar">
			<a href="home.php" class="logo"><span style="color:#4FC3F7;">Job</span><span style="color:#76FF03;">Search</span></a>
			<div class="header-right">
				<a href="home.php">Home</a>
				<a href="contact.php">Contact Us</a>
				<a href="about.php" class="active">About</a>
				<?php
					if($personuser){
						?> <a href="profile.php">Profile</a> <?php
					}
					else if($companyuser){
						?> <a href="company.php">Profile</a> <?php
					}
				?>
			</div>
		</div>
		<div class="content">
			<div class="aboutdesign">
				<h2><span style="color:#FAFAFA">____</span>About JobSearch.com</u></h2>
				<h2>jobsearch.com is a website to find the Job and Upload Job. It is a easiest way to find job or find better person for work.</h2><br><br>
				
				
				<h2><span style="color:#FAFAFA">____</span>Founder and Purpose of Making JobSearch.com</h2>
				<h2>This website is maded for TyBsc.CS Project. This website is made by Mr. <a href="">Bineesh B. Alakkal</a></h2>
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