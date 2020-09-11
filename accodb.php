<!--?php


        /*
         * Insert image data into database
         */
        
        //DB details
        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'mini';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        $location=$_POST["location"];
        $room=$_POST["room"]; 
        $rent=$_POST["rent"]; 
        $contact=$_POST["contact"];        

        if(isset($_POST["submit"])){
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        //Insert image content into database
        $insert = $db->query("INSERT into acco(location, room, rent, contact, image) VALUES($location','$room','$rent','$contact','$imgContent')");
        if($insert){
            echo "File uploaded successfully."; 
           
        }else{
            echo "File upload failed, please try again.";
        }
    }else{
        echo "Please select an image file to upload.";
    }
}
?-->


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
//image insertion code 
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["images"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



$location=$_POST["location"];   
$rooms=$_POST["rooms"];
$rent=$_POST["rent"];
$contact=$_POST["contact"];
$image=$_POST["image"];
//size check
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

$r="insert into acco(location, rooms, rent, contact, image) values('$location','$rooms','$rent','$contact','$image')";
mysqli_query($conn,$r);
echo "New record created successfully";
header('location:accomodation.php');
?>