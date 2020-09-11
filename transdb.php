<?php
$servername= "localhost";
$username= "root";
$password ="";
$dbname= "mini";
//Create Connection
$conn = mysqli_connect($servername, $username, $password);
$conn_db= mysqli_select_db($conn,$dbname);
//check connection
if(!$conn) {
	die ("Connection failed: " . mysqli_connect_error);
	}
$name=$_POST["name"];	
$loc=$_POST["loc"];
$des=$_POST["des"];
$contact=$_POST["contact"];
$type=$_POST["type"];

$r="insert into transport(name,loc,des,contact,type)values('$name','$loc','$des','$contact','$type')";
mysqli_query($conn,$r);
echo "New record created successfully";
header('location:transportation.php');
?>	