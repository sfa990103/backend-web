<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
require_once(dirname(__FILE__, 3).'/account/index.php');
$username = "e_shop";
$password = "sfa990103";
$ac_id = ac_getid($conn, $username, $password);
$post_id = "1";
$rate = "3.9";
$sql = "INSERT INTO rating (post_id, ac_id, rate)
VALUE ('".$post_id."', '".$ac_id."', '".$rate."')";
if ($conn->query($sql) === TRUE) {
  $code = '200';
} else {
  $code = '400';
}
echo json_encode(array('code'=>$code));
?>