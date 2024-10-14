<?php
    session_start();
    date_default_timezone_set('Europe/London');
    setlocale(LC_ALL,'en_GB');
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../index.php?error=needlogin');
        exit();
    }
    