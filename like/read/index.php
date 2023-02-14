<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
function like_getnumbers($post_id, $type, $conn){
	$sql = "SELECT COUNT(ac_id) AS number FROM likes WHERE post_id = '".$post_id."' AND type = '".$type."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$total = $row['number'];
		}
	}
	else{
		$total = "error";
	}
	return $total;
}
function like_getlist($post_id, $type, $conn){
	$sql = "SELECT likes.ac_id, account.username, account.name, account.photo FROM likes JOIN account ON likes.ac_id = account.id WHERE likes.post_id = '".$post_id."' AND type = '".$type."'";
	$result = $conn->query($sql);
	$list = (array)null;
	$i=0;
	if ($result->num_rows > 0) {
  // output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i] = array('ac_id'=>(string)$row['ac_id'], 'username'=>(string)$row['username'], 'name'=>(string)$row['name'], 'photo'=>(string)$row['photo']);
		$i++;
  	}
	} else {
  		$list[0]=array('ac_id'=>'error');
		}
	return $list;
}
?>