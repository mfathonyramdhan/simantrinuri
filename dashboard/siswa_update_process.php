<?php
include '../connection.php';

if (isset($_POST['update_student'])) {
    $name = $_POST['name'];

    $idClass = $_POST['id_kelas'];
    $namawali = $_POST['namawali'];
    $nohpwali = $_POST['nohpwali'];
    $studentId = $_POST['student_id'];


    $query = "UPDATE santri SET nama='$name',  id_kelas='$idClass', nama_wali='$namawali', nohp_wali='$nohpwali' WHERE id_santri='$studentId'";


    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect back to the students page with a success message
        header("Location: siswa.php");
        exit();
    } else {
        echo "error";
        // Redirect back to the students page with an error message
        header("Location: siswa.php");
        exit();
    }
}

// Close the database connection
mysqli_close($connection);
