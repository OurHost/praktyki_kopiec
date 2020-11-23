<?php
include('config/config.inc.php');
include('script/header.php');
?>

<div class="container-fluid">
<div class="row justify-content-md-center">
        <div class="col-12 bg">
            <div class="row overlay">
                <img src="img/logo.png" class="mx-auto d-block w-25" alt="...">
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center mt-3">
        <div class="col-10">
            <h1 class="text-center mt-3 mb-3">MENU</h1>
            <form action="menu.php" method="GET">
 <?php
    $sql = "SELECT * FROM dania_kategoria";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<select class="form-control form-control-lg" name="kategoria">
                    <option selected disabled>Wybierz kategorię</option>';
    while($row = mysqli_fetch_assoc($result)) {
    echo "<option value=".$row['id'].">".$row['nazwa']."</option>";
    }
    echo "</select>";
    } else {
    echo "0 results";
    }
?>


                <input type="submit" value="Szukaj">
            </form>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Opis</th>
                        <th scope="col">Rozmiar</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Opcje</th>
                    </tr>
                </thead>
                <tbody>
<?php
    if(isset($_GET['kategoria']))
    {
        $kategoria = "where dania_kategoria_id=".$_GET['kategoria'];
    }
    else
    {
        $kategoria = '';
    }
    $sql = "SELECT * FROM dania ".$kategoria;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $i=1;
    while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <th scope='row'>".$i."</th>
            <td>".$row["nazwa"]."</td>
            <td>".$row["opis"]."</td>
            <td>".$row["rozmiar"]."</td>
            <td>".$row["cena"]."</td>
            <td><a href='script/dodaj_koszyk-exe.php?id=".$row["id"]."'>Do koszyka</a></td>
        </tr>";
        $i++;
    }
    } else {
    echo "0 results";
    }

?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php
include('script/footer.php');
?>