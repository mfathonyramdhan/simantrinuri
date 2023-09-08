<?php
// Include your database connection and any necessary setup
include '../connection.php';

if (isset($_GET['id_transaksi_detail'])) {
    $selectedId = $_GET['id_transaksi_detail'];

    // Perform database query to fetch the biaya values based on $selectedId
    // Replace 'your_db_connection' with your actual database connection variable

    $query = "SELECT biaya_listrik, biaya_asrama, biaya_pesantren, biaya_madin, biaya_mqqurani, biaya_mqtahfidz, biaya_mksni, biaya_mqtahsin, biaya_uks, biaya_lemari, biaya_ujianmd, biaya_makan FROM transaksi_detail WHERE id_transaksi_detail = $selectedId";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Return the biaya values as JSON response
        header('Content-Type: application/json');
        echo json_encode($row);
    } else {
        // Handle database query error
        // You can return an appropriate error response here
        echo json_encode(array('error' => 'Database query error'));
    }
} else {
    // Handle error if id_transaksi_detail is not set
    // You can return an appropriate error response here
    echo json_encode(array('error' => 'id_transaksi_detail is not set'));
}
