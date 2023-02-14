<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
function hashtag_recentlist($name,$conn){
	$sql="SELECT hashtag.post_id, post.photos, post.title, post.price FROM hashtag JOIN post ON hashtag.post_id = post.id WHERE hashtag.name = '".$name."' ORDER BY post.ts DESC LIMIT 50";
	$result = $conn->query($sql);
	$i=0;
	$list = (array)null;
	if ($result->num_rows > 0) {
  		// output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i]=array('id'=>(string)$row['post_id'], 'photo'=>(string)$row['photos'], 'title'=>(string)$row['title'], 'price'=>(string)$row['price']);
		$i++;
  	}
	} else {
  		$list[0]=array('id'=>'error');
	}
	return $list;
}
function hashtag_toplist($name,$conn){
	$sql="SELECT hashtag.post_id, post.photos, post.title, post.price, COUNT(viewhistory.id) AS viewtimes FROM ((hashtag JOIN post ON hashtag.post_id = post.id) JOIN viewhistory ON hashtag.post_id = viewhistory.post_id) WHERE hashtag.name = '".$name."' ORDER BY viewtimes DESC LIMIT 50";
	$result = $conn->query($sql);
	$i=0;
	$list = (array)null;
	if ($result->num_rows > 0) {
  		// output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i]=array('id'=>(string)$row['post_id'], 'photo'=>(string)$row['photos'], 'title'=>(string)$row['title'], 'price'=>(string)$row['price']);
		$i++;
  	}
	} else {
  		$list[0]=array('id'=>'error');
	}
	return $list;
}
function hashtag_lowestprice($name,$conn){
	$sql="SELECT hashtag.post_id, post.photos, post.title, post.price FROM hashtag JOIN post ON hashtag.post_id = post.id WHERE hashtag.name = '".$name."' ORDER BY post.price ASC LIMIT 50";
	$result = $conn->query($sql);
	$i=0;
	$list = (array)null;
	if ($result->num_rows > 0) {
  		// output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i]=array('id'=>(string)$row['post_id'], 'photo'=>(string)$row['photos'], 'title'=>(string)$row['title'], 'price'=>(string)$row['price']);
		$i++;
  	}
	} else {
  		$list[0]=array('id'=>'error');
	}
	return $list;
}
function hashtag_highestprice($name,$conn){
	$sql="SELECT hashtag.post_id, post.photos, post.title, post.price FROM hashtag JOIN post ON hashtag.post_id = post.id WHERE hashtag.name = '".$name."' ORDER BY post.price DESC LIMIT 50";
	$result = $conn->query($sql);
	$i=0;
	$list = (array)null;
	if ($result->num_rows > 0) {
  		// output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i]=array('id'=>(string)$row['post_id'], 'photo'=>(string)$row['photos'], 'title'=>(string)$row['title'], 'price'=>(string)$row['price']);
		$i++;
  	}
	} else {
  		$list[0]=array('id'=>'error');
	}
	return $list;
}
?>