<?php
session_start();
include('../config/config.inc.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['nazwa'])){
        header("location: ../dodaj_kategorie.php?kom=1");
    }
    else {
        $nazwa = $_POST['nazwa'];

        $nazwa = stripslashes ($nazwa);
        $nazwa = mysqli_real_escape_string ($conn, $nazwa);


        $sql = "INSERT INTO `dania_kategoria` (`id`, `nazwa`) VALUES (NULL, '$nazwa');";
        if(mysqli_query($conn, $sql)) {
            header("location: ../dodaj_kategorie.php?kom=2");
        }
        else{
            header("location: ../dodaj_kategorie.php?kom=3");
        }

        
    }

}

?>