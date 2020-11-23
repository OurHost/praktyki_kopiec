<?php
session_start();
include('../config/config.inc.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['imie']) || empty($_POST['nazwisko']) || empty($_POST['email']) || empty($_POST['tel']) || empty($_POST['data_urodzenia']) || empty($_POST['miejsc']) || 
    empty($_POST['ul']) || empty($_POST['nr']) || empty($_POST['haslo1']) || empty($_POST['haslo2'])) {
        header("location: ../rejestracja.php?kom=1");
    }
    else {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $d_uro = $_POST['data_urodzenia'];
    $d_zal = date("Y-m-d H:i:s");
    $miejsc = $_POST['miejsc'];
    $ul = $_POST['ul'];
    $nr = $_POST['nr'];
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    $sql = "select * from klienci where email='$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if(mysqli_num_rows($result)==1) {
        header('location: ../rejestracja.php?kom=4');
    }
    else {
        if($haslo1 == $haslo2) {
            $sql = "insert into klienci (id, imie, nazwisko, email, nr_tel, data_urodzenia, data_zalozenia_konta, haslo, miasto, ulica, nr_domu) 
            VALUES (NULL, '$imie', '$nazwisko', '$email', '$tel', '$d_uro', '$d_zal', '$haslo1', '$miejsc', '$ul', '$nr')";
            if(mysqli_query($conn, $sql)) {
                $_SESSION['zalogowany'] = 1;
                $_SESSION['imie'] = $imie;
                header("location: ../index.php?kom=1");
            }
            else{
                header("location: ../rejestracja.php?kom=3");
            }
        }
        else {
            header("location: ../rejestracja.php?kom=2");
        }
    }
    }
}
?>

