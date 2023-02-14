<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
function orders_updatestatus($id,$status,$conn){
	$sql="UPDATE orders SET stat='".$status."' WHERE id='".$id."'";
	if ($conn->query($sql) === TRUE) {
  	$code = '201';
	} else {
  	$code = '402';
	}
	return $code;
}
?>