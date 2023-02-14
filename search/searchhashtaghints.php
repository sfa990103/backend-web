<?php
require_once(dirname(__FILE__, 2).'/config/dbconnect.php');
$name = $_POST['name'];
$sql = "SELECT name FROM hashtag WHERE name LIKE '%".$name."%'";
$result = $conn->query($sql);
	$i=0;
	$list = (array)null;
	if ($result->num_rows > 0) {
  		// output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i]['name']=$row['name'];
		$i++;
  	}
	} else {
  		$list[0]['name']='No Result';
	}
echo json_encode($list);
?>
