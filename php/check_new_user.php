<?php
session_start();
date_default_timezone_set('Europe/London');
setlocale(LC_ALL,'en_GB');

$user_email = htmlspecialchars($_REQUEST['userEmail']);
$mainarray = array();

// User name or password field lenght
if (strlen($user_email) == 0) {
    $mainarray['status'] = "success";
    $mainarray['user_found'] = false;
    $mainarray['system_msg'] = "User email can't be empty.";
    echo json_encode($mainarray);
    exit;
} else {
    include('connect_db.php');
    $user_email = strip_tags($user_email);
    $user_email = addslashes($user_email);

    // Loocking user
    $myQry = "SELECT usr_email.email_address 
                FROM `user_email` AS usr_email
                LEFT JOIN `user_email_link` AS usr_email_link ON usr_email.ID = usr_email_link.user_ID
                LEFT JOIN `user_registered` AS user_real ON usr_email_link.user_ID = user_real.User_ID
                WHERE `email_address` = '".$user_email."'
                AND user_real.Deleted = 0
            ";

    $result = mysqli_query($db, $myQry);
    if (mysqli_num_rows($result)) {
        $mainarray['status'] = "success";
        $mainarray['user_found'] = true;
        $mainarray['system_msg'] = "User with this email address already existing.";
        $db->close();
        echo json_encode($mainarray);
        exit;
    } else {
        $mainarray['status'] = "success";
        $mainarray['user_found'] = false;
        $db->close();
        echo json_encode($mainarray);
        exit;
    }
}

?>