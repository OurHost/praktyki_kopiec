<?php
session_start();
include('../config/config.inc.php');

            $id = $_GET['id'];
            $sql = "DELETE FROM `dania_kategoria` WHERE `dania_kategoria`.`id` = '$id'";
            if(mysqli_query($conn, $sql)) {
                header("location: ../dodaj_kategorie.php?kom=4");
            }


?>