<?php
    session_start();
    date_default_timezone_set('Europe/London');
    setlocale(LC_ALL,'en_GB');
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../index.php?error=needlogin');
        exit();
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login to MyMoney</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/menu.css"> 
    <link rel="stylesheet" href="../bootstrap-5.3.3/css/bootstrap.css">
    <script src="../bootstrap-5.3.3/js/bootstrap.js"></script>
    <script src="../js/jquery_3_7.js"></script>
    <script src="../js/menu.js"></script>
</head>
<body>
    <div class="mybox">
        <div class="seif_img"></div>
    </div>
    <div class="mybox">
        <div class="cst-btn cst-check-btn"></div>
        <div class="cst-btn cst-events-btn"></div>
        <div class="cst-btn cst-toDo-btn"></div>
        <div class="cst-btn cst-settings-btn"></div>
        <div class="cst-btn cst-logOff-btn" onClick="killSession();"></div>
    </div>
    <div>
        jurij test<p>
            <?php echo ("".$_SESSION['user_id'].""); ?>
        </p>
    </div>
</body>
</html>