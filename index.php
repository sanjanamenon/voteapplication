<?php
session_start();
if(isset($_SESSION['adminlogin'])){
  header("location: basic.php");
}
if(isset($_SESSION['user_sess'])){
  header("location: main.php");
}
?>

<html>
	<head>
		<title>Login</title>
		<style type="text/css">
			h2 {
				text-align: center;
				color:white;
			}
			body {
				background-image:url("2.jpeg");
			}
			.form-container {
				padding: 45px;
				border: 1px solid #ccc;
				margin: auto;
				width:20%;
				height:50%;
				line-height:300%;
				background-color:black;				
				color:white;
				opacity:0.6;
				
			}
			.btn.btn-primary {
				background-color:#ccc;
				padding:3px 100px;
			}

		</style>
	</head>
	<body>
		<h2>Welcome User</h2>
		<hr>
		<div class="form-container">
			<form action="login.php" method="post">
				<h2> LOGIN </h2>
				<hr>
				ID Number:<br>
				<input type="text" name="username" minlength="10" maxlength="12" placeholder="Enter ID Number" required><br>
				Password:<br>
				<input type="password" name="password" minlength="10" maxlength="10" placeholder="Enter Password" required><br><br>

				<button type="Submit" class="btn btn-primary">Login</button>
			</form>
		</div>
	</body>
</html>
