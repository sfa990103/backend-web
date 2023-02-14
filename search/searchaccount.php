<?php
require_once(dirname(__FILE__, 2).'/config/dbconnect.php');
require_once(dirname(__FILE__, 2).'/account/read/index.php');
require_once(dirname(__FILE__, 2).'/follow/read/index.php');
$username = $_POST['username'];
$ac_id = $_POST['ac_id'];
$list = ac_search($conn,$username);
if($list!="none"){
for($i=0;$i<sizeof($list);$i++){
	$list[$i]['followed']=follow_followed($list[$i]['id'],$ac_id,$conn);
	foreach($list[$i] as $key=>$value){
		if(is_null($list[$i][$key]))
			$list[$i][$key] = "X";
	}
}
}

echo json_encode($list);
?>
