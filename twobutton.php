<!DOCTYPE html>
<html>
	<head>
		<title>
			Two Button Page
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/twobuttonstyle.css">
	</head>
	<body style="background-image: url('image/job.jpg'); background-repeat: no-repeat;background-size: cover;">
		<div class="header" id="navbar">
			<center><span style="color:#4FC3F7;font-size: 32px;font-weight: bold;">Job</span><span style="color:#76FF03;font-size: 32px;font-weight: bold;">Search</span></center>
			
		</div>
		
		<div style="margin-top:300px;">
			<center><button class="button" style="vertical-align:middle" onclick="jobSearch()"><span>Search Jobs </span></button></center>
			<br><br><br>
			<center><button class="button2" style="vertical-align:middle" onclick="jobUpload()"><span>Upload Jobs </span></button></center>
		</div>
		
		<div class="footer">
			<p>A Project for <b>Tybsc</b>. All Rights Reserved <i class="fa fa-copyright" aria-hidden="true"></i> 2020. This Website Is Made By <a href="">Bineesh</a></p>
		</div>
		<script>
			function jobSearch(){
				window.location.href = "register.php";
			}
			function jobUpload(){
				window.location.href = "companyregisteration.php";
			}
			
		</script>
	</body>
</html> 