<?php
require_once(dirname(__FILE__, 2).'/config/dbconnect.php');
require_once(dirname(__FILE__, 2).'/post/read/index.php');
$id=$_POST['ac_id'];
$sql = "SELECT id, title, photos, price FROM post WHERE ac_id='".$id."' ORDER BY ts DESC";
$result = $conn->query($sql);
	$list = (array)null;
	$i=0;
	if ($result->num_rows > 0) {
  // output data of each row
  	while($row = $result->fetch_assoc()) {
    	$list[$i] = array('id'=>(string)$row['id'],'title'=>(string)$row['title'],'photos'=>(string)$row['photos'],'price'=>(string)$row['price']);
		$i++;
  	}
	} else {
  		$list[0]=array('id'=>'error');
		}
echo json_encode($list);
?>