
<?php include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST["id_transaksi"];

    $terbayar = $_POST["terbayar"];

    $tampil = "SELECT terbayar FROM transaksi WHERE id_transaksi = $id";
    $terbayarkan = $tampil + $terbayar;

    $query = "UPDATE transaksi SET terbayar='$terbayarkan' WHERE id_transaksi='$id'";


    if (mysqli_query($connection, $query)) {

        // Data successfully inserted
        header("Location: transaksi.php");
        exit();
    } else {
        // Error inserting data
        echo "Error: " . mysqli_error($connection);
    }
}
