<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
$id="1";
$sql="DELETE FROM orders WHERE id='".$id."'";
if ($conn->query($sql) === TRUE) {
  			$code = '202';
		} else {
  			$code = '403';
		}
echo $code;
?>