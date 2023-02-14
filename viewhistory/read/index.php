<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
require_once(dirname(__FILE__, 3).'/account/read/index.php');
function viewhistory_top5ofuser($ac_id,$conn){
	$sql="SELECT hashtag.name, COUNT(hashtag.name) AS times FROM hashtag JOIN viewhistory ON hashtag.post_id = viewhistory.post_id WHERE viewhistory.ac_id='".$ac_id."' GROUP BY hashtag.name ORDER BY times DESC LIMIT 5";
	$result = $conn->query($sql);
	$list = (array)null;
	$i=0;
	if ($result->num_rows > 0) {
  // output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i] = array('hashtag'=>(string)$row['name']);
		$i++;
  	}
	} else {
  		$list[0]=array('hashtag'=>'error');
		}
	return $list;
}
function viewhistory_top10post($hashtag,$conn){
	$sql = "SELECT viewhistory.post_id, COUNT(viewhistory.post_id) AS times FROM viewhistory JOIN hashtag ON viewhistory.post_id = hashtag.post_id WHERE hashtag.name='".$hashtag[0]['hashtag']."'";
	for($i=1;$i<sizeof($hashtag);$i++){
		$sql.=" OR hashtag.name='".$hashtag[$i]['hashtag']."'";
	}	
	$sql.=" GROUP BY viewhistory.post_id ORDER BY times DESC LIMIT 10";
	$result = $conn->query($sql);
	$list = (array)null;
	$i=0;
	if ($result->num_rows > 0) {
  // output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i] = array('id'=>(string)$row['post_id']);
		$i++;
  	}
	} else {
  		$list[0]=array('id'=>'error');
		}
	return $list;
}
function viewhistory_toppost($location,$conn){
	$sql = "SELECT post_id, COUNT(post_id) AS times FROM viewhistory WHERE location='".$location."' ORDER BY times DESC";
	$result = $conn->query($sql);
	$list = (array)null;
	$i=0;
	if ($result->num_rows > 0) {
  // output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i] = (string)$row['post_id'];
		$i++;
  	}
	} else {
  		$list[0]="error";
		}
	return $list;
}
?>