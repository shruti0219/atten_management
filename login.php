<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login & Registration</title>
	<link rel="stylesheet"  href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	</head>

<body style="background: cadetblue;">


	<div class="container">

		<div class="login-box">
			<a href = "getresult.php"> Get Student Attendance </a>
			<br>
			<br>
			<div class = "row">
				<div class="col-md-6 login-left" style="background: ghostwhite;">
					<h2>Teacher Login </h2>
					<form action="validation.php" method="post">
						<div class="form-group">
							<label>Email-ID</label>
							<input type="email" name="email" class="form-control" placeholder="abc@gmail.com" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<br>
						<button type="submit" style="margin-left: 140px;" class="btn btn-primary">Login</button>
					</form>
				</div>

				<div class="col-md-6 login-right">
					<h2>Teacher's Registration</h2>
					<form action="registration.php" method="post">
						<div class="form-group">
							<label>Email-ID</label>
							<input type="email" name="email" class="form-control" placeholder="abc@gmail.com" required>
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control"  required>
						</div>
						<div class="form-group">
							<label>Phone Number</label>
							<input type="text" name="phone" class="form-control"  required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<br>
						<button type="submit" class="btn btn-primary" style="margin-left: 130px;" onclick="alert('Registered Sucessfully !')">Register</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</body>
</html>
		<?php
include('footer.php');
?>