<?php
require_once('../../update.php');
require_once(dirname(__FILE__, 4).'\config\dbconnect.php');
$ac_name = 'e_eshop';
$ac_password = 'sfa990103';
$ac_new = 'e_shop';
$data = ac_upusername($conn, $ac_name, $ac_password, $ac_new);
echo $data;
?>