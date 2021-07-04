<?php

session_start();
header('location:login.php');
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'attendance_sys');

$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$s = " select * from teacher where email = '$email' ";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1)
{
	echo "Email-ID already exists";
}else
{
	$reg = " insert into teacher(email,name,phone,password) values ('$email' , '$name', '$phone', '$password') ";
	mysqli_query($con,$reg);
	echo "Registration Successful";
}


?>