<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
require_once(dirname(__FILE__, 3).'/hashtag/create/index.php');
require_once(dirname(__FILE__, 3).'/hashtag/delete/index.php');
$sql="SELECT content FROM post WHERE id='".$id."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  	while($row = $result->fetch_assoc()) {
    	$content = $row['content'];
  	}
	} else {
  		$content="error";
	}
$list = hashtag_find($content);
hashtag_delete($list,$id,$conn);
$sql="DELETE FROM post WHERE id='".$id."'";
if ($conn->query($sql) === TRUE) {
  			$code = '202';
		} else {
  			$code = '403';
		}
echo $code;
?>