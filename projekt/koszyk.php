<?php
include('config/config.inc.php');
include('script/header.php');
if(!isset($_SESSION['zalogowany'])) {
    header('Location: error.php');
}
else
{
    if($_SESSION['pracownik'] == 1) {
        header('Location: error.php');
    }
}
$imie = $_SESSION['imie'];
$nazwisko = $_SESSION['nazwisko'];
$email = $_SESSION['email'];
$telefon = $_SESSION['telefon'];
$miejscowosc = $_SESSION['miejscowosc'];
$ulica = $_SESSION['ulica'];
$numer = $_SESSION['numer'];
?>

<div class="container">
<?php
if(isset($_GET['kom'])) {
    if($_GET['kom'] == 1) {
        echo "<div class='alert alert-danger mt-3' role='alert'>
        Uzupełnij wszytkie dane.
      </div>";
    }
}
?>
    <div class="row justify-content-md-center">
        <div class="col-12 col-md-7">
            <form method="POST" action="script/zamowienie-exe.php">
            <h1 class="m-3">Dane kontaktowe</h1>
                <label for="nazwa">Imię i nazwisko</label>
                <div class="form-inline">
                    <input type="text" class="form-control col-6" name="imie" aria-describedby="emailHelp" placeholder="Imię" <?php if(isset($_SESSION['zalogowany'])){ echo "value='$imie'";} ?>>
                    <input type="text" class="form-control col-6" name="nazwisko" aria-describedby="emailHelp" placeholder="Nazwisko" <?php if(isset($_SESSION['zalogowany'])){echo "value='$nazwisko'";} ?>>
                </div>
                <div class="form-group mt-3">
                    <label for="nazwa">Telefon</label>
                    <input type="text" class="form-control" id="telefon" name="telefon" aria-describedby="emailHelp" placeholder="Nr tel." <?php if(isset($_SESSION['zalogowany'])){echo "value='$telefon'";} ?>>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" <?php if(isset($_SESSION['zalogowany'])){echo "value='$email'";} ?>>
                </div>
            <h1 class="m-3">Dostawa</h1>
                <label for="ulica">Ulica i numer</label>
                <div class="form-inline">
                    <input type="text" class="form-control col-8" name="ulica" aria-describedby="emailHelp" placeholder="Ulica" <?php if(isset($_SESSION['zalogowany'])){echo "value='$ulica'";} ?>>
                    <input type="text" class="form-control col-4" name="numer" aria-describedby="emailHelp" placeholder="Nr" <?php if(isset($_SESSION['zalogowany'])){echo "value='$numer'";} ?>>
                </div>
                <div class="form-group mt-3">
                    <label for="miejscowosc">Miejscowość</label>
                    <input type="text" class="form-control" id="miejscowosc" name="miejscowosc" aria-describedby="emailHelp" placeholder="Miejscowość" <?php if(isset($_SESSION['zalogowany'])){echo "value='$miejscowosc'";} ?>>
                </div>
                <div class="form-group">
                    <label for="opis">Uwagi do zamówienia</label>
                    <textarea class="form-control" id="opis" name="opis" rows="3" placeholder="Uwagi"></textarea>
                </div>
                <div class="form-group">
                    <label for="platnosc">Typ platności</label>
                    <?php
    $sql = "SELECT * FROM platnosc";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<select class="form-control" name="platnosc">';
    while($row = mysqli_fetch_assoc($result)) {
    echo "<option value=".$row['id'].">".$row['typ']."</option>";
    }
    echo "</select>";
    } else {
    echo "0 results";
    }
?>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Zamów</button>
            </form>
        </div>
        <div class="col-12 col-md-5">
        <h1 class="m-3">
        Koszyk
        <small><a href='script/usun_koszyk-exe.php'>(Wyczyść)</a></small>
        </h1>
            <?php
if(isset($_SESSION['koszyk'])) {

    echo "<table class='table'>
    <thead>
      <tr>
        <th scope='col'>Nazwa</th>
        <th scope='col'>Cena</th>

      </tr>
    </thead>";
        $cena = 0;
        foreach ($_SESSION['koszyk'] as &$value) {
            $sql = "SELECT nazwa, cena FROM dania where id='$value'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo "<tr>
            <td>".$row['nazwa']." </td>
            <td>".$row['cena']."</td>
          </tr>";
            $cena = $cena + $row['cena'];
        } 
        $_SESSION['cena'] = $cena;
        echo "<tr>
        <td><b class='text-danger'>Łącznie</b></td>
        <td><b class='text-danger'>".$cena."</b></td>
      </tr>";
    echo "</tbody>
    </table>";

}
else {
    echo "Koszyk pusty";
}
?>
        </div>
    </div>
    <?php
include('script/footer.php');
?>