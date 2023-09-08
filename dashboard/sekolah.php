<?php
$pageTitle = "PP. Nurul Iman";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';
?>

<div class="row">

    <?php
    // Assuming you have established a database connection

    // Retrieve the sekolah data
    $query = "SELECT * FROM sekolah";
    $result = mysqli_query($connection, $query);

    // Check if any rows are found
    if (mysqli_num_rows($result) < 10) {
        $row = mysqli_fetch_assoc($result);
    ?>

        <div class="container">
            <h2> <?php echo $pageTitle; ?></h2>
            <div class="row" style="margin-top: 50px;">
                <div class="col">
                    <h3> Visi</h3>
                    <p> Mengantarkan masyarakat Islam berpendidikan, berbudaya, berkepribadian, dan berakhlak luhur</p>
                </div>
                <div class="col">
                    <h3> Misi</h3>
                    <p>1. Meningkatkan pendidikan dan pengajaran pada semua unit pendidikan di bawah Yayasan. </br>
                        2. Membina manusia muslim yang taqwa, berbudi luhur, berpengetahuan sempurna, cakap dan terampil serta bertanggung jawab terhadap agama, bangsa dan negara.</br>
                        3. Membendung kebudayaan yang bertentangan dengan Islam atau kepribadian manusia.</br>
                        4. Mengantarkan anak yatim piatu, fakir miskin dan orang jompo menjadi berpendidikan dan bermartabat.
                    </p>
                </div>
            </div>
            <!-- <table class="table">
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>No HP</th>
                    </tr>
                    <tr>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['no_hp']; ?></td>
                    </tr>
                </table> -->
            <!-- <a href="sekolah_update.php" class="btn btn-primary">Update Data</a> -->
        </div>

    <?php
    } else {
        echo '<p>Tidak Ada Data.</p>';
    }

    // Close the database connection
    mysqli_close($connection);
    ?>
</div>

<?php
include 'template/footer.php';
?>