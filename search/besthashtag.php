<?php
require_once(dirname(__FILE__, 2).'/config/dbconnect.php');
require_once(dirname(__FILE__, 2).'/account/read/index.php');
$username = "e_shop";
$password = "sfa990103";
$location = ac_getlocation($conn, $username, $password);
$sql = "SELECT hashtag.name, COUNT(hashtag.name) AS times FROM hashtag JOIN viewhistory ON hashtag.post_id = viewhistory.post_id WHERE viewhistory.location='".$location."' GROUP BY hashtag.name ORDER BY times DESC";
$result = $conn->query($sql);
	$list = (array)null;
	$i=0;
	if ($result->num_rows > 0) {
  // output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i] = (string)$row['name'];
		$i++;
  	}
	} else {
  		$list[0]='error';
		}
echo json_encode($list);
?>