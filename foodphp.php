
<?php
if(isset($_POST['submitted'])) {
	//connecting to database
	include('connect2.php');

	$category = $_POST['category'];
	$critaria = $_POST['critaria'];

	$query = "SELECT * FROM flight WHERE $category LIKE '%" .$critaria."%'";
	$result = mysqli_query($conn, $query) or die('error fetching data');
	$num_rows = mysqli_num_rows($result);

	echo "<table border='2' style='width:80%;height:80px;text-align:center;'>";
	echo "<tr> 
	<th style='border:1px solid black;background:#8b9eb6;font-color:red;cellspacing:2px;cellspadding:2px;'>flightid</th>
	<th style='border:1px solid black;background:#8b9eb6;font-color:red;'>
	source</th>
	<th style='border:1px solid black;background:#8b9eb6;font-color:red;'>via</th>
	<th style='border:1px solid black;background:#8b9eb6;font-color:red;'>destination</th>
	<th style='border:1px solid black;background:#8b9eb6;font-color:red;'>date</th>
	<th style='border:1px solid black;background:#8b9eb6;font-color:red;'>time_of_arrival</th>
	<th style='border:1px solid black;background:#8b9eb6;font-color:red;'>time_of_arrival</th>";
	while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

		echo"<tr><td>";
		echo $row['flightid'];
		echo"</td><td>";
		echo $row['source'];
		echo"</td><td>";
		echo $row['via'];
		echo"</td><td>";
		echo $row['destination'];
		echo "</td><td>";
		echo $row['date'];
		echo"</td><td>";
		echo $row['time_of_departure'];
		echo"</td><td>";
		echo $row['time_of_arrival'];
		echo"</td></tr>";
		}
		echo "</table>";
header("refresh:8;url=status.php");
}
?>
</body>
</html>