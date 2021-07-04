<?php
include('home.php');
$s = "select * from subject where tid = $x";
$res = mysqli_query($con, $s);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style >
		.custom {
    width: 140px !important;
}
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<br>
		<br>
	<?php 
	if(mysqli_num_rows($res) > 0)
	{
		while($row = mysqli_fetch_array($res))
		{
			$l = $row['sid'];
			?>
			<div class="btn-group" role="group" aria-label="Basic example">
			<form action="attendance_entry.php" method="post">
				<input type="hidden" name="subject" value="<?php echo $l; ?>">
				<button type="submit" class="btn btn-secondary custom"><?php echo $row['scode']; ?></button> </form>
				<form action="studentname_entry.php" method="post">
					<input type="hidden" name="subject" value="<?php echo $l; ?>">
					<button type="submit" class="btn btn-secondary custom"><?php echo "Student Details"; ?></button> </form></div>
					<d style="padding-left:1em;" ></d>
					<?php 

				}
			}
			?>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
				Add Class ++
			</button>

			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Enter Class Details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="subject_entry.php" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label>Teacher ID</label>
									<input value="<?php echo $x ?>" name="tid" class="form-control" readonly required>
								</div>
								<div class="form-group">
									<label>Subject Name</label>
									<input type="text" name="sname" class="form-control"  required>
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
									<input type="text" name="code" class="form-control" placeholder="CS201"  required>
								</div>
								<div class="form-group">
									<label>Semester</label>
									<select class="form-control" name = "sem" required>
										<option>I</option>
										<option>II</option>
										<option>III</option>
										<option>IV</option>
										<option>V</option>
									</select>
								</div>
								<div class="form-group">
									<label>Year</label>
									<input type="text" name="year" class="form-control" placeholder="2020" required>
								</div>

								<div class="form-group">
									<label>Starting Roll No</label>
									<input type="text" name="rollstart" class="form-control" placeholder="1"  required>
								</div>
								<div class="form-group">
									<label>Ending Roll No</label>
									<input type="text" name="rollend" class="form-control" placeholder="50" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		</body>
		</html>

