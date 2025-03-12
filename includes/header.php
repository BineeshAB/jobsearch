<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			* {box-sizing: border-box;}

			body { 
				margin: 0;
				font-family: Arial, Helvetica, sans-serif;
			}

			.header {
				overflow: hidden;
				background-color: #f1f1f1;
				padding: 20px 10px;
			}

			.header a {
				float: left;
				color: black;
				text-align: center;
				padding: 12px;
				text-decoration: none;
				font-size: 22px; 
				line-height: 25px;
				border-radius: 4px;
			}

			.header a.logo {
				font-size: 32px;
				font-weight: bold;
			}

			.header a:hover {
				background-color: #ddd;
				color: black;
			}

			.header a.active {
				background-color: dodgerblue;
				color: white;
			}

			.header-right {
				float: right;
			}

			@media screen and (max-width: 500px) {
				.header a {
				float: none;
				display: block;
				text-align: left;
				}

				.header-right {
					float: none;
				}
			}
			.sticky {
				position: fixed;
				top: 0;
				width: 100%;
			}

			.sticky + .content {
				padding-top: 60px;
			}
		</style>
	</head>
	<body>

		<div class="header" id="navbar">
			<a href="#default" class="logo"><span style="color:#4FC3F7;">Job</span><span style="color:#76FF03;">Search</span></a>
			<div class="header-right">
				<a href="#home">Home</a>
				<a href="#contact">Contact</a>
				<a href="#about">About</a>
			</div>
		</div>

		<div style="padding-left:20px"  class="content">
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