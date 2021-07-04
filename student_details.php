<?php
session_start();
header('location:dashboard.php');
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'attendance_sys');
$subject_id =  $_SESSION['subject_id'];
$q = "select * from student where sid = '$subject_id' ";
$rest = mysqli_query($con, $q);
if(mysqli_num_rows($rest) > 0)
{
	while($row = mysqli_fetch_array($rest))
	{
		$y = explode("/", $row['uid']);
		$na = $y[0]."/".$y[3]."/".$y[4];
		if(isset($_POST[strval($na)]))
		{
			$name = $_POST[strval($na)];
			$query = " update student_detail set st_name = '$name' where id = '$na' ";
			$result = mysqli_query($con, $query);
			echo "done";
		}
	}
}
?>