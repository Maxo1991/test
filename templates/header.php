<?php
session_start();
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Citrus</title>
</head>
<body>
<!-- As a link -->
<nav class="navbar">
    <a class="navbar-brand mx-auto h5" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . '/test' ?>" style="color: #3ca4cc !important;">Citrus</a>
    <?php
//        if($_SERVER['SCRIPT_NAME'] == "/test/admin-home.php") {
//            ?>
<!--            <a href="logout.php" class="login-logout-button">Logout</a>-->
<!--            --><?php
//        }elseif($_SERVER['SCRIPT_NAME'] == "/test/login.php"){
//            ?>
<!---->
<!--            --><?php
//        }
//        else{
//            ?>
<!--            <a href="login.php" class="login-logout-button">Login</a>-->
<!--            --><?php
//        }
    if(isset($_SESSION["id"]) || !empty($_SESSION["id"])){
        ?>
        <a href="admin-home.php" class="login-logout-button"style="margin-right: 15px;">Admin-home</a>
        <a href="logout.php" class="login-logout-button">Logout</a>
        <?php
    }else{
        ?>
        <a href="login.php" class="login-logout-button">Login</a>
        <?php
    }
    ?>
</nav>
<div class="container">

