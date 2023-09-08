<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deskripsi = $_POST['deskripsi'];
    $persentase = $_POST['persentase'];

    $insertQuery = "INSERT INTO diskon (diskon_deskripsi, diskon_persentase) VALUES ('$deskripsi', '$persentase')";
    if (mysqli_query($connection, $insertQuery)) {
        echo json_encode(array("status" => "success", "message" => "Potongan berhasil ditambahkan."));
    } else {
        echo json_encode(array("status" => "error", "message" => "Gagal menambahkan potongan."));
    }

    mysqli_close($connection);
}
