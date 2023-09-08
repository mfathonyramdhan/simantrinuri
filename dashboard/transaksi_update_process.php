<?php
include '../connection.php';

if (isset($_GET['id']) && isset($_POST['update_transaksi'])) {
    $violationId = $_GET['id'];

    // Validate violation ID
    if (!empty($violationId)) {
        // Calculate total and update the transaction
        updateTransaction($violationId, $connection);
    } else {
        echo "<script>alert('Invalid Transaction ID');</script>";
    }
}

function updateTransaction($violationId, $connection)
{
    $biayaColumns = ['biaya_listrik', 'biaya_asrama', 'biaya_pesantren', 'biaya_madin', 'biaya_mqqurani', 'biaya_mqtahfidz', 'biaya_mksni', 'biaya_mqtahsin', 'biaya_uks', 'biaya_lemari', 'biaya_ujianmd', 'biaya_makan'];

    // Calculate total amount
    $totalAmount = 0;
    foreach ($biayaColumns as $column) {
        $biayaQuery = "SELECT $column FROM transaksi_detail WHERE id_transaksi_detail = '$violationId'";
        $biayaResult = mysqli_query($connection, $biayaQuery);

        if ($biayaResult) {
            $biayaRow = mysqli_fetch_assoc($biayaResult);
            $totalAmount += $biayaRow[$column];
        }
    }

    // Update transaction status and nominal
    $updateviolationQuery = "UPDATE transaksi SET status_transaksi='3', nominal='$totalAmount' WHERE id_transaksi = $violationId";
    mysqli_query($connection, $updateviolationQuery);

    mysqli_close($connection);

    // Redirect back to transaksi.php
    header("Location: transaksi.php");
    exit();
}
