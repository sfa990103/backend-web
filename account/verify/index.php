<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
function ac_verify($conn, $username, $password){
	$sql = "SELECT password FROM account WHERE username = '".$username."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
  // output data of each row
  	while($row = $result->fetch_assoc()) {
    	$pw = $row['password'];
  	}
	} else {
  		$flag = false;
		}
	if($pw == $password)
		$flag = true;
	else
		$flag = false;
	return $flag;
}
?>