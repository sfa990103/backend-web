<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
require_once(dirname(__FILE__, 3).'/account/index.php');
$username = "e_shop";
$password = "sfa990103";
$ac_id = ac_getid($conn, $username, $password);
$follower_id = "1";
$sql = "INSERT INTO follow (ac_id, follower_id)
VALUE ('".$follower_id."','".$ac_id."')";
if ($conn->query($sql) === TRUE) {
  $code = '200';
} else {
  $code = '400';
}
echo json_encode(array('code'=>$code));
?>
