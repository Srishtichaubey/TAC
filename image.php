<html>
<head></head>
<body>
<form action="post" enctype="multipa rt/form-data">
<input type="file" name="image">
<br>
<input type="submit" name="submit" value="submit">
</form>
<?php
if(isset($_POST['submit'])){
if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
echo "failed";
}
else{
$name=addlashes($_FILES['image']['name']);
$image=base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
saveimage($name,$image);
}
}

function saveimage($name,$image)
{
$con=mysqli_connect("localhost","root","","testimage");
$sql="insert into testimage(name,image) values('$name',$image)";
$query=mysqli_query($con,$sql);
if($query)
{
	echo "success";
}
else{
	echo "not uploaded";     
}
}
?>
</body>
</html>