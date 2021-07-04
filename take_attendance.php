<?php
session_start();
header('location:dashboard.php');
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'attendance_sys');

$subject_id =  $_SESSION['subject_id'];
$q = "select * from student where sid = '$subject_id' ";
$resq = mysqli_query($con, $q);
if(mysqli_num_rows($resq) > 0)
{
	while($r = mysqli_fetch_array($resq))
	{
		$x = $r['uid'];
		$value = $_POST[strval($x)] ;
		echo $value;
		$reg = " update student set total = total + 1 where uid = '$x' ";
		mysqli_query($con,$reg);
		$str = "update student set present = present + $value where uid = '$x' ";
		mysqli_query($con,$str);
	}

}
?>