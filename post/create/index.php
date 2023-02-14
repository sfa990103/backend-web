<?php
require_once(dirname(__FILE__, 3).'/config/dbconnect.php');
require_once(dirname(__FILE__, 3).'/account/index.php');
require_once(dirname(__FILE__, 3).'/hashtag/create/index.php');
function createwithlocation($ac_id, $title, $content, $price, $photos,$conn){
	$ts = (string)date('Y-m-d H:i:s');
	echo $ts;
	$sql = "INSERT INTO post (ac_id, title, content, price, ts, photos) 
	VALUES ('".$ac_id."','".$title."', '".$content."', '".$price."', '".$ts."', '".$photos."')";
	if ($conn->query($sql) === TRUE) {
  		$code = '200';
	} else {
  		$code = '401';
	}
	if ($code == "200"){
		$id = getidjustcreate($ac_id,$title,$content,$price,$ts,$photos,$conn);
		echo $id;
		hashtag_create($content,$id,$conn);
	}
	echo json_encode(array('code'=>$code));
}
function getidjustcreate($ac_id,$title,$content,$price,$ts,$photos,$conn){
	$sql = "SELECT id FROM post WHERE ac_id='".$ac_id."' AND title='".$title."' AND content='".$content."' AND ts='".$ts."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$id = $row['id'];
		}
	}
	else{
		$id = "error";
	}
	return $id;
}
$username = 'e_shop';
$password = 'sfa990103';
$ac_id = ac_getid($conn, $username, $password);
$title = "nice shirt";
$content = 'nice shirt #nice #shirt';
$price = '9.6';
$photos = '1.jpg';
$location = 'UK';
createwithlocation($ac_id,$title,$content,$price,$photos,$conn);
?>