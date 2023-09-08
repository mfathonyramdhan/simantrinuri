<?php
$pageTitle = "Edit Petugas";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


// Check if the teacher ID is provided in the URL
if (isset($_GET['id'])) {
    $teacherId = $_GET['id'];

    // Retrieve the teacher data from the database
    $query = "SELECT * FROM petugas WHERE id_petugas = $teacherId";
    $result = mysqli_query($connection, $query);

    // Check if the teacher exists
    if (mysqli_num_rows($result) > 0) {
        $teacher = mysqli_fetch_assoc($result);


?>

        <!-- Add your HTML form for editing teacher information -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2> <?php echo $pageTitle; ?></h2>
                            </div>
                            <div class="card-body">
                                <form method="post" action="petugas_update_process.php">
                                    <input type="hidden" name="petugas_id" value="<?php echo $teacher['id_petugas']; ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $teacher['nama']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" value="<?php echo $teacher['keterangan']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_teacher" class="btn btn-primary">Update</button>
                                        <a href="petugas.php" class="btn btn-secondary">Cancel</a>
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
        echo "teacher not found.";
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    echo "Invalid teacher ID.";
}

include 'template/footer.php';
?>