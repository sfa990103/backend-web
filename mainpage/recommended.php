<?php
require_once(dirname(__FILE__, 2).'/config/dbconnect.php');
require_once(dirname(__FILE__, 2).'/post/read/index.php');
require_once(dirname(__FILE__, 2).'/viewhistory/read/index.php');
$ac_id="1";
$list = (array)null;
$list = viewhistory_top5ofuser($ac_id,$conn);
$temp_list = (array)null;
$temp_list = viewhistory_top10post($list,$conn);
$post_list = (array)null;
for($i=0;$i<sizeof($temp_list);$i++){
	$post_list[$i]=post_readphotoonly($temp_list[$i]['id'],$conn);
}
echo json_encode($post_list);
?>