<?php
session_start();
unset($_SESSION['koszyk']);
unset($_SESSION['index']);
header('Location: ../koszyk.php');
?>