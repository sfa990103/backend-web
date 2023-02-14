<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
function rating_getrate($post_id,$conn){
	$sql="SELECT AVG(rate) AS average FROM rating WHERE post_id='".$post_id."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$average = $row['average'];
		}
	}
	else{
		$average = "error";
	}
	return (string)round($average,1);
}
?>