<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
function comment_list($post_id,$conn){
	$sql = "SELECT comment.id, comment.content, comment.ts, comment.ac_id, account.username, account.photo FROM comment INNER JOIN account ON comment.ac_id = account.id WHERE comment.post_id = '".$post_id."'";
	$result = $conn->query($sql);
	$list = (array)null;
	if ($result->num_rows > 0) {
  		// output data of each row
		$i=0;
  	while($row = $result->fetch_assoc()) {
    	$list[$i] = array("id" => (string)$row['id'], "content" => (string)$row['content'], "ts" => (string)$row['ts'], "ac_id"=>(string)$row['ac_id'], "username"=>(string)$row['username'], "photo"=>(string)$row['photo']);
		$i++;
  	}
	} else {
  		 $list[0] = array("id" => "404");
	}
	return $list;
}
function comment_number($post_id,$conn){
	$sql = "SELECT COUNT(id) AS number FROM comment WHERE post_id='".$post_id."'";
	$result = $conn->query($sql);
	$number = 0;
	if ($result->num_rows > 0) {
  		// output data of each row
  	while($row = $result->fetch_assoc()) {
    	$number = (string)$row['number'];
  	}
	} else {
  		$number = 'error';
	}
	return $number;
}
?>