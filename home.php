<?php
session_start();
if(!isset($_SESSION['email'])){
	header('location:login.php');
}
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'attendance_sys');
$email =  $_SESSION['email'];
$sql = "select * from teacher where email = '$email' ";
$result = mysqli_query($con, $sql);
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>Home</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<?php
				if(mysqli_num_rows($result) == 1)
				{
					while($row = mysqli_fetch_array($result))
					{
						?>
						<a class="navbar-brand">Hi, <?php echo $row['name']; ?></a>
					</div>
					<?php
					$x = $row['tid'];
				}
			}
			?>
			<ul class="nav navbar-nav">
				<li ><a href="dashboard.php">Dashboard</a></li>
				<li><a href="statistics.php">Statistics</a></li>
				<li><a href="edit_profile.php">Edit Profile</a></li>
				<li class="active" style="margin-left: 980px;"><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</nav>
</body>
</html>
