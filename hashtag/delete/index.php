<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
function hashtag_delete($list,$post_id,$conn){
	for($i=0;$i<sizeof($list);$i++){
		$sql = "DELETE FROM hashtag WHERE name='".$list[$i]."' AND post_id='".$post_id."'";
		if ($conn->query($sql) === TRUE) {
  			$code = '202';
		} else {
  			$code = '403';
			break;
		}
	}
	return $code;
}
?>