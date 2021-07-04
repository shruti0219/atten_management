<?php
include('home.php');
$subject_id =  $_POST['subject'];
$q = "select * from student where sid = '$subject_id' ";
$rest = mysqli_query($con, $q);
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
		<div class="container">
			<h3 style="padding-left: 400px;"><b>  Student Details  </b></h3><br><br>
		</div>
	<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Roll No.</th>
					<th scope="col">Name</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(mysqli_num_rows($rest) > 0)
				{
					while($row = mysqli_fetch_array($rest))
					{
						$y = explode("/", $row['uid']);
						$na = $y[0]."/".$y[3]."/".$y[4];
						?>
						<tr>
							<td scope="row"><?php echo $na; ?></td>
							<td>
								<?php  
								$a = "select * from student_detail where id = '$na' ";
								$re = mysqli_query($con, $a);
								if(mysqli_num_rows($re) == 1)
								{
									while($find = mysqli_fetch_array($re))
									{
										$x = $find['st_name'];
										if($x == 'Anonymous')
										{
											?>
											<form action="student_details.php" method="post">
												<div class="form-row">
													<div class="col">
														<input type="text" name="<?php echo $na ?>" class="form-control" placeholder="<?php echo $x; ?>">
													</div>
												</div>
												 <br>
												<button type="submit"  class="btn btn-success" onclick="alert('Data Saved !')">Save</button>
											</form>
											<?php

										}else{  ?>
											<h5> <?php echo $x; ?></h5>
											<?php
										}
									}
								}
								?>

							</td>
						</tr>
						<?php
					}
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>