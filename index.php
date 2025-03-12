<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	if(isset($_POST['loginbtn'])){
		$personuser = $_POST['username'];
		$personpwd = $_POST['password'];
		
		$companyuser = $_POST['username'];
		$companypwd = $_POST['password'];
		
		$adminuser = $_POST['username'];
		$adminpwd = $_POST['password'];
		
		$personquery = "select * from person where emailid='$personuser' && password='$personpwd'";
		$persondata = mysqli_query($conn, $personquery);
		$persontotal = mysqli_num_rows($persondata);
		
		if($persontotal == 1){
			$_SESSION['pun'] = $personuser;
			header('location:home.php');
		}
		
		if($persontotal == 0){
			
			$companyquery = "select * from company where emailid='$companyuser' && password='$companypwd' && permission='Confirmed'";
			$companydata = mysqli_query($conn, $companyquery);
			$companytotal = mysqli_num_rows($companydata);
			
			if($companytotal == 1){
				
				$_SESSION['cun'] = $companyuser;
				header('location:home.php');
			}
			else if($companytotal == 0){
				
				$adminquery = "select * from admin where adminemailid='$companyuser' && adminpassword='$companypwd'";
				$admindata = mysqli_query($conn, $adminquery);
				$admintotal = mysqli_num_rows($admindata);
				
				if($admintotal == 1){
					
				$_SESSION['aun'] = $adminuser;
				header('location:admin.php');
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Login Page
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/loginstyle.css">
	</head>
	<body>
		<div class="header" id="navbar">
			<center><span style="color:#4FC3F7;font-size: 32px;font-weight: bold;">Job</span><span style="color:#76FF03;font-size: 32px;font-weight: bold;">Search</span></center>
			
		</div>
		<div class="loginForm">
			<form action="" method="post">
				<h1>LOGIN</h1> <br><br><br>
				<div style="color:red; margin-top: -60px;font-size: 18px; margin-bottom: 30px;"><?php if(isset($_POST['loginbtn'])){if($companytotal == 0){echo "Invailed Login. If you don't have account then <a href='twobutton.php'>Register</a>. OR Not Confirmed Just Inform as at our mail id bineeshalakkal22@gmail.com";}}?></div>
				<label for="fname">UserName :</label> <br>
				<input type="text" id="username" name="username" class="textbox" placeholder="Enter Your Email ID" required> <br> <br> <br>
				
				<label for="lname">Passowrd :</label> <br>
				<input type="password" id="pwd" name="password" class="textbox" placeholder="Enter Your Passowrd" required> <br> <br> <br>
				
				<input type="submit" id="submitbtn" name="loginbtn" value="LOGIN" class="btn">
				<div class="newuser">
					<h2>New User? <a href="twobutton.php">Create Account</a></h2>
				</div>
			</form>
		</div>
		
		<div class="footer">
			<p>A Project for <b>Tybsc</b>. All Rights Reserved <i class="fa fa-copyright" aria-hidden="true"></i> 2020. This Website Is Made By <a href="">Bineesh</a></p>
		</div>
	</body>
</html> 