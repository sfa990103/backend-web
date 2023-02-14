<?php
require_once(dirname(__FILE__, 2).'/create/index.php');
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
function hashtag_compare($old,$new){
	$list = (array)null;
	$x=0;
	for($i=0;$i<sizeof($new);$i++){
		$flag = 0;
		for($j=0;$j<sizeof($old);$j++){
			if($new[$i]==$old[$j]){
				$flag = 1;
			}
		}
		if($flag!=1){
			$list[$x] = (string)$new[$i];
			$x++;
		}
	}
	return $list;
}
function hashtag_update($content,$new,$post_id,$conn){
	$content_list = hashtag_find($content);
	$new_list = hashtag_find($content);
	$list = hashtag_compare($content_list,$new_list);
	$code = "400";
	for($i=0;$i<sizeof($list);$i++){
		$sql="INSERT INTO hashtag (name, post_id)
		VALUE ('".$list[$i]."','".$post_id."')";
		if ($conn->query($sql) === TRUE) {
  			$code="200";
		} else {
  			$code="400";
			break;
		}
	}
	return $code;
}
?>