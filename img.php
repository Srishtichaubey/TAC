<html>
<head>
</head>
<title>TAF</title>
<body>

	<form action="post" enctype="multipart/form-data">
<input type="file" name="image">
<br>
<input type="submit" name="submit" value="submit">
</form>
<?php
include('connect2.php');
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name=addslashes($_FILES['image']['name']);
$sql='INSERT INTO 'image'('id', 'image', 'image_name') VALUES('1','{$image}','{$image_name}')";
if(!mysql_query($sql))
{
      echo "Something went wrong! :(";
 }
?>

</body>     
</html>
