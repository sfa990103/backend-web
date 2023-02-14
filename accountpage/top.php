<?php
require_once(dirname(__FILE__, 2).'/config/dbconnect.php');
require_once(dirname(__FILE__, 2).'/account/read/index.php');
require_once(dirname(__FILE__, 2).'/follow/read/index.php');
$id = $_POST['ac_id'];
$list = (array)null;
$list['username']=ac_getacusername($conn,$id);
$list['photo']=ac_getacphoto($conn,$id);
$list['name']=ac_getacname($conn,$id);
$list['profile']=ac_getacprofile($conn,$id);
$list['location']=ac_getaclocation($conn,$id);
$list['followers']=follow_followers($id,$conn);
$list['following']=follow_following($id,$conn);
if(is_null($list['photo'])){
	$list['photo'] = "X";
}
if(is_null($list['name'])){
	$list['name'] = "X";
}
if(is_null($list['profile'])){
	$list['profile'] = "X";
}
if(is_null($list['location'])){
	$list['location'] = "X";
}
if(is_null($list['followers'])){
	$list['followers'] = "X";
}
if(is_null($list['following'])){
	$list['following'] = "X";
}
echo json_encode($list);
?>