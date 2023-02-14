<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
require_once(dirname(__FILE__, 3).'/account/index.php');
$post_id = '1';
$type = 'post';
$username = 'e_shop';
$password = 'sfa990103';
$ac_id = ac_getid($conn, $username, $password);
$sql = "INSERT INTO likes (post_id, ac_id, type)
VALUE ('".$post_id."', '".$ac_id."', '".$type."')";
if ($conn->query($sql) === TRUE) {
  $code = '200';
} else {
  $code = '401';
}
echo json_encode(array('code'=>$code));
?>