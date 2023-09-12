
<?php include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST["id_order"];

    $bayar = $_POST["bayar"];

    $totalHistoryBayar = "SELECT terbayar FROM transaksi WHERE id_order ='$id'";
    $totalHistoryBayarr = mysqli_query($connection, $totalHistoryBayar);
    $thb = mysqli_fetch_assoc($totalHistoryBayarr);
    $thbr = $thb["terbayar"];


    $totalBayarSkrg = $thbr + $bayar;


    $query = "UPDATE transaksi SET terbayar='$totalBayarSkrg' WHERE id_order='$id'";

    if (mysqli_query($connection, $query)) {

        $addHistory = "INSERT INTO transaksi_histori (id_order, terbayar) VALUES ('$id', '$bayar')";
        mysqli_query($connection, $addHistory);
        // Data successfully inserted
        header("Location: transaksi_update.php?id=$id");
        exit();
    } else {
        // Error inserting data
        echo "Error: " . mysqli_error($connection);
    }
}
