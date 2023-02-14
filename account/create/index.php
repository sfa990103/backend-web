<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
$ac_name = $_POST['ac_name'];
$ac_pw = $_POST['ac_pw'];
$ac_email = $_POST['ac_email'];
$ac_dob = $_POST['ac_dob'];
$ac_gender = $_POST['ac_gender'];
$sql = "INSERT INTO account (username, password, email, dob, gender)
VALUES ('".$ac_name."', '".$ac_pw."', '".$ac_email."', '".$ac_dob."', '".$ac_gender."')";
if ($conn->query($sql) === TRUE) {
  $code = '200';
} else {
  $code = '401';
}
$conn->close();
echo json_encode(array('code'=>$code));
?>