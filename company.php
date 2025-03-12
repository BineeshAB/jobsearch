<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	$companyuser = $_SESSION['cun'];
	
	$companyquery = "select * from company where emailid='$companyuser'";
	$companydata = mysqli_query($conn, $companyquery);
	$companyresult = mysqli_fetch_assoc($companydata);
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Profile Page
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/rowcolstyle.css">
		<link rel="stylesheet" href="css/companystyle.css">
	</head>
	<body>

		<div class="header" id="navbar">
			<a href="home.php" class="logo"><span style="color:#4FC3F7;">Job</span><span style="color:#76FF03;">Search</span></a>
			<div class="header-right">
				<a href="home.php">Home</a>
				<a href="contact.php">Contact Us</a>
				<a href="about.php">About</a>
				<a href="company.php" class="active">Profile</a>
			</div>
		</div>
		<div class="content">
			<div class="companydesign">
				<center><img src="<?php echo $companyresult['imagesrc'];?>" width="200" height="200" border="3" class="pp" style="border-radius: 100px;"><h1><?php echo $companyresult['cname'];?><h1></center><br>
				<div class="companyresume">
					<div class="cdetails">
						<h2>Job Title      : <?php echo $companyresult['jobtitle'];?></h2>
						<h2>In Hand Salary : <?php echo $companyresult['salary'];?></h2>
						<h2>Qualifications : <?php echo $companyresult['qualification'];?></h2>
						<h2>Requirements   : <?php echo $companyresult['requirements'];?></h2>
						<h2>Experience     : <?php echo $companyresult['experience'];?></h2>
					</div>
					<hr class="new1">
					<br>
					<h1 class="ml">Job Details : </h1>
					<div class="jdetails">
						<h2>Job Timing     : <?php echo $companyresult['jobtiming'];?></h2>
						<h2>Address        : <?php echo $companyresult['jobaddress'];?></h2>
					</div>
					<hr class="new1">
					<br>
					<h1 class="ml">Interview Details : </h1>
					<div class="idetails">
						<h2>Interview Timing  : <?php echo $companyresult['interviewtiming'];?></h2>
						<h2>Interview Address : <?php echo $companyresult['interviewaddress'];?></h2>
						<h2>HR Name           : <?php echo $companyresult['hrname'];?></h2>
						<h2>HR Phone Number   : <?php echo $companyresult['hrnumber'];?></h2>
					</div>
				</div>
				<center><button name="logout" id="logout" class="btn" onclick="logoutpage()">LOG OUT</button></center>
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
			
			function logoutpage(){
				window.location.href = "logout.php";
			}
		</script>
	</body>
</html>