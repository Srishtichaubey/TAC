<?php
	session_start();
	$sname=$_POST["name"];
	$spassword=$_POST["password"];
        $con=mysqli_connect("localhost","root","","mini");
	if(!$con)
	{
		die("server could not found");
	}
	mysqli_select_db($con,'mini');
$q="select* from signup where name='$sname' && password='$spassword'";
$result= mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1)
{
	echo "Welcome"; 
	header('location:landing.html');
}
else
{
	echo "Unauthorised user. Please log in first";
}
?>

