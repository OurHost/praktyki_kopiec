<?php
include('config/config.inc.php');
include('script/header.php');

if(isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
}
?>

<div class="container-fluid">
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-6 col-12">
<?php
if(isset($_GET['kom'])) {
    if($_GET['kom'] == 1) {
        echo "<div class='alert alert-danger' role='alert'>
        Uzupełnij wszytkie dane.
      </div>";
    }
    if($_GET['kom'] == 2) {
        echo "<div class='alert alert-danger' role='alert'>
        Podane hasła nie są identyczne.
      </div>";
    }
    if($_GET['kom'] == 3) {
        echo "<div class='alert alert-danger' role='alert'>
        Błąd z zapytaniem do bazy.
      </div>";
    }
    if($_GET['kom'] == 4) {
        echo "<div class='alert alert-danger' role='alert'>
        Podany email jest już użyciu.
      </div>";
    }
}
?>
            <form method="POST" action="script/rejestracja-exe.php">
                 <div class="form-inline">
                    <input type="text" class="form-control col-6" name="imie" aria-describedby="emailHelp" placeholder="Imię">
                    <input type="text" class="form-control col-6" name="nazwisko" aria-describedby="emailHelp" placeholder="Nazwisko">
                </div>
                <div class="form-group mt-3">
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Adres e-mail">
                </div>
                <div class="form-inline">
                    <input type="text" class="form-control col-6" name="tel" aria-describedby="emailHelp" placeholder="Nr tel.">
                    <input type="date" class="form-control col-6" name="data_urodzenia" aria-describedby="emailHelp" placeholder="Data urodzenia (yyyy-mm-dd)">
                </div>
                <div class="form-inline mt-3">
                    <input type="text" class="form-control col-3" name="miejsc" aria-describedby="emailHelp" placeholder="Miejscowość">
                    <input type="text" class="form-control col-3" name="ul" aria-describedby="emailHelp" placeholder="Ulica">
                    <input type="text" class="form-control col-3" name="nr" aria-describedby="emailHelp" placeholder="Nr">
                </div>
                <div class="form-inline mt-3">
                    <input type="password" class="form-control col-6" name="haslo1" aria-describedby="emailHelp" placeholder="Hasło">
                    <input type="password" class="form-control col-6" name="haslo2" aria-describedby="emailHelp" placeholder="Powtórz hasło">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Zarejestruj</button>
            </form>
        </div>
    </div>
</div>

<?php
include('script/footer.php');
?>