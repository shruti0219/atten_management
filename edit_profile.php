<?php
include('home.php');
if(isset($_POST['email']))
{
	$name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $query1 = "update teacher set name = '$name' where tid = $x ";
  mysqli_query($con,$query1);
  $query2 = "update teacher set email = '$email' where tid = $x ";
  mysqli_query($con,$query2);
  $query3 = "update teacher set phone = '$phone' where tid = $x ";
  mysqli_query($con,$query3);
  $_SESSION['email'] = $email;
  header('location:dashboard.php');
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<div class="container">
  <h4 style="padding-left: 450px;"><b> Edit Your Profile :</b></h4>
  <br>
  <div class="container">
  <form action="edit_profile.php" method="post" class="form-example">

    <div class="form-group">
      <label >Enter your name: </label>
      <input type="text" class="form-control" name="name" required >
    </div>
    <div class="form-group">
      <label>Enter your email:</label>
      <input type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group">
      <label >Phone Number:</label>
      <input type="text" class="form-control" name="phone" required>
    </div>
    <button type="submit" class="btn btn-primary" onclick="alert('Data Saved !!')">Save</button>
  </form>
</div>
</div>
</body>
</html>