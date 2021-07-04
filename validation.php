<?php

session_start();
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'attendance_sys');

$email = $_POST['email'];
$password = $_POST['password'];

$s = " select * from teacher where email = '$email' && password ='$password' ";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1)
{
	$_SESSION['email'] = $email;
	header('location:dashboard.php');
}else
{
	header('location:login.php');
}


?>