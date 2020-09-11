<?php
$servername= "localhost";
$username= "root";
$password ="";
$dbname= "mini";
//Create Connection
$conn = mysqli_connect($servername, $username, $password);
$conn_db= mysqli_select_db($conn,$dbname);
//check connection
if(!$conn) 
{
	die ("Connection failed: " . mysqli_connect_error);
}
	?>