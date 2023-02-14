<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
function viewhistory_createbypost($post_id,$ac_id,$location,$conn){
	$sql="INSERT INTO viewhistory (post_id,ac_id,location)
	VALUE ('".$post_id."','".$ac_id."','".$location."')";
	if ($conn->query($sql) === TRUE) {
  	$code = '200';
	} else {
  	$code = '400';
	}
	return array('code'=>$code);
}
print_r(viewhistory_createbypost("1","1","UK",$conn));
?>