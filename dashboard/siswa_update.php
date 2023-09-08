<?php
$pageTitle = "Edit Siswa";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


// Check if the student ID is provided in the URL
if (isset($_GET['id'])) {
    $studentId = $_GET['id'];

    // Retrieve the student data from the database
    $query = "SELECT * FROM santri WHERE id_santri = $studentId";
    $result = mysqli_query($connection, $query);

    $query2 = "SELECT * FROM kelas";
    $result2 = mysqli_query($connection, $query2);

    // Check if the student exists
    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);


?>

        <!-- Add your HTML form for editing student information -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2> <?php echo $pageTitle; ?></h2>
                            </div>
                            <div class="card-body">
                                <form method="post" action="siswa_update_process.php">
                                    <input type="hidden" name="student_id" value="<?php echo $student['id_santri']; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Santri" value="<?php echo $student['nama']; ?>" required>
                                            </div>



                                        </div>
                                        <div class="col-md-6">


                                            <div class="mb-3">
                                                <label for="namawali" class="form-label">Nama Wali</label>
                                                <input type="text" class="form-control" id="namawali" name="namawali" placeholder="Masukkan Nama Wali Santri" value="<?php echo $student['nama_wali']; ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="nohpwali" class="form-label">No. HP Wali</label>
                                                <input type="text" class="form-control" id="nohpwali" name="nohpwali" placeholder="Masukkan No. HP Wali Santri" value="<?php echo $student['nohp_wali']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="id_kelas" class="form-label">Kelas</label>
                                                <select class="form-select" id="id_kelas" name="id_kelas" required>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($result2)) {
                                                        echo '<option value="' . $row['id_kelas'] . '">' . $row['nama'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary">Update</button>
                                        <a href="siswa.php" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    } else {
        echo "Student not found.";
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    echo "Invalid student ID.";
}

include 'template/footer.php';
?>