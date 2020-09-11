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
$sgender=$_POST["gender"];
$scol_name=$_POST["col_name"];
$semail=$_POST["email"];
$smob_no=$_POST["mob_no"];
$spassword=$_POST["password"];
$scon_pass=$_POST["con_pass"];

if ($spassword==$scon_pass){
$r="insert into second (name,gender,col_name,email,mob_no,password,con_pass) values('$sname','$sgender','$scol_name',
'$semail','$smob_no','$spassword','$scon_pass')";
mysqli_query($conn,$r);
header('location:landing.html');
}
else
	{
	echo "Error: passwords don't match";	
	} 
?>	