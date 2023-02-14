<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
require_once(dirname(__FILE__, 3).'/account/index.php');
$username = "e_shop";
$password = "sfa990103";
$ac_id = ac_getid($conn, $username, $password);
$id = "1";
$rate = "3.8";
$sql = "UPDATE rating SET rate = '".$rate."' WHERE id='".$id."' AND ac_id='".$ac_id."'";
if ($conn->query($sql) === TRUE) {
  $code = '201';
} else {
  $code = '402';
}
echo json_encode(array('code'=>$code));
?>