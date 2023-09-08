<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $discountId = $_POST['discount_id'];
    $deskripsi = $_POST['deskripsi'];
    $persentase = $_POST['persentase'];

    $updateQuery = "UPDATE diskon SET diskon_deskripsi = '$deskripsi', diskon_persentase = '$persentase' WHERE diskon_id = $discountId";
    if (mysqli_query($connection, $updateQuery)) {
        echo "<script>alert('Potongan berhasil diperbarui.'); window.location='potongan.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui potongan.');</script>";
    }

    mysqli_close($connection);
}
