<?php
require_once(dirname(__FILE__, 2).'/config/dbconnect.php');
require_once(dirname(__FILE__, 2).'/post/read/index.php');
$id=$_POST['id'];
$list = post_read($id,$conn);
echo json_encode($list);
?>