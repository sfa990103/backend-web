<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
require_once(dirname(__FILE__, 3).'/account/index.php');
$post_id = '1';
$username = 'e_shop';
$password = 'sfa990103';
$ac_id = ac_getid($conn, $username, $password);
$sql = "DELETE FROM likes WHERE post_id = '".$post_id."' AND ac_id = '".$ac_id."' AND type = '".$type."'";
if ($conn->query($sql) === TRUE) {
  $code = '202';
} else {
  $code = '403';
}
echo json_encode(array('code'=>$code));
?>