<?php
session_start();
date_default_timezone_set('Europe/London');
setlocale(LC_ALL,'en_GB');

$user_email = htmlspecialchars($_REQUEST['userEmail']);
$user_key = md5($_REQUEST['userPassword']);
$user_found = "";

include('connect_db.php');

$mainarray = array();

$mainarray['msg'] = $user_email;




$db->close();

$mainarray['status'] = "success";
echo json_encode($mainarray);
exit;
?>