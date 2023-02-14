<?php
require_once(dirname(__FILE__, 2).'/config/dbconnect.php');
require_once(dirname(__FILE__, 2).'/account/read/index.php');
require_once(dirname(__FILE__, 2).'/hashtag/read/index.php');
$username = "e_shop";
$password = "sfa990103";
$location = ac_getlocation($conn, $username, $password);
$sort = "lowestprice";
$hashtag = "nice";
$list = (array)null;
if($sort=="lowestprice"){
	$list = hashtag_lowestprice($hashtag,$conn);
}
else if($sort=="highestprice"){
	$list = hashtag_highestprice($hashtag,$conn);
}
else if($sort=="top"){
	$list = hashtag_toplist($hashtag,$conn);
}
else if($sort=="recent"){
	$list = hashtag_recentlist($hashtag,$conn);
}
foreach($list as $key=>$value){
	if(is_null($list[$key]))
	$list[$key]="X";
}
echo json_encode($list);
?>
