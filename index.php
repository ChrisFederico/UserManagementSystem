<?php
require 'functions.php';
require 'connection.php';
$page = $_SERVER['PHP_SELF'];
$numberOfRecordsOptions = [5, 10, 20, 50, 100];
?>
<!doctype html>
<html lang="en" class="h-100">
    <head>
        <title>Chris Federico · User Management System</title>
        <?php require_once 'resources/views/head.php'; ?>
    </head>

    <body class="d-flex flex-column h-100">
        <?php require_once 'resources/views/header.php'; ?>
        <?php require_once 'resources/views/main_content.php'; ?>
        <?php require_once 'resources/views/footer.php'; ?>
    </body>
</html>
