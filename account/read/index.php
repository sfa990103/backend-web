<?php
require_once(dirname(__FILE__, 2).'/verify/index.php');
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
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
function ac_search($conn,$username){
	$sql="SELECT id, photo, username, name, location FROM account WHERE username LIKE '%".$username."%'";
		$result = $conn->query($sql);
		$i=0;
		if ($result->num_rows > 0) {
  		// output data of each row
  		while($row = $result->fetch_assoc()) {
    		$data[$i]['id'] = $row['id'];
			$data[$i]['photo'] = $row['photo'];
			$data[$i]['username'] = $row['username'];
			$data[$i]['name'] = $row['name'];
			$data[$i]['location'] = $row['location'];
			$i++;
  		}
		} else {
  			$data = "none";
		}
	return $data;
}
function ac_getacphoto($conn,$id){
	$sql="SELECT photo FROM account WHERE id='".$id."'";
	$result = $conn->query($sql);
		if ($result->num_rows > 0) {
  		// output data of each row
  		while($row = $result->fetch_assoc()) {
    		$data = $row['photo'];
  		}
		} else {
  			$data = "none";
		}
	return $data;
}
function ac_getacusername($conn,$id){
	$sql="SELECT username FROM account WHERE id='".$id."'";
	$result = $conn->query($sql);
		if ($result->num_rows > 0) {
  		// output data of each row
  		while($row = $result->fetch_assoc()) {
    		$data = $row['username'];
  		}
		} else {
  			$data = "none";
		}
	return $data;
}
function ac_getacname($conn,$id){
	$sql="SELECT name FROM account WHERE id='".$id."'";
	$result = $conn->query($sql);
		if ($result->num_rows > 0) {
  		// output data of each row
  		while($row = $result->fetch_assoc()) {
    		$data = $row['name'];
  		}
		} else {
  			$data = "none";
		}
	return $data;
}
function ac_getacprofile($conn,$id){
	$sql="SELECT profile FROM account WHERE id='".$id."'";
	$result = $conn->query($sql);
		if ($result->num_rows > 0) {
  		// output data of each row
  		while($row = $result->fetch_assoc()) {
    		$data = $row['profile'];
  		}
		} else {
  			$data = "none";
		}
	return $data;
}
function ac_getaclocation($conn,$id){
	$sql="SELECT location FROM account WHERE id='".$id."'";
	$result = $conn->query($sql);
		if ($result->num_rows > 0) {
  		// output data of each row
  		while($row = $result->fetch_assoc()) {
    		$data = $row['location'];
  		}
		} else {
  			$data = "none";
		}
	return $data;
}
?>