<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
function orders_create($post_id,$price,$ac_id,$address,$conn){
	$sql="INSERT INTO orders (post_id,stat,price,ac_id,address)
	VALUE ('".$post_id."','awaiting','".$price."','".$ac_id."','".$address."')";
	if ($conn->query($sql) === TRUE) {
  	$code = '200';
	} else {	
  	$code = '400';
	}
	return $code;
}
?>