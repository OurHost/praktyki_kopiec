<?php
session_start();
include('../config/config.inc.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['email']) || empty($_POST['haslo'])) {
        header("location: ../logowanie.php?kom=1");
    }
    else {
        $email = $_POST['email'];
        $haslo = $_POST['haslo'];

        $email = stripslashes ($email);
        $haslo = stripslashes ($haslo);
        $email = mysqli_real_escape_string ($conn, $email);
        $haslo = mysqli_real_escape_string ($conn, $haslo);

        $sql = "select * from klienci where email='$email' and haslo='$haslo'";
        
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
// klienci
        if(mysqli_num_rows($result)==1) {
            $_SESSION['zalogowany'] = 1;
            $_SESSION['pracownik'] = 0;
            $_SESSION['id'] = $row['id'];
            $_SESSION['imie'] = $row['imie'];
            $_SESSION['nazwisko'] = $row['nazwisko'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['telefon'] = $row['nr_tel'];
            $_SESSION['miejscowosc'] = $row['miasto'];
            $_SESSION['ulica'] = $row['ulica'];
            $_SESSION['numer'] = $row['nr_domu'];
            header('location: ../index.php?kom=1');
        }
// pracownicy
        else {
            $sql = "select * from pracownicy where email='$email' and haslo='$haslo'";
        
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
            if(mysqli_num_rows($result)==1) {
                $_SESSION['imie'] = $row['imie'];
                $_SESSION['zalogowany'] = 1;
                $_SESSION['pracownik'] = 1;
                header('location: ../index.php?kom=1');
            }  
            else {
                header("location: ../logowanie.php?kom=2");
            }    

        }
        
    }

}

?>