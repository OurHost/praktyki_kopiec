<?php

include('config/config.inc.php');
include('script/header.php');
?>

<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-12">
<?php 
    $id = $_SESSION['id'];
    $sql = "select * from zamowienia where klienci_id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $i=1;
    echo "<table class='table'>
    <thead>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Data</th>
        <th scope='col'>Opis</th>
        <th scope='col'>Platnosc</th>
      </tr>
    </thead>";
    while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <th scope='row'>".$i."</th>
            <td>".$row["data_zamowienia"]."</td>
            <td>".$row["opis"]."</td>
            <td>".$row["platnosc_id"]."</td>
        </tr>";
        $i++;
    }
    echo "</tbody>
    </table>";

    } else {
    echo "Brak wyników";
    }
?>
        </div>
    </div>
</div>
<?php
include('script/footer.php');
?>