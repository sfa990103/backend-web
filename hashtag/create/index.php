<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
function hashtag_find($content){
	preg_match_all('/#(\w+)/', $content, $matches);
	foreach ($matches[1] as $match) {
		$keywords[] = $match;
	}
	return (array) $keywords;
}
function hashtag_create($content, $post_id,$conn){
	$hash = hashtag_find($content);
	for($i=0;$i<sizeof($hash);$i++){
		$sql = "INSERT INTO hashtag (name, post_id)
		VALUE ('".$hash[$i]."','".$post_id."')";
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