<?php

include('config/config.inc.php');
include('script/header.php');

if(isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
}
?>

<div class="container-fluid">
    <div class="row justify-content-md-center mt-5">
        <div class="col-6">
 <?php
if(isset($_GET['kom'])) {
    if($_GET['kom'] == 1) {
        echo "<div class='alert alert-danger' role='alert'>
        Uzupełnij wszytkie dane.
      </div>";
    }
    if($_GET['kom'] == 2) {
        echo "<div class='alert alert-danger' role='alert'>
        Nie znaleziono użytkownika w bazie danych.
      </div>";
    }
}
?>
            <form method="POST" action="script/logowanie-exe.php">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="haslo">Password</label>
                    <input type="password" class="form-control" id="haslo" name="haslo" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Zaloguj</button>
            </form>
        </div>
    </div>
</div>

<?php
include('script/footer.php');
?>