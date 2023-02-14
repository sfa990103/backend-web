<?php
require_once(dirname(__FILE__, 2).'/config/dbconnect.php');
require_once(dirname(__FILE__, 2).'/post/read/index.php');
$ac_id=$_POST['ac_id'];
$sql = "SELECT post.id FROM post JOIN follow ON post.ac_id = follow.ac_id WHERE follow.follower_id='".$ac_id."' ORDER BY post.ts DESC";
$list = (array)null;
$i=0;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
  		// output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i]=$row['id'];
		$i++;
  	}
	} else {
  		$list[$i]='error';
	}
$post_list = (array)null;
for($i=0;$i<sizeof($list);$i++){
	$post_list[$i]=post_read($list[$i],$conn);
}
echo json_encode($post_list);
?>