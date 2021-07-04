<?php
include('home.php');

$query1 = "select sid from subject where tid = '$x'";
$ret1 = mysqli_query($con, $query1);
if(mysqli_num_rows($ret1) > 0)
{
	// while($n = mysqli_fetch_array($ret1))
	// {
	// 	$sid = $n['sid'];
	// 	$query2 = "select * from student where sid = '$sid' ";
	// 	$ret2 = mysqli_query($con, $query2);
	// 	if(mysqli_num_rows($ret2) > 0)
	// 	{
	// 		$total = 0;
	// 		$present = 0;
	// 		while($n2 = mysqli_fetch_array($ret2))
	// 		{
	// 			$total = $total + $n2['total'];
	// 			$present = $present + $n2['present'];

	// 		}
	// 		echo "The average attendance in the class ".$sid." is ".$present/$total * 100;
	// 			echo nl2br("\n");
	// 	}
	// }
}

?>


<!DOCTYPE html>
<html lang="en-US">
<body>
	
		<?php
		while($n = mysqli_fetch_array($ret1))
		{
			$sid = $n['sid'];
			$query2 = "select * from student where sid = '$sid' ";
			$ret2 = mysqli_query($con, $query2);
			if(mysqli_num_rows($ret2) > 0)
			{
				$total = 0;
				$present = 0;
				while($n2 = mysqli_fetch_array($ret2))
				{
					$total = $total + $n2['total'];
					$present = $present + $n2['present'];

				}
				?>
				<div class="container">
				<h1 >Chart for Class <?php $y = explode("/",$sid); echo $y[0]."/".$y[1]; ?></h1>

				<div id="piechart"></div>

				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

				<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Present', <?php echo $present; ?>],
          ['Absent', <?php echo $total-$present; ?>]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      
</script>
</div>
<?php 
}
}?>

</body>
</html>