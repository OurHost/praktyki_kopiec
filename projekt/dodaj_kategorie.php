<?php

include('config/config.inc.php');
include('script/header.php');

if(!isset($_SESSION['zalogowany'])) {
    header('Location: error.php');
}
else
{
    if($_SESSION['pracownik'] == 0) {
        header('Location: error.php');
    }
}
    
?>

<div class="container">
    <h1 class="m-3">Dodaj kategorię</h1>
    <div class="row justify-content-md-center">
        <div class="col-12 col-md-6">
            <?php
if(isset($_GET['kom'])) {
    if($_GET['kom'] == 1) {
        echo "<div class='alert alert-danger' role='alert'>
        Uzupełnij wszytkie dane.
      </div>";
    }
    if($_GET['kom'] == 2) {
        echo "<div class='alert alert-success' role='alert'>
        Dodano kategorię
      </div>";
    }
    if($_GET['kom'] == 3) {
        echo "<div class='alert alert-danger' role='alert'>
        Nie dodano kategori
      </div>";
    }
    if($_GET['kom'] == 4) {
        echo "<div class='alert alert-primary' role='alert'>
        Usunięto kategorię
      </div>";
    }
}
?>
            <form method="POST" action="script/dodaj_kategoria-exe.php">
                <div class="form-group">
                    <label for="nazwa">Nazwa</label>
                    <input type="text" class="form-control" id="nazwa" name="nazwa" aria-describedby="emailHelp"
                        placeholder="Nazwa">
                </div>
                <button type="submit" class="btn btn-primary mb-3">Dodaj</button>
            </form>
        </div>
        <div class="col-12 col-md-6">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Opcje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
  $sql = "SELECT * FROM dania_kategoria";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $i=1;
    while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <th scope='row'>".$i."</th>
            <td>".$row["nazwa"]."</td>
            <td><a href='script/usun_kategorie-exe.php?id=".$row["id"]."'>Usuń</a></td>
        </tr>";
        $i++;
    }
    } else {
    echo "0 results";
    }
?>
            </table>
        </div>
    </div>
</div>

<?php
include('script/footer.php');
?>