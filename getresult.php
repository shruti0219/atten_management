<?php
session_start();
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'attendance_sys');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background: cadetblue;">
	<div class="container" style="margin-top: 40px;">
		<h4 style="padding-left: 320px;"><b> Enter Details to get your Attendance :</b></h4>
  <br>
  <div class="container">
	<form action="getresult.php" method="post">
		<div class="form-group">
			<label>Roll Number</label>
			<input type="text" class="form-control" name="roll" class="form-control"  required>
		</div>
		<div class="form-group">
			<label>Year</label>
			<input type="text" name="year" class="form-control" class="form-control" placeholder="2020" required >
		</div>
		<div class="form-group">
			<label>Branch</label>
			<select class="form-control" name = "branch" required>
				<option value="CSE">Computer Science Engineering</option>
				<option value="MEE">Mechanical Engineering</option>
				<option value="CE">Chemical Engineering</option>
				<option value="IT">Information Technology</option>
				<option value="ME">Mining Engineering</option>
				<option value="EE">Electrical Engineering</option>
			</select>
		</div>
		<div class="form-group">
			<label>Subject Code</label>
			<input type="text" name="code" class="form-control" placeholder="CS201" required >
		</div>
		<button type="submit" class="btn btn-primary">Get result</button>
	</form>
</div>
<br>


	<?php

	if(isset($_POST['roll']))
	{
		$roll = $_POST['roll'];
	$year = $_POST['year'];
	$branch = $_POST['branch'];
	$code = $_POST['code'];
	$scode = $branch."/".$code;

	$sql = "select * from subject where scode = '$scode' ";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result) == 1)
	{
		while($row = mysqli_fetch_array($result))
		{
			$tid = $row['tid'];
		}
	}
	$id = $branch."/".$year."/".$roll;
	$query2 = "select * from student_detail where id = '$id'";
	$ret2 = mysqli_query($con, $query2);
	if(mysqli_num_rows($ret2) == 1)
	{
		while($n = mysqli_fetch_array($ret2))
		{
			$name = $n['st_name'];
			echo "Hello! ".$name;
		}
	}


	$uid = $scode."/".$tid."/".$year."/".$roll;
	$query = "select * from student where uid = '$uid'";
	$ret = mysqli_query($con, $query);
	if(mysqli_num_rows($ret) == 1)
	{
		while($n = mysqli_fetch_array($ret))
		{
			$present = $n['present'];
			$total = $n['total'];
			echo ", your attendance is : ".$present/$total*100 ."%";
		}
	}



}

	
	?>
</div>
		</body>
		</html>
				<?php
include('footer.php');
?>