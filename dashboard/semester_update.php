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
                                <form method="post" action="semester_update_process.php">
                                    <input type="hidden" name="id_transaksi_detail" value="<?php echo $row['id_transaksi_detail']; ?>">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label">Tahun Pelajaran</label>
                                            <input type="text" class="form-control" name="tapel" value="<?php echo $row['tahun_pelajaran']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="semester" class="form-label">Semester</label>
                                                <select class="form-select" id="semester" name="semester" placeholder="Pilih Semester">
                                                    <option value="1" <?php if ($row['semester'] == 1) {
                                                                            echo 'selected';
                                                                        } ?>>Semester 1</option>
                                                    <option value="2" <?php if ($row['semester'] == 2) {
                                                                            echo 'selected';
                                                                        } ?>>Semester 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="biaya_listrik" class="form-label">1. Biaya Listrik</label>
                                                <input type="text" class="form-control" id="biaya" name="biaya_listrik" placeholder="Masukkan Biaya listrik" value="<?php echo $row['biaya_listrik']; ?>">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="biaya_asrama" class="form-label">2. Biaya Asrama</label>
                                                <input type="text" class="form-control" id="biaya" name="biaya_asrama" placeholder="Masukkan Biaya Asrama" value="<?php echo $row['biaya_asrama']; ?>">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="biaya_pesantren" class="form-label">3. Biaya Pesantren</label>
                                                <input type="text" class="form-control" id="biaya" name="biaya_pesantren" placeholder="Masukkan Biaya Pesantren" value="<?php echo $row['biaya_pesantren']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ... Previous code ... -->

                                    <div class="row">
                                        <div class="col">

                                            <div class="mb-3">
                                                <label for="biaya_madin" class="form-label">4. Biaya Madin</label>
                                                <input type="text" class="form-control" id="biaya" name="biaya_madin" placeholder="Masukkan Biaya Madin" value="<?php echo $row['biaya_madin']; ?>">
                                            </div>
                                        </div>

                                        <div class="col">

                                            <div class="mb-3">
                                                <label for="biaya_mqqurani" class="form-label">5. Biaya MQ Qur'ani</label>
                                                <input type="text" class="form-control" id="biaya" name="biaya_mqqurani" placeholder="Masukkan Biaya MQ Qur'ani" value="<?php echo $row['biaya_mqqurani']; ?>">
                                            </div>
                                        </div>

                                        <div class="col">

                                            <div class="mb-3">
                                                <label for="biaya_mqtahfidz" class="form-label">6. Biaya MQ Tahfidz</label>
                                                <input type="text" class="form-control" id="biaya" name="biaya_mqtahfidz" placeholder="Masukkan Biaya MQ Tahfidz" value="<?php echo $row['biaya_mqtahfidz']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">

                                            <div class="mb-3">
                                                <label for="biaya_mksni" class="form-label">7. Biaya MKS NI</label>
                                                <input type="text" class="form-control" id="biaya" name="biaya_mksni" placeholder="Masukkan Biaya MKS NI" value="<?php echo $row['biaya_mksni']; ?>">
                                            </div>
                                        </div>

                                        <div class="col">

                                            <div class="mb-3">
                                                <label for="biaya_mqtahsin" class="form-label">8. Biaya MQ Tahsin</label>
                                                <input type="text" class="form-control" id="biaya" name="biaya_mqtahsin" placeholder="Masukkan Biaya MQ Tahsin" value="<?php echo $row['biaya_mqtahsin']; ?>">
                                            </div>
                                        </div>

                                        <div class="col">

                                            <div class="mb-3">
                                                <label for="biaya_uks" class="form-label">9. Biaya UKS</label>
                                                <input type="text" class="form-control" id="biaya" name="biaya_uks" placeholder="Masukkan Biaya UKS" value="<?php echo $row['biaya_uks']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ... Remaining code ... -->
                                    <div class="row">
                                        <div class="col">

                                            <div class="mb-3">
                                                <label for="biaya_lemari" class="form-label">10. Biaya Pemeliharaan Lemari</label>
                                                <input type="text" class="form-control" id="biaya" name="biaya_lemari" placeholder="Masukkan Biaya Pemeliharaan Lemari" value="<?php echo $row['biaya_lemari']; ?>">
                                            </div>
                                        </div>

                                        <div class="col">

                                            <div class="mb-3">
                                                <label for="biaya_ujianmd" class="form-label">11. Biaya Ujian MD</label>
                                                <input type="text" class="form-control" id="biaya" name="biaya_ujianmd" placeholder="Masukkan Biaya Ujian MD" value="<?php echo $row['biaya_ujianmd']; ?>">
                                            </div>
                                        </div>

                                        <div class="col">

                                            <div class="mb-3">
                                                <label for="biaya_makan" class="form-label">12. Biaya Makan</label>
                                                <input type="text" class="form-control" id="biaya" name="biaya_makan" placeholder="Masukkan Biaya Makan" value="<?php echo $row['biaya_makan']; ?>">
                                            </div>
                                        </div>
                                    </div>


                            </div>


                            <div class="mb-3">
                                <button type="submit" name="update_semester" class="btn btn-primary">Update</button>
                                <a href="semester.php" class="btn btn-secondary">Cancel</a>
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