<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $semester = $_POST['semester'];
    $tapel = $_POST['tapel'];
    $biaya_listrik = $_POST['biaya_listrik'];
    $biaya_asrama = $_POST['biaya_asrama'];
    $biaya_pesantren = $_POST['biaya_pesantren'];
    $biaya_madin = $_POST['biaya_madin'];
    $biaya_mqqurani = $_POST['biaya_mqqurani'];
    $biaya_mqtahfidz = $_POST['biaya_mqtahfidz'];
    $biaya_mksni = $_POST['biaya_mksni'];
    $biaya_mqtahsin = $_POST['biaya_mqtahsin'];
    $biaya_uks = $_POST['biaya_uks'];
    $biaya_lemari = $_POST['biaya_lemari'];
    $biaya_ujianmd = $_POST['biaya_ujianmd'];
    $biaya_makan = $_POST['biaya_makan'];

    // Perform the database insertion
    $insertQuery = "INSERT INTO transaksi_detail (semester, tahun_pelajaran, biaya_listrik, biaya_asrama, biaya_pesantren, biaya_madin, biaya_mqqurani, biaya_mqtahfidz, biaya_mksni, biaya_mqtahsin, biaya_uks, biaya_lemari, biaya_ujianmd, biaya_makan) 
                    VALUES ('$semester', '$tapel', '$biaya_listrik', '$biaya_asrama', '$biaya_pesantren', '$biaya_madin', '$biaya_mqqurani', '$biaya_mqtahfidz', '$biaya_mksni', '$biaya_mqtahsin', '$biaya_uks', '$biaya_lemari', '$biaya_ujianmd', '$biaya_makan')";

    if (mysqli_query($connection, $insertQuery)) {
        // Insertion successful
        header("Location: semester.php"); // Redirect to the semester page
        exit();
    } else {
        // Insertion failed
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
