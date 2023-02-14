<?php
require_once(dirname(__FILE__, 2).'/config/dbconnect.php');
require_once(dirname(__FILE__, 2).'/account/read/index.php');
require_once(dirname(__FILE__, 2).'/viewhistory/read/index.php');
require_once(dirname(__FILE__, 2).'/post/read/index.php');
$username='e_shop';
$password='sfa990103';
$location = ac_getlocation($conn,$username,$password);
$list = viewhistory_toppost($location,$conn);
$post_list = (array)null;
for($i=0;$i<sizeof($list);$i++){
	$post_list[$i] = post_readphotoonly($list[$i],$conn);
}
echo json_encode($post_list);
?>