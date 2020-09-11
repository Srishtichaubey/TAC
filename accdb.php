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

$id=$_POST["id"];
$location=$_POST["location"];	
$room=$_POST["room"];
$rent=$_POST["rent"];
$contact=$_POST["contact"];
        if($insert){
$r="insert into acco(location,room,rent,contact)values('$location','$room','$rent','$contact')";
mysqli_query($conn,$r);
echo "New record created successfully";
header('location:transportation.php');
?>	