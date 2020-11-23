<?php
session_start();
?>
<!doctype html>
<html lang="pl">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Nazwa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Strona główna <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontakt.php">Kontakt<span class="sr-only">(current)</span></a>
                </li>
<?php 
if(isset($_SESSION['zalogowany'])){
    if($_SESSION['pracownik'] == 0){ 
?>
                <li class="nav-item">
                    <a class="nav-link" href="koszyk.php">Koszyk<span class="sr-only">(current)</span></a>
                </li>
<?php 
        }
    }
?>
            </ul>
            <span class="navbar-text">
                <?php
if(isset($_SESSION['zalogowany'])) {
    if($_SESSION['pracownik'] == 1) {
    echo "<div class='dropdown'>
        <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            ".$_SESSION['imie']."
        </button>
        <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuButton'>
            <a class='dropdown-item' href='dodaj_produkt.php'>Dodaj produkt</a>
            <a class='dropdown-item' href='dodaj_kategorie.php'>Dodaj kategorię</a>
            <a class='dropdown-item' href='zamowienia.php'>Zamówienia</a>
            <a class='dropdown-item' href='script/wyloguj.php'>Wyloguj</a>
        </div>
    </div>";
    }
    else if($_SESSION['pracownik'] == 0) {
        echo "<div class='dropdown'>
        <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            ".$_SESSION['imie']."
        </button>
        <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuButton'>
            <a class='dropdown-item' href='historia_zamowien.php'>Historia zamówień</a>
            <a class='dropdown-item' href='script/wyloguj.php'>Wyloguj</a>
        </div>
    </div>"; 
    }

}

else {
    echo "
    <a href='logowanie.php'>Zaloguj</a> / 
    <a href='rejestracja.php'>Zarejestruj się</a>
    ";
}
?>


            </span>
        </div>
    </nav>