<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
require_once(dirname(__FILE__, 3).'/like/read/index.php');
require_once(dirname(__FILE__, 3).'/comment/read/index.php');
require_once(dirname(__FILE__, 3).'/rating/read/index.php');
function post_read($post_id,$conn){
	$sql = "SELECT * FROM post WHERE id='".$post_id."'";
	$list = (array)null;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
  		// output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list = array('id'=>(string)$row['id'],'ac_id'=>(string)$row['ac_id'],'title'=>(string)$row['title'],'content'=>(string)$row['content'],'price'=>(string)$row['price'],'ts'=>(string)$row['ts'],'photos'=>(string)$row['photos']);
  	}
	} else {
  		$list = array('id'=>'error');
	}
	$sql = "SELECT username,photo FROM account WHERE id='".$list['ac_id']."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
  		// output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list['username']=(string)$row['username'];
		$list['ac_photo']=(string)$row['photo'];
  	}
	} else {
  		$list = array('id'=>'error');
	}
	$list['like']=like_getnumbers($list['id'], 'post', $conn);
	$list['comment']=comment_number($list['id'],$conn);
	$list['rating']=rating_getrate($list['id'],$conn);
	return $list;
}
function post_readphotoonly($post_id,$conn){
	$sql="SELECT photos, title, price FROM post WHERE id='".$post_id."'";
	$list = (array)null;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
  		// output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list = array('id'=>$post_id,'photos'=>(string)$row['photos'],'title'=>(string)$row['title'],'price'=>(string)$row['price']);
  	}
	} else {
  		$list = array('id'=>'error');
	}
	return $list;
}
?>