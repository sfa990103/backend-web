<?php
require_once('verify/index.php');
function ac_upusername($conn, $username, $password, $new){
	if(ac_verify($conn,$username,$password)){
		$sql = "UPDATE account SET username='".$new."' WHERE username='".$username."'";
		if ($conn->query($sql) === TRUE) {
  			$code = '201';
		} else {
  			$code = '402';
		}
	}
	return $code;
}
function ac_uppassword($conn, $username, $password, $new){
	if(ac_verify($conn,$username,$password)){
		$sql = "UPDATE account SET password='".$new."' WHERE username='".$username."'";
		if ($conn->query($sql) === TRUE) {
  			$code = '201';
		} else {
  			$code = '402';
		}
	}
	return $code;
}
function ac_upemail($conn, $username, $password, $new){
	if(ac_verify($conn,$username,$password)){
		$sql = "UPDATE account SET email='".$new."' WHERE username='".$username."'";
		if ($conn->query($sql) === TRUE) {
  			$code = '201';
		} else {
  			$code = '402';
		}
	}
	return $code;
}
function ac_upgender($conn, $username, $password, $new){
	if(ac_verify($conn,$username,$password)){
		$sql = "UPDATE account SET gender='".$new."' WHERE username='".$username."'";
		if ($conn->query($sql) === TRUE) {
  			$code = '201';
		} else {
  			$code = '402';
		}
	}
	return $code;
}
function ac_upprofile($conn, $username, $password, $new){
	if(ac_verify($conn,$username,$password)){
		$sql = "UPDATE account SET profile='".$new."' WHERE username='".$username."'";
		if ($conn->query($sql) === TRUE) {
  			$code = '201';
		} else {
  			$code = '402';
		}
	}
	return $code;
}
function ac_upphoto($conn, $username, $password, $new){
	if(ac_verify($conn,$username,$password)){
		$sql = "UPDATE account SET photo='".$new."' WHERE username='".$username."'";
		if ($conn->query($sql) === TRUE) {
  			$code = '201';
		} else {
  			$code = '402';
		}
	}
	return $code;
}
?>