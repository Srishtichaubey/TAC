<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    /*$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }*/
    $mysqli = new mysqli("localhost","root","","mini");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    $area = $_POST["area"];
    $rooms = $_POST["rooms"];
    $rent = $_POST["rent"];
    $contact = $_POST["contact"];
    $image = $_POST["image"];
    $imagepath="C:\\\\xampp\\\\htdocs\\\\S\\\\Sr\\\\".$_FILES["fileToUpload"]["name"];
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imagepath);
    echo "$imagepath";
    $sql = "INSERT INTO acco (area, rooms, rent, contact, image) VALUES ('$area', '$rooms', '$rent', '$contact', '$imagepath')";
    if($mysqli->query($sql) === true){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
    $mysqli->close();
}
?>
<div><a href="/search.php">Go to search page</a></div>
<div><a href="/addEntry.php">Go to add page</a></div>

