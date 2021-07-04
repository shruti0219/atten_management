<?php

session_start();
header('location:dashboard.php');
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'attendance_sys');

$tid = $_POST['tid'];
$sname = $_POST['sname'];
$code = $_POST['code'];
$sem = $_POST['sem'];
$year = $_POST['year'];
$branch = $_POST['branch'];
$rollstart = $_POST['rollstart'];
$rollend = $_POST['rollend'];
$scode = $branch."/".$code;
$sid = $scode."/".$tid;


$s = " select * from subject where sid = '$sid' "; //branch/code -- scode
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num == 1)
{
	echo "Class already exists";
}else
{
	$reg = " insert into subject(sid,tid,sname,scode,sem,year,branch)values('$sid' , '$tid', '$sname', '$scode' , '$sem' , '$year' , '$branch') ";
	mysqli_query($con,$reg);
	echo "Class Entered";
}

for ($rollstart; $rollstart <= $rollend; $rollstart++) {
	$uid = $sid."/".$year."/".$rollstart;
	$reg = " insert into student(uid,sid) values ('$uid' , '$sid') ";
	mysqli_query($con,$reg);
	$id = $branch."/".$year."/".$rollstart;
	$t = " select * from student_detail where id = '$id'";
	$given = mysqli_query($con, $t);
	$n = mysqli_num_rows($given);
	if($n == 1)
	{

	}else{
		$str = " insert into student_detail(id) values ('$id') ";
		mysqli_query($con,$str);
	}
}
echo "Students Entered";
?>