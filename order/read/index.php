<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
function orders_readbyownerlist($ac_id,$conn){
	$sql="SELECT orders.id,orders.stat,orders.ac_id,post.photos,orders.ts FROM orders JOIN post ON orders.post_id = post.id WHERE post.ac_id = '".$ac_id."' ORDER BY orders.ts DESC";
	$result = $conn->query($sql);
	$list = (array)null;
	$i=0;
	if ($result->num_rows > 0) {
  // output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i] = array('id'=>(string)$row['id'],'status'=>(string)$row['stat'],'ac_id'=>(string)$row['ac_id'],'photos'=>(string)$row['photos'],'ts'=>(string)$row['ts']);
		$i++;
  	}
	} else {
  		$list[0]=array('hashtag'=>'error');
		}
	return $list;
}
function orders_readbyuserlist($ac_id,$conn){
	$sql="SELECT orders.id,orders.price,post.photos,orders.ts FROM orders JOIN post ON orders.post_id = post.id WHERE orders.ac_id='".$ac_id."' ORDER BY orders.ts DESC";
	$result = $conn->query($sql);
	$list = (array)null;
	$i=0;
	if ($result->num_rows > 0) {
  // output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i] = array('id'=>(string)$row['id'],'price'=>(string)$row['price'],'photos'=>(string)$row['photos'],'ts'=>(string)$row['ts']);
		$i++;
  	}
	} else {
  		$list[0]=array('hashtag'=>'error');
		}
	return $list;
}
function orders_read($id,$conn){
	$sql = "SELECT orders.stat,orders.price,orders.ac_id,orders.address,orders.ts,post.photos FROM orders JOIN post ON orders.post_id = post.id WHERE orders.id='".$id."'";
	$result = $conn->query($sql);
	$i=0;
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
    	$list[$i] = array('status'=>(string)$row['stat'],'price'=>(string)$row['price'],'ac_id'=>(string)$row['ac_id'],'address'=>(string)$row['address'],'ts'=>(string)$row['ts'],'photos'=>(string)$row['photos']);
		$i++;
  	}
	} else {
  		$list[0]=array('hashtag'=>'error');
		}
	return $list;
}
?>