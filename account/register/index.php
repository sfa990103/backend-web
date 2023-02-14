<?php
require_once('../../config/dbconnect.php');
$ac_name = $_POST['username'];
$ac_pw = $_POST['pw'];
$ac_email = $_POST['email'];
$ac_dob = $_POST['dob'];
$ac_gender = $_POST['gender'];
$location = $_POST['location'];
$sql = "INSERT INTO account (username, password, email, dob, gender, location)
VALUES ('".$ac_name."', '".$ac_pw."', '".$ac_email."', '".$ac_dob."', '".$ac_gender."', '".$location."')";
if ($conn->query($sql) === TRUE) {
  $code = '200';
} else {
	$error = $conn->error;
  $code = '401';
}
$conn->close();
echo json_encode(array('code'=>$code));
?>