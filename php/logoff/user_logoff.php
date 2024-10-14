<?php
date_default_timezone_set('Europe/London');
setlocale(LC_ALL,'en_GB');

    session_start();
    session_unset();
    session_destroy();
    header("Location: ../../index.php");

?>