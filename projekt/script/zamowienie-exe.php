<?php
session_start();
include('../config/config.inc.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['imie']) || empty($_POST['nazwisko']) || empty($_POST['telefon']) || empty($_POST['email']) || empty($_POST['ulica']) || empty($_POST['numer'])
    || empty($_POST['miejscowosc'])){
        header("location: ../koszyk.php?kom=1");
    }
    else {
    $id = $_SESSION['id'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $ulica = $_POST['ulica'];
    $numer = $_POST['numer'];
    $miejscowosc = $_POST['miejscowosc'];
    $opis = $_POST['opis'];
    $platnosc = $_POST['platnosc'];
    $data = date("Y-m-d H:i:s");
    $cena = $_SESSION['cena'];
    
    $sql2 = "INSERT INTO `zamowienia` (`id`, `data_zamowienia`, `opis`, `cena`, `klienci_id`, `pracownicy_id`, `platnosc_id`) VALUES (NULL, '$data', '$opis', '$cena', '$id', '1', '$platnosc')";
    if(mysqli_query($conn, $sql2)){
        $numer_zamowienia = mysqli_insert_id($conn);
     }
     
    foreach ($_SESSION['koszyk'] as &$value) {
        $sql3 = "INSERT INTO `dania_has_zamowienia` (`dania_id`, `zamowienia_id`) VALUES ('$value', '$numer_zamowienia')";
        $result = mysqli_query($conn, $sql3);
        } 
      
    $sql = "UPDATE klienci SET imie = '$imie', nazwisko = '$nazwisko', email = '$email', nr_tel = '$telefon', miasto = '$miejscowosc', ulica = '$ulica', nr_domu = '$numer' WHERE id = '$id'";
    if(mysqli_query($conn, $sql))
    {
        echo "Wykonano";
    }
        
    }
}
?>