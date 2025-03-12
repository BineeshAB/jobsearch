<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	$personuser = $_SESSION['pun'];
	$companyuser = $_SESSION['cun'];
	
	$personemail = $_SESSION['personemailid'];
	
	$personquery = "select * from person where emailid='$personemail'";
	$persondata = mysqli_query($conn, $personquery);
	$personresult = mysqli_fetch_assoc($persondata);
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Profile View Page
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/rowcolstyle.css">
		<link rel="stylesheet" href="css/profilestyle.css">
		<link rel="stylesheet" media="print" href="css/print.css" />
	</head>
	<body>

		<div class="header" id="navbar">
			<a href="home.php" class="logo"><span style="color:#4FC3F7;">Job</span><span style="color:#76FF03;">Search</span></a>
			<div class="header-right">
				<a href="home.php">Home</a>
				<a href="contact.php">Contact Us</a>
				<a href="about.php">About</a>
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
			<div class="profiledesign">
				<div id="printresume">
					<div class="row">
						<div class="col">
							<img src="<?php echo $personresult['imagesrc'];?>" width="120" height="150" border="2" class="pp">
						</div>
						<div class="col">
							<div class="headerprofile">
								<h2>Full Name : <?php echo $personresult['firstname']." ".$personresult['middlename']." ".$personresult['lastname'];?></h2>
								<h2>Date Of Birth : <?php echo $personresult['date']." ".$personresult['month']." ".$personresult['year'];?></h2>
								<h2>Phone No. / Email ID : <?php echo $personresult['phoneno'];?> / <?php echo $personresult['emailid'];?></h2>
							</div>
						</div>
					</div>
					<hr class="new1">
					<br>
					<h1 class="ml">Personal Information : </h1>
					<div class="pinfo">
						<h2>Nationality   : <?php echo $personresult['nationality'];?></h2>
						<h2>Address        : <?php echo $personresult['address'];?></h2>
						<h2>Martial Status : <?php echo $personresult['status'];?></h2>
						<h2>Gender         : <?php echo $personresult['gender'];?></h2>
						<h2>Language Known : <?php echo $personresult['language'];?> </h2>
						<h2>Hobbies        : <?php echo $personresult['hobbies'];?></h2>
						<h2>Achievements / Skills   : <?php echo $personresult['skills'];?></h2>
					</div>
					<hr class="new1">
					<br>
					<h1 class="ml">Qualifications : </h1>
					<div class="edu">
						<h2><?php echo $personresult['ssc'];?> SSC in <?php echo $personresult['sscyear'];?> From <?php echo $personresult['sscfrom'];?> with <?php echo $personresult['sscpercentage'];?>%.</h2>
						<h2><?php echo $personresult['hsc'];?> HSC in <?php echo $personresult['hscyear'];?> From <?php echo $personresult['hscfrom'];?> with <?php echo $personresult['hscpercentage'];?>%.</h2>
					</div>
					<hr class="new1">
					<br>
					<h1 class="ml">Experience : </h1>
					<div class="oedu">
						<h2><?php echo $personresult['experience'];?>  </h2>
					</div>
					<br>
					<br>
					<br>
					<h2>Place : </h2>
					<h2>Date : </h2>
					<h2 class="left"><?php echo $personresult['firstname']." ".$personresult['middlename']." ".$personresult['lastname'];?> </h2>
				</div>
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
			function pscreen(){
				window.print();
			}
			function logoutpage(){
				window.location.href = "logout.php";
			}
		</script>
	</body>
</html>