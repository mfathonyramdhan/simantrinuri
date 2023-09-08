<?php
include '../connection.php';

if (isset($_POST['update_teacher'])) {
    $petugasId = $_POST['petugas_id'];
    $name = $_POST['name'];
    $ket = $_POST['keterangan'];



    // Update the teacher record without changing the password
    $query = "UPDATE petugas SET nama='$name', keterangan='$ket' WHERE id_petugas='$petugasId'";


    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect back to the teachers page with a success message
        header("Location: petugas.php");
        exit();
    } else {
        echo "error";
        // Redirect back to the teachers page with an error message
        header("Location: petugas.php");
        exit();
    }
}

// Close the database connection
mysqli_close($connection);
