<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	$personuser = $_SESSION['pun'];
	
	$companyuser = $_SESSION['cun'];
	
	$personquery = "select * from person where emailid='$personuser'";
	$persondata = mysqli_query($conn, $personquery);
	$personresult = mysqli_fetch_assoc($persondata);
	
	$companyquery = "select * from company where emailid='$companyuser'";
	$companydata = mysqli_query($conn, $companyquery);
	$companyresult = mysqli_fetch_assoc($companydata);
	
	if(isset($_POST['smessage'])){
		$fname = $_POST['firstname'];
		$comment = $_POST['subject'];
		$mail = $_POST['email'];
		$msg = $_POST['message'];
		
		if($personuser || $companyuser){
			$to = "bineeshalakkal22@gmail.com";
			$subject = $comment;
			$message = $msg;
			$header = "From: ".$mail;

			if(mail($to, $subject, $message, $header)){
				echo '<script>alert("Mail Has Sended")</script>';
			}
			else{
				echo '<script>alert("Mail Cannot be Send")</script>';
			}
		}
		else{
			header('location: index.php');
		}
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Contact Page
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/rowcolstyle.css">
		<link rel="stylesheet" href="css/contactstyle.css">
	</head>
	<body>

		<div class="header" id="navbar">
			<a href="home.php" class="logo"><span style="color:#4FC3F7;">Job</span><span style="color:#76FF03;">Search</span></a>
			<div class="header-right">
				<a href="home.php">Home</a>
				<a href="contact.php" class="active">Contact Us</a>
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
			<div class="contactdesign">
				<center>
					<h1>Contact Us</h1>
					<h3>If any Problem Just Message Us</h3>
				</center>
				<form action="" method="post">
					<?php
						if($personuser){
							?> <input type="text" id="fullname" name="fullname" class="textbox" value="<?php echo $personresult['firstname']." ".$personresult['middlename']." ".$personresult['lastname'];?>" placeholder="Enter Your Full Name" required> <?php
						}
						else if($companyuser){
							?> <input type="text" id="fullname" name="fullname" class="textbox" value="<?php echo $companyresult['cname'];?>" placeholder="Enter Your Full Name" required> <?php
						}
						else{
							?><input type="text" id="fullname" name="fullname" class="textbox" value="" placeholder="Enter Your Full Name" required> <?php
						}
					?>
					<?php
						if($personuser){
							?> <input type="email" id="email" name="email" class="textbox" value="<?php echo $personresult['emailid'];?>" placeholder="Enter Your Email ID" required> <?php
						}
						else if($companyuser){
							?> <input type="email" id="email" name="email" class="textbox" value="<?php echo $companyresult['emailid'];?>" placeholder="Enter Your Email ID" required> <?php
						}
						else{
							?> <input type="email" id="email" name="email" class="textbox" value="" placeholder="Enter Your Email ID" required> <?php
						}
					?>
					<input type="text" id="subject" name="subject" class="textbox" placeholder="Enter Your Subject" required>
					<textarea id="message" name="message" class="textbox" placeholder="Give Us A Message..." style="height:170px" required></textarea>
					<input type="submit" name="smessage" id="smessage" value="Send" class="btn">
				</form>
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