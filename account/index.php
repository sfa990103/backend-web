<?php
require_once('verify/index.php');
require_once(dirname(__FILE__, 2).'/config/dbconnect.php');
function ac_getdata($conn, $username, $password){
	if(ac_verify($conn,$username,$password)){
		$sql = "SELECT * FROM account WHERE username = '".$username."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
  		// output data of each row
  		while($row = $result->fetch_assoc()) {
    		$data = $row;
  		}
		} else {
  			$data = "none";
		}
	}
	else{
		$data = "verify_error";
	}
	return $data;
}
function ac_getid($conn,$username,$password){
	$data = ac_getdata($conn,$username,$password);
	return $data['id'];
}
function ac_getemail($conn,$username,$password){
	$data = ac_getdata($conn,$username,$password);
	return $data['email'];
}
function ac_getdob($conn,$username,$password){
	$data = ac_getdata($conn,$username,$password);
	return $data['dob'];
}
function ac_getprofile($conn,$username,$password){
	$data = ac_getdata($conn,$username,$password);
	return $data['profile'];
}
function ac_getgender($conn,$username,$password){
	$data = ac_getdata($conn,$username,$password);
	return $data['gender'];
}
function ac_getphoto($conn,$username,$password){
	$data = ac_getdata($conn,$username,$password);
	return $data['photo'];
}
function ac_getlocation($conn,$username,$password){
	$data = ac_getdata($conn,$username,$password);
	return $data['location'];
}
?>