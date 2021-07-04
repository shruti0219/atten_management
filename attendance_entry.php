<?php
include('home.php');
$subject_id =  $_POST['subject'];
$q = "select * from student where sid = '$subject_id' ";
$resq = mysqli_query($con, $q);
$_SESSION['subject_id'] = $subject_id;
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
<body>
	<div class="container">
		<div class="container">
			<h3 style="padding-left: 350px"><b>   Mark Attendance for <?php $y = explode("/",$subject_id); echo $y[0]."/".$y[1]; ?>  </b></h3>
			<h4 style="padding-left: 400px;"><b> Date : <?php echo date("l jS \of F Y ") . "<br>";?></b></h3>
			<br>
		</div>
	<form action="take_attendance.php" method="post">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Roll No.</th>
					<th scope="col">Attendance</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(mysqli_num_rows($resq) > 0)
				{
					while($row = mysqli_fetch_array($resq))
					{
						$x = $row['uid'];
						?>
						<tr>
							<td scope="row"><?php $y = explode("/",$x); echo $y[0]."/".$y[3]."/".$y[4]; ?></td>
							<td><label><input type="radio" value="1" name="<?php echo $x; ?>">Present</label>
								 <d style="padding-left:5em;" ></d>
								<label><input type="radio" value="0" name="<?php echo $x; ?>">Absent</label></td>
							</tr>
							<?php
						}
					}
					?>
				</tbody>
			</table>
			<button type="submit" style="margin-left: 500px;" class="btn btn-success" onclick="alert('Attendance done !')">Save</button>
		</form>
	</div>
		<br>
		<br>
		
	</body>
	</html>