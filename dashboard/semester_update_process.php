<?php
include '../connection.php';

if (isset($_POST['update_semester'])) {
    $id_transaksi_detail = $_POST['id_transaksi_detail'];
    $tapel = $_POST['tapel'];
    $semester = $_POST['semester'];
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

    $update_query = "UPDATE transaksi_detail SET
                    tahun_pelajaran = '$tapel',
                    semester = '$semester',
                    biaya_listrik = '$biaya_listrik',
                    biaya_asrama = '$biaya_asrama',
                    biaya_pesantren = '$biaya_pesantren',
                    biaya_madin = '$biaya_madin',
                    biaya_mqqurani = '$biaya_mqqurani',
                    biaya_mqtahfidz = '$biaya_mqtahfidz',
                    biaya_mksni = '$biaya_mksni',
                    biaya_mqtahsin = '$biaya_mqtahsin',
                    biaya_uks = '$biaya_uks',
                    biaya_lemari = '$biaya_lemari',
                    biaya_ujianmd = '$biaya_ujianmd',
                    biaya_makan = '$biaya_makan'
                    WHERE id_transaksi_detail = '$id_transaksi_detail'";

    if (mysqli_query($connection, $update_query)) {
        header("Location: semester.php");
        exit();
    } else {
        echo "Error updating semester: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
