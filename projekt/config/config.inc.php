<?php
$servername = "localhost";
$username = "admin";
$password = "haslo123";
$dbname = "mydb";

// Utworzenie połączenia (nazwa serwera, użytkownik, hasło, baza danych)
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Sprawdzenie czy udało się połączyć z bazą danych
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

?>