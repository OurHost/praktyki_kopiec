<?php
session_start();
include('../config/config.inc.php');
if(!isset($_SESSION['index']))
{
    $_SESSION['index'] = 1;
}
$_SESSION['koszyk'][$_SESSION['index']] = $_GET['id'];
$_SESSION['index'] = $_SESSION['index'] + 1;
header('Location: ../menu.php');
?>