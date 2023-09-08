<?php
// get_checkbox_values.php

// Include your database connection
include '../connection.php';

if (isset($_GET['id_transaksi_detail'])) {
    $id_transaksi_detail = $_GET['id_transaksi_detail'];

    $query = "SELECT biaya_listrik, biaya_asrama, biaya_pesantren FROM transaksi_detail WHERE id_transaksi_detail = $id_transaksi_detail";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $checkboxes = [
            ["fieldName" => "biaya_listrik", "value" => $row['biaya_listrik'], "label" => "1. Biaya Listrik : " . $row['biaya_listrik']],
            ["fieldName" => "biaya_asrama", "value" => $row['biaya_asrama'], "label" => "2. Biaya Asrama : " . $row['biaya_asrama']],
            ["fieldName" => "biaya_pesantren", "value" => $row['biaya_pesantren'], "label" => "3. Biaya Pesantren : " . $row['biaya_pesantren']],
            // ... Add other checkboxes as needed
        ];

        echo json_encode($checkboxes);
    }
}
