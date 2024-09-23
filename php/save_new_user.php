<?php
session_start();
date_default_timezone_set('Europe/London');
setlocale(LC_ALL,'en_GB');

// Connecting database
include('connect_db.php');

$user_email = htmlspecialchars($_REQUEST['userEmail']);
$user_key = md5($_REQUEST['userPassword']);

// Create random ID
function newUserId() {
    return md5(rand(100,9999999999));
}

// Check new user ID for coincidences at database
function checkNewId($new_id, $db) {
    $usr_qry = "SELECT User_ID 
                FROM `user_registered`
                WHERE User_ID = '".$new_id."'
            ";
    $id_result = $db->query($usr_qry);

    if (mysqli_num_rows($id_result)) {
        // if ID fount
        return true;
    } else {
        // If ID not fount
        return false;
    }
}

do {
    $new_id = newUserId();
    $id_fount = checkNewId($new_id, $db);
} while ($id_fount);
// ---------------------------------------------------------------

// Store new user into database
$today_date = date("Y-m-d h:i:s");
$its_null = null;
$its_zero = 0;
$query = "INSERT INTO user_registered VALUES (?,?,?,?)";
$stmt = $db->prepare($query);
$stmt->bind_param("sssi", $new_id, $today_date, $its_null, $its_zero);
$stmt->execute();

$query = "INSERT INTO user_email VALUES (?,?)";
$stmt = $db->prepare($query);
$stmt->bind_param("ss", $new_id, $user_email);
$stmt->execute();

$query = "INSERT INTO user_name_surname VALUES (?,?,?)";
$stmt = $db->prepare($query);
$stmt->bind_param("sss", $new_id, $its_null, $its_null);
$stmt->execute();

$query = "INSERT INTO user_connections VALUES (?,?,?,?)";
$stmt = $db->prepare($query);
$stmt->bind_param("ssis", $new_id, $its_null, $its_zero, $its_null);
$stmt->execute();
//----------------------------------------------------------------

$mainarray = array();
$mainarray['msg'] = $new_id;
$db->close();

$mainarray['status'] = "success";
echo json_encode($mainarray);
exit;
?>