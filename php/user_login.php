<?php
    session_start();
    date_default_timezone_set('Europe/London');
    setlocale(LC_ALL,'en_GB');
    $user_name = htmlspecialchars($_REQUEST['userEmail']);
    $user_key= md5(htmlspecialchars($_REQUEST['userPassword']));

    // User name or password field lenght
    if ((strlen($user_name) == 0) || (strlen($user_key) == 0)){
        $mainarray = array();
        $mainarray['status'] = "success";
        $mainarray['user_found'] = "Wrong user data";
        echo json_encode($mainarray);
        exit;
    }

    // User data sanitaizing
        $user_name = strip_tags($user_name);
        $user_name = addslashes($user_name);
    
    include('connect_db.php');

    $usr_qry = "SELECT usr_mail.ID, usr_mail.email_address, usr_key.key
                FROM `user_email` AS usr_mail
                LEFT JOIN `user_key` AS usr_key ON usr_mail.ID = usr_key.ID
                LEFT JOIN `user_registered` AS usr_reg ON usr_key.ID = usr_reg.User_ID
                WHERE usr_mail.email_address = '".$user_name."'
                AND usr_key.key = '".$user_key."'
                AND usr_reg.Deleted = 0;";

    $result = mysqli_query($db, $usr_qry);
    if (mysqli_num_rows($result)) {
        $found_user = "success";
        $row = mysqli_fetch_assoc($result);
    
        $login_info = date("d-m-Y H:i:s", time())."\t\t\"".$user_name."\"\t\t log in \t\t".$_SERVER['REMOTE_ADDR']."\n";
        
        //----------------------------
    } else {
        $found_user = "false";
        $login_info = date("d-m-Y H:i:s", time())."\t\t\"".$user_name."\"\t\t log in FAULT \t\t".$_SERVER['REMOTE_ADDR']."\n";
    }

    $mainarray['status'] = "success";
    $mainarray['user_found'] = $found_user;
    echo json_encode($mainarray);
    exit;
?>