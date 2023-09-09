<?php
$pageTitle = "Edit Semester";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Check if the teacher ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the teacher data from the database
    $query = "SELECT * FROM transaksi_detail WHERE id_transaksi_detail = $id";
    $result = mysqli_query($connection, $query);

    // Check if the teacher exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h2><?php echo $pageTitle; ?></h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="semester_edit_process.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 text-center">
                                        <label for="semester" class="form-label">Semester</label>
                                        <select class="form-select" id="semester" name="semester" placeholder="Pilih Semester">
                                            <option value="1" <?php if ($row['semester'] == '1') echo 'selected'; ?>>Semester 1</option>
                                            <option value="2" <?php if ($row['semester'] == '2') echo 'selected'; ?>>Semester 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="tapel" class="form-label">Tahun Pelajaran</label>
                                        <input type="text" class="form-control" id="tapel" name="tapel" placeholder="Masukkan Tahun Pelajaran" value="<?php echo $row['tahun_pelajaran']; ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="tagihan" class="form-label">Tagihan 1 Semester</label>
                                        <input type="text" class="form-control" id="tagihan" name="tagihan" placeholder="Masukkan Tagihan selama 1 Semester" value="<?php echo $row['tagihan']; ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="pdfFile" class="form-label">Edit File Rincian Tagihan PDF</label>
                                        <input type="file" class="form-control" id="pdfFile" name="pdfFile" accept=".pdf">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $row['id_transaksi_detail']; ?>">
                            <button type="submit" class="btn btn-primary">Edit Semester</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php
    } else {
        echo "Teacher not found.";
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    echo "Invalid teacher ID.";
}

include 'template/footer.php';
?>