<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
require_once(dirname(__FILE__, 3).'/account/index.php');
$post_id = '1';
$content = 'nice!';
$username = 'e_shop';
$password = 'sfa990103';
$ac_id = ac_getid($conn, $username, $password);
$sql = "INSERT INTO comment (post_id, content, ac_id)
VALUE ('".$post_id."', '".$content."', '".$ac_id."')";
if ($conn->query($sql) === TRUE) {
  $code = '201';
} else {
  $code = '402';
}
echo json_encode(array('code'=>$code));
?>
