<?php
session_start();
include('../config/config.inc.php');

            $id = $_GET['id'];
            $sql = "DELETE FROM dania WHERE id = '$id'";
            if(mysqli_query($conn, $sql)) {
                header("location: ../dodaj_produkt.php?kom=4");
            }


?>