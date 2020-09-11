<?php
  $mysqli = (include 'db_conx.php');
  $pattern=$_GET["pattern"];
  $data = array();
  $sql="select * from acco where location like '%$pattern%'";
  $result = $mysqli->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	$dataitem = array();
	$dataitem['location'] = $row['location'];
	$dataitem['rooms'] = $row['rooms'];
	$dataitem['rent'] = $row['rent'];
	$dataitem['contact'] = $row['contact'];
  $dataitem['image'] = str_replace("C:\\xampp\\htdocs\\mini\\", "mini/", $row["image"]);
        array_push($data, $dataitem);
    }
  }
   else {
    echo "0 results";
  }
  $mysqli->close();
  http_response_code(200);
  echo json_encode($data);
?>