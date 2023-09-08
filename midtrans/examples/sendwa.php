<?php


include 'koneksi.php';

if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

   
    } else {
        echo "No data found for the specified ID.";
    }
} else {
    echo "No ID parameter provided.";
}
