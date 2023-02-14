<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
function follow_following($ac_id,$conn){
	$sql = "SELECT COUNT(id) AS number FROM follow WHERE follower_id='".$ac_id."'";
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
function follow_followers($ac_id,$conn){
	$sql = "SELECT COUNT(id) AS number FROM follow WHERE ac_id='".$ac_id."'";
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
function follow_followinglist($ac_id,$conn){
	$sql = "SELECT follow.id, account.username, account.name, account.photo FROM follow INNER JOIN account ON follow.follower_id = account.id WHERE follow.follower_id = '".$ac_id."'";
	$result = $conn->query($sql);
	$i=0;
	$list = (array)null;
	if ($result->num_rows > 0) {
  		// output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i]=array('id'=>(string)$row['id'], 'username'=>(string)$row['username'], 'name'=>(string)$row['name'], 'photo'=>(string)$row['photo']);
		$i++;
  	}
	} else {
  		$list[0]=array('id'=>'error');
	}
	return $list;
}
function follow_followerslist($ac_id,$conn){
	$sql = "SELECT follow.id, account.username, account.name, account.photo FROM follow INNER JOIN account ON follow.ac_id = account.id WHERE follow.ac_id = '".$ac_id."'";
	$result = $conn->query($sql);
	$i=0;
	$list = (array)null;
	if ($result->num_rows > 0) {
  		// output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i]=array('id'=>(string)$row['id'], 'username'=>(string)$row['username'], 'name'=>(string)$row['name'], 'photo'=>(string)$row['photo']);
		$i++;
  	}
	} else {
  		$list[0]=array('id'=>'error');
	}
	return $list;
}
function follow_followed($follow_id,$ac_id,$conn){
	$sql = "SELECT EXISTS(SELECT id FROM follow WHERE ac_id='".$follow_id."' AND follower_id='".$ac_id."') AS exist";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
    	$flag=$row['exist'];
  	}
}
	return $flag;
}
?>