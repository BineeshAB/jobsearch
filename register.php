<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	$query = "select * from person";
	$data = mysqli_query($conn, $query);
	$result = mysqli_fetch_assoc($data);
	
	if(isset($_POST['registerbtn'])){
		
		$phone_no = $_POST['phone'];
		$email_id = $_POST['email'];
		$password = $_POST['rpwd'];
		
		$addsn = "select * from person";
		$addsndb = mysqli_query($conn, $addsn);
		$addsntotal = mysqli_num_rows($addsndb);
		
		$convertsn = $addsntotal + 1;
		$sn = (string) $convertsn;
		
		$first_name = $_POST['fname'];
		$middle_name = $_POST['mname'];
		$last_name = $_POST['lname'];
		$gender = $_POST['gender'];
		$date = $_POST['date'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$martial_status = $_POST['status'];
		$nationality = $_POST['nationality'];
		$language_known = $_POST['language'];
		$address = $_POST['address'];
		$hobbies = $_POST['hobbies'];
		$experience = $_POST['experience'];
		
		$ssc_p_f = $_POST['scc'];
		$ssc_year = $_POST['sscyear'];
		$ssc_from = $_POST['sscbname'];
		$ssc_per = $_POST['pssc'];
		
		$hsc_p_f = $_POST['hsc'];
		$hsc_year = $_POST['hscyear'];
		$hsc_from = $_POST['hscbname'];
		$hsc_per = $_POST['phsc'];
		
		$skills = $_POST['skills'];
		
		$filename = $_FILES["photo"]["name"];
		$tempname = $_FILES["photo"]["tmp_name"];
		$ap = "uploadedimage/".$filename;
		move_uploaded_file($tempname, $ap);
		
		$checkperson = "select * from person where emailid='$email_id' && password='$password' && phoneno='$phone_no'";
		$checkpersondata = mysqli_query($conn, $checkperson);
		$checkpersontotal = mysqli_num_rows($checkpersondata);
		
		$checkcompany = "select * from company where emailid='$email_id' && password='$password'";
		$checkcompanydata = mysqli_query($conn, $checkcompany);
		$checkcompanytotal = mysqli_num_rows($checkcompanydata);
		
		if($checkpersontotal == 0 && $checkcompanytotal == 0){
			$insertquery = "insert into person values('$sn','$first_name','$middle_name','$last_name','$phone_no','$email_id','$gender','$password','$date','$month','$year','$martial_status','$nationality','$language_known','$address','$hobbies','$experience','$ssc_p_f','$ssc_year','$ssc_from','$ssc_per','$hsc_p_f','$hsc_year','$hsc_from','$hsc_per','$skills','$ap')";
			$insertdata = mysqli_query($conn, $insertquery);
			if($insertdata){
				header('location:index.php');
			}
		}
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Registeration Page
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/registerstyle.css">
		<link rel="stylesheet" href="css/rowcolstyle.css">
	</head>
	<body>
		<div class="header" id="navbar">
			<center><span style="color:#4FC3F7;font-size: 32px;font-weight: bold;;">Job</span><span style="color:#76FF03;font-size: 32px;font-weight: bold;">Search</span></center>
		</div>
		
		<div class="registerform">
			<center><h1>Job Register</h1></center><br>
				<form action="" method="post" enctype="Multipart/form-data">
					<div class="row">
						<div class="col">
							<label>First Name :</label> <br><br>
							<input type="text" id="fname" name="fname" class="textbox" placeholder="Enter Your First Name" required>
						</div>
						<div class="col">
							<label for="mname">Middle Name :</label> <br><br>
							<input type="text" id="mname" name="mname" class="textbox" placeholder="Enter Your Middle Name" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="lname">Last Name :</label> <br><br>
							<input type="text" id="lname" name="lname" class="textbox" placeholder="Enter Your last Name" required>
						</div>
						<div class="col">
							<label for="phone">Phone Number :</label> <br><br>
							<input type="tel" id="phone" name="phone" pattern="[0-9]{10}" title="Please Enter Only Number With Tenth Digits" class="textbox" placeholder="Enter Your Phone Number With Ten Digits" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="email">Email Address :</label> <br><br>
							<input type="text" id="email" name="email" class="textbox" placeholder="Enter Your Email Address" required>
						</div>
						<div class="col">
							<label for="gender">Gender :</label> <br><br>
							<select class="option" name="gender" required>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
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
					<div class="row">
						<div class="col">
							<label for="date">Birth Date :</label>
							<br><br>
							<select class="option" name="date" required>
								<option value="01">1</option>
								<option value="02">2</option>
								<option value="03">3</option>
								<option value="04">4</option>
								<option value="05">5</option>
								<option value="06">6</option>
								<option value="07">7</option>
								<option value="08">8</option>
								<option value="09">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="228">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>
						</div>
						<div class="col">
							<label for="month">Birth Month :</label> <br><br>
							<select class="option" name="month" required>
								<option value="Jan">Jan</option>
								<option value="Feb">Feb</option>
								<option value="Mar">Mar</option>
								<option value="Apr">Apr</option>
								<option value="May">May</option>
								<option value="Jun">Jun</option>
								<option value="Jul">Jul</option>
								<option value="Aug">Aug</option>
								<option value="Sep">Sep</option>
								<option value="Oct">Oct</option>
								<option value="Nov">Nov</option>
								<option value="Dec">Dec</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="year">Birth Year :</label> <br><br>
							<select class="option"  name="year" required>
								<option value="1999">1999</option>
								<option value="2000">2000</option>
								<option value="2001">2001</option>
								<option value="2002">2002</option>
								<option value="2003">2003</option>
								<option value="2004">2004</option>
								<option value="2005">2005</option>
								
							</select>
						</div>
						<div class="col">
							<label for="status">Martial Status :</label> <br><br>
							<select class="option" name="status" required>
								<option value="Married">Married</option>
								<option value="Unmarried">UnMarried</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="nationality">Nationality  :</label> <br><br>
							<input type="text" id="nationality" name="nationality" class="textbox" placeholder="Enter Your Nationality Ex. Indian" required>
						</div>
						<div class="col">
							<label for="language">Language Known:</label> <br><br>
							<input type="text" id="language" name="language" class="textbox" placeholder="Enter Your Languages You Know" required>
						</div>
					</div>
					<label for="address" style="margin-top: 13px;">Address:</label> <br><br>
					
					<input type="text" id="address" name="address" class="textboxa" placeholder="Enter Your address" required>
					
					<div class="row">
						<div class="col">
							<label for="hobbies">Hobbies :</label> <br><br>
							<input type="text" id="hobbies" name="hobbies" class="textbox" placeholder="Enter Your Hobbies" required>
						</div>
						<div class="col">
							<label for="photo">Add Photo :</label> <br><br>
							<input type="File" name="photo" class="textboxp" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="SSC">SSC Passed or Failed :</label> <br><br>
							<select class="option" name="scc" required>
								<option value="Passed">Passed</option>
								<option value="Failed">Failed</option>
							</select>
						</div>
						<div class="col">
							<label for="sscpassyear">SSC Passed Year :</label> <br>
							<select class="option" name="sscyear" >
								<option value="1991">1991</option>
								<option value="1992">1992</option>
								<option value="1993">1993</option>
								<option value="1994">1994</option>
								<option value="1995">1996</option>
								<option value="1996">1996</option>
								<option value="1997">1997</option>
								<option value="1998">1998</option>
								<option value="1999">1999</option>
								<option value="2000">2000</option>
								<option value="2001">2001</option>
								<option value="2002">2002</option>
								<option value="2003">2003</option>
								<option value="2004">2004</option>
								<option value="2005">2005</option>
								<option value="2006">2006</option>
								<option value="2007">2007</option>
								<option value="2008">2008</option>
								<option value="2009">2009</option>
								<option value="2010">2010</option>
								<option value="2011">2011</option>
								<option value="2012">2012</option>
								<option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="sscbname">Name of Board or University:</label> <br><br>
							<input type="text" id="sscbname" name="sscbname" class="textbox" placeholder="Enter Your Name Of the Board or University Of SSC" required>
						</div>
						<div class="col">
							<label for="pssc">Percentage Scored In SSC :</label> <br><br>
							<input type="text" id="pssc" name="pssc" class="textbox" placeholder="Enter Your Percentage Scored In SSC" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="HSC">HSC Passed or Failed :</label> <br><br>
							<select class="option" name="hsc" required>
								<option value="Passed">Passed</option>
								<option value="Failed">Failed</option>
							</select>
						</div>
						<div class="col">
							<label for="sscpassyear">HSC Passed Year :</label> <br><br>
							<select class="option" name="hscyear" >
								<option value="1991">1991</option>
								<option value="1992">1992</option>
								<option value="1993">1993</option>
								<option value="1994">1994</option>
								<option value="1995">1996</option>
								<option value="1996">1996</option>
								<option value="1997">1997</option>
								<option value="1998">1998</option>
								<option value="1999">1999</option>
								<option value="2000">2000</option>
								<option value="2001">2001</option>
								<option value="2002">2002</option>
								<option value="2003">2003</option>
								<option value="2004">2004</option>
								<option value="2005">2005</option>
								<option value="2006">2006</option>
								<option value="2007">2007</option>
								<option value="2008">2008</option>
								<option value="2009">2009</option>
								<option value="2010">2010</option>
								<option value="2011">2011</option>
								<option value="2012">2012</option>
								<option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
							</select>
						</div>
					</div>
					<div class="row">
						
						<div class="col">
							<label for="hscbname">Name of Board or University:</label> <br><br>
							<input type="text" id="hscbname" name="hscbname" class="textbox" placeholder="Enter Your Name Of the Board or University Of HSC" required>
						</div>
						<div class="col">
							<label for="phsc">Percentage Scored In HSC :</label> <br><br>
							<input type="text" id="phsc" name="phsc" class="textbox" placeholder="Enter Your Percentage Scored In HSC" required>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="skills">Skills :</label> <br><br>
							<input type="text" id="skills" name="skills" class="textbox" placeholder="Enter Your Special Skills" required>
						</div>
						<div class="col">
							<label for="experience">Experiences :</label> <br><br>
							<input type="text" id="experience" name="experience" class="textbox" placeholder="Enter Your Year Of Experience" required>
						</div>
					</div>
					<center><input type="submit" id="registerbtn" name="registerbtn" value="Register" class="btn"></center>
				</form>
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