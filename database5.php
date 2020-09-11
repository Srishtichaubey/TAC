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
$sname=$_POST["name"];	
$scontact=$_POST["contact"];
$semail=$_POST["email"];
$spassword=$_POST["password"];
$scon_pass=$_POST["con_pass"];

if ($spassword==$scon_pass){
$r="INSERT into signup (name, contact, email, password, con_pass) values('$sname','$scontact','$semail','$spassword','$scon_pass')";
mysqli_query($conn,$r);
header('location:landing.html');
}
else
	{
	echo "Error: passwords don't match";	
	} 
?>	



  