<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    $idClass = $_POST['id_kelas'];
    $namawali = $_POST['namawali'];
    $nohpwali = $_POST['nohpwali'];



    // Hash the password

    // Perform the insert operation to add a new student
    $query = "INSERT INTO santri (nama, id_kelas, nama_wali, nohp_wali) VALUES ('$name',  '$idClass', '$namawali', '$nohpwali')";
    $result = mysqli_query($connection, $query);

    // Close the database connection
    mysqli_close($connection);

    // Redirect back to the students page with the toast notification parameters in the URL
    header("Location: siswa.php");
    exit();
}
