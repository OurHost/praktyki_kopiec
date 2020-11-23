<?php
session_start();
include('../config/config.inc.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['nazwa']) || empty($_POST['opis']) || empty($_POST['rozmiar']) || empty($_POST['cena'])) {
        header("location: ../dodaj_produkt.php?kom=1");
    }
    else {
        $nazwa = $_POST['nazwa'];
        $opis = $_POST['opis'];
        $rozmiar = $_POST['rozmiar'];
        $cena = $_POST['cena'];
        $kategoria = $_POST['kategoria'];

        $nazwa = stripslashes ($nazwa);
        $opis = stripslashes ($opis);
        $rozmiar = stripslashes ($rozmiar);
        $cena = stripslashes ($cena);
        $nazwa = mysqli_real_escape_string ($conn, $nazwa);
        $opis = mysqli_real_escape_string ($conn, $opis);
        $rozmiar = mysqli_real_escape_string ($conn, $rozmiar);
        $cena = mysqli_real_escape_string ($conn, $cena);

        $sql = "INSERT INTO `dania` (`id`, `nazwa`, `opis`, `rozmiar`, `cena`, `dania_kategoria_id`) VALUES (NULL, '$nazwa', '$opis', '$rozmiar', '$cena', '$kategoria');";
        if(mysqli_query($conn, $sql)) {
            header("location: ../dodaj_produkt.php?kom=2");
        }
        else{
            header("location: ../dodaj_produkt.php?kom=3");
        }

        
    }

}

?>