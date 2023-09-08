<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_santri = $_POST['id_santri'];
    $id_transaksi_detail = $_POST['id_transaksi_detail'];
    $id_diskon = $_POST['id_diskon'];

    // Generate a random id_order (you can adjust the range as needed)
    // Generate a random combination of two letters and four digits (e.g., AA0000)
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random_letters = substr(str_shuffle($letters), 0, 2);
    $random_digits = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
    $id_order = $random_letters . $random_digits;

    // Set the status_transaksi to 1

    // Initialize an array to store checkbox values
    $checkboxValues = [];

    for ($i = 1; $i <= 12; $i++) {
        $checkboxName = 'biaya_' . getCheckboxName($i);
        $checkboxValue = isset($_POST[$checkboxName]) ? 1 : 0;
        $checkboxValues[$checkboxName] = $checkboxValue;
    }

    $totalAmount = calculateTotal($checkboxValues, $id_diskon, $id_transaksi_detail);

    // Initialize a flag to keep track of whether all checkboxes are 1
    $allBiayaChecked = true;

    // Loop through the checkbox values
    foreach ($checkboxValues as $biayaValue) {
        if ($biayaValue !== 1) {
            $allBiayaChecked = false;
            break; // No need to continue checking if one checkbox is not 1
        }
    }

    // Set the status_transaksi based on the flag
    $status_transaksi = $allBiayaChecked ? 3 : 1;

    // Construct the query manually
    $query = "INSERT INTO transaksi (id_order, id_santri, id_transaksi_detail, id_diskon, status_transaksi, nominal, ";
    $columns = array_keys($checkboxValues);
    $query .= implode(", ", $columns);
    $query .= ") VALUES ('$id_order', '$id_santri', '$id_transaksi_detail', '$id_diskon', '$status_transaksi', $totalAmount, ";
    $values = array_values($checkboxValues);
    $query .= implode(", ", $values);
    $query .= ")";

    if (mysqli_query($connection, $query)) {
        header("Location: transaksi_tambah_sendwa.php?id=$id_order");
        exit();
    } else {
        echo "Error adding transaction: " . mysqli_error($connection);
    }
}

function calculateTotal($checkboxValues, $id_diskon, $id_transaksi_detail)
{
    global $connection;

    $total = 0;
    foreach ($checkboxValues as $biaya => $value) {
        if ($value) {
            $biayaQuery = "SELECT $biaya FROM transaksi_detail WHERE id_transaksi_detail = '$id_transaksi_detail'";
            $biayaResult = mysqli_query($connection, $biayaQuery);

            if ($biayaResult) {
                $biayaRow = mysqli_fetch_assoc($biayaResult);
                $total += $biayaRow[$biaya];
            }
        }
    }

    $diskonQuery = "SELECT diskon_persentase FROM diskon WHERE diskon_id = '$id_diskon'";
    $diskonResult = mysqli_query($connection, $diskonQuery);

    if ($diskonResult) {
        $diskonRow = mysqli_fetch_assoc($diskonResult);
        $selectedDiscount = $diskonRow['diskon_persentase'];
        $discountedTotal = $total - ($total * ($selectedDiscount / 100));
        return $discountedTotal;
    }

    return $total;
}

function getCheckboxName($number)
{
    $names = [
        'listrik', 'asrama', 'pesantren', 'madin', 'mqqurani',
        'mqtahfidz', 'mksni', 'mqtahsin', 'uks', 'lemari',
        'ujianmd', 'makan'
    ];
    return $names[$number - 1];
}
