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
			Home Page
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/rowcolstyle.css">
		<link rel="stylesheet" href="css/homestyle.css">
	</head>
	<body>

		<div class="header" id="navbar">
			<a href="home.php" class="logo"><span style="color:#4FC3F7;">Job</span><span style="color:#76FF03;">Search</span></a>
			<div class="header-right">
				<a href="home.php" class="active">Home</a>
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
			<div class="homedesign">
				<div class="row">
					<?php
						if($companyuser){
							$personquery = "select * from person";
							$persondata = mysqli_query($conn, $personquery);
							while($personresult = mysqli_fetch_assoc($persondata)){
								?>
								<div class="col">
									<div class="boxtitle">
										<form action="" method="post">
											<h2>Name : <?php echo $personresult['firstname']." ".$personresult['middlename']." ".$personresult['lastname'];?></h2>
											<h2>Qualification : <?php echo "SSC ".$personresult['ssc']." and HSC ".$personresult['hsc'];?></h2>
											<h2>Experience : <?php echo $personresult['experience'];?></h2>
											<input type="hidden" value="<?php echo $personresult['emailid'];?>" name="pemailid">
											<input type="submit" value="View More" name="persondetails" class="btn">
											<?php
												if(isset($_POST['persondetails'])){
													$personemail = $_POST['pemailid'];
													$_SESSION['personemailid'] = $personemail;
													header('location: viewprofile.php');
												}
											?>
										</form>
									</div>
								</div>
								<?php
							}
						}
					?>
				</div>
				<div class="row">
					<?php
						if($personuser){
							$companyquery = "select * from company where permission='Confirmed'";
							$companydata = mysqli_query($conn, $companyquery);
							while($companyresult = mysqli_fetch_assoc($companydata)){
								?>
								<div class="col">
									<div class="boxtitle">
										<form action="" method="post">
											<h2>Job Title : <?php echo $companyresult['cname'];?></h2>
											<h2>Required Qualification : <?php echo $companyresult['qualification'];?></h2>
											<h2>Salary : <?php echo $companyresult['salary'];?></h2>
											<input type="hidden" value="<?php echo $companyresult['emailid'];?>" name="cemailid">
											<input type="submit" value="View More" name="companydetails" class="btn">
											<?php
												if(isset($_POST['companydetails'])){
													$companyemail = $_POST['cemailid'];
													$_SESSION['companyemailid'] = $companyemail;
													header('location: viewcompany.php');
												}
											?>
										</form>
									</div>
								</div>
								<?php
							}
						}
					?>
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
		</script>
	</body>
</html>