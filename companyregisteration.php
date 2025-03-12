<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	$query = "select * from company";
	$data = mysqli_query($conn, $query);
	$result = mysqli_fetch_assoc($data);
	
	if(isset($_POST['registerbtn'])){
		
		$email_id = $_POST['email'];
		$password = $_POST['rpwd'];
		
		$addsn = "select * from company";
		$addsndb = mysqli_query($conn, $addsn);
		$addsntotal = mysqli_num_rows($addsndb);
		
		$convertsn = $addsntotal + 1;
		$sn = (string) $convertsn;
		
		$company_name = $_POST['cname'];
		$job_title = $_POST['jtitle'];
		$salary = $_POST['hsalary'];
		$qualification = $_POST['rqualification'];
		$requirements = $_POST['requirements'];
		$experience = $_POST['experience'];
		$job_timing = $_POST['jtiming'];
		$job_address = $_POST['jaddress'];
		$interview_timing = $_POST['itiming'];
		$interview_address = $_POST['iaddress'];
		$hr_name = $_POST['hrname'];
		$hr_number = $_POST['hrno'];
		
		$filename = $_FILES["photo"]["name"];
		$tempname = $_FILES["photo"]["tmp_name"];
		$ap = "uploadedimage/".$filename;
		move_uploaded_file($tempname, $ap);
		
		$checkperson = "select * from person where emailid='$email_id' && password='$password'";
		$checkpersondata = mysqli_query($conn, $checkperson);
		$checkpersontotal = mysqli_num_rows($checkpersondata);
		
		$checkcompany = "select * from company where emailid='$email_id' && password='$password' && hrnumber='$hr_number'";
		$checkcompanydata = mysqli_query($conn, $checkcompany);
		$checkcompanytotal = mysqli_num_rows($checkcompanydata);
		
		if($checkpersontotal == 0 && $checkcompanytotal == 0){
			$insertquery = "insert into company values('$sn','$company_name','$job_title','$salary','$qualification','$requirements','$experience','$job_timing','$job_address','$interview_timing','$interview_address','$hr_name','$hr_number','$email_id','$password','$ap','Not Confirmed')";
			$insertdata = mysqli_query($conn, $insertquery);
			if($insertdata){
				$_SESSION['companyid'] = $sn;
				header('location:aftercompanyregisteration.php');
			}
		}
	}
	
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
		<link rel="stylesheet" href="css/companyregisterationstyle.css">
		<link rel="stylesheet" href="css/rowcolstyle.css">
	</head>
	<body>
		<div class="header" id="navbar">
			<center><span style="color:#4FC3F7;font-size: 32px;font-weight: bold;;">Job</span><span style="color:#76FF03;font-size: 32px;font-weight: bold;">Search</span></center>
		</div>
		
		<div class="registerform">
			<center>
				<h1>Company Register</h1>
				<br>
				<form action="" method="post" enctype="Multipart/form-data">
					<div class="row">
						<div class="col">
							<label for="cname">Company Name :</label> <br><br>
							<input type="text" id="cname" name="cname" pattern="[A-Za-z]{3,}" title="Please Enter Only Alphabets" class="textbox" placeholder="Enter Your Company Name" required>
						</div>
						<div class="col">
							<label for="jtitle">Job Title :</label> <br><br>
							<input type="text" id="jtitle" name="jtitle" pattern="[A-Za-z]{3,}" title="Please Enter Only Alphabets" class="textbox" placeholder="Enter Your Job Title" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="hsalary">In Hand Salary :</label> <br><br>
							<input type="text" id="hsalary" name="hsalary" class="textbox" placeholder="Enter How Many Will You Give Payment" required>
						</div>
						<div class="col">
							<label for="rqualification">Required Qualification :</label> <br><br>
							<input type="text" id="rqualification" name="rqualification" class="textbox" placeholder="Enter How Much Qualification You Want" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="requirements">Requirements :</label> <br><br>
							<input type="text" id="requirements" name="requirements" class="textbox" placeholder="Enter Other Requirements" required>
						</div>
						<div class="col">
							<label for="experience">Experience :</label> <br><br>
							<input type="text" id="experience" name="experience" class="textbox" placeholder="Enter How Much Experience Person You Want" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="jtiming">Job Timing :</label> <br><br>
							<input type="text" id="jtiming" name="jtiming" class="textbox" placeholder="Enter The Timing Of Your Job" required>
						</div>
						<div class="col">
							<label for="jaddress">Job Address :</label> <br><br>
							<input type="text" id="jaddress" name="jaddress" class="textbox" placeholder="Enter The Address Of Your Job" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="itiming">Interview Timing :</label> <br><br>
							<input type="text" id="itiming" name="itiming" class="textbox" placeholder="Enter The Timing Of Interview" required>
						</div>
						<div class="col">
							<label for="iaddress">Interview Address :</label> <br><br>
							<input type="text" id="iaddress" name="iaddress" class="textbox" placeholder="Enter The Address Of Interview" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="hrname">HR Name :</label> <br><br>
							<input type="text" id="hrname" name="hrname" pattern="[A-Za-z]{3,}" title="Please Enter Only Alphabets" class="textbox" placeholder="Enter The Name OF HR" required>
						</div>
						<div class="col">
							<label for="hrno">HR Phone Number :</label> <br><br>
							<input type="tel" id="hrno" name="hrno" class="textbox" pattern="[0-9]{10}" title="Please Enter Only Number With Tenth Digits" placeholder="Enter The HR Phone Number With 10 Digit Number" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="email">Email Address :</label> <br><br>
							<input type="text" id="email" name="email" class="textbox" placeholder="Enter Your Email Address" required>
						</div>
						<div class="col">
							<label for="photo">Add Photo :</label> <br><br>
							<input type="File" name="photo" class="textboxp" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="pwd">Password :</label> <br><br>
							<input type="password" id="pwd" name="pwd" class="textbox" placeholder="Enter Your Password" required>
						</div>
						<div class="col">
							<label for="rpwd">Re-Type Password :</label> <br><br>
							<input type="password" id="rpwd" name="rpwd" class="textbox" onkeyup="checkPasswordMatch()" placeholder="Confirm Your Password" required>
							<div id="errorMessage" style="color:Red;font-size:13px;float:left;"></div>
						</div>
					</div>
					<center><input type="submit" id="registerbtn" name="registerbtn" value="Register" class="btn"></center>
				</form>
			</center>
		</div>
					
		<div class="footer">
			<p>A Project for <b>Tybsc</b>. All Rights Reserved <i class="fa fa-copyright" aria-hidden="true"></i> 2020. This Website Is Made By <a href="">Bineesh</a></p>
		</div>
		<script>
			function checkPasswordMatch() {
				var password = document.getElementById("pwd").value;
				var confirmPassword = document.getElementById("rpwd").value;

				if (password != confirmPassword) {
					document.getElementById("errorMessage").innerHTML = "Passwords do not match!";
				}
				else{
					document.getElementById("errorMessage").innerHTML = "";
				}
			}
		</script>
	</body>
</html> 