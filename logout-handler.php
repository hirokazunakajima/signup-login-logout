<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:index.php?session=fail');
    exit();
}

$_SESSION['username']=array();
//unset($_SESSION['username']);
session_destroy();
header('location:index.php?logout=success');
