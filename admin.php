<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	
	$adminuser = $_SESSION['aun'];
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Admin Page
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
				<a href="logout.php" class="active">LOG OUT</a>
			</div>
		</div>
		<div class="content">
			<div class="homedesign">
				<div class="row">
					<?php
						if($adminuser){
							$adminquery = "select * from company where permission='Not Confirmed'";
							$adminuserdata = mysqli_query($conn, $adminquery);
							while($adminresult = mysqli_fetch_assoc($adminuserdata)){
								?>
								<div class="col">
									<div class="boxtitle">
										<form action="" method="post">
											<h2>Verfication ID : <?php echo "0".$adminresult['srno'];?></h2>
											<h2>Comapny Name : <?php echo $adminresult['cname'];?></h2>
											<h2>Comapny Email id : <?php echo $adminresult['emailid'];?></h2>
											<input type="hidden" value="<?php echo $adminresult['emailid'];?>" name="cemailid">
											<input type="submit" value="View More" name="companydetailsfv" class="btn">
											<?php
												if(isset($_POST['companydetailsfv'])){
													$companyemail = $_POST['cemailid'];
													$_SESSION['companyemailid'] = $companyemail;
													header('location: companyverfication.php');
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