<?php
$pageTitle = "Tambah Santri";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Retrieve data from the class table
$query = "SELECT * FROM kelas";
$result = mysqli_query($connection, $query);
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2><?php echo $pageTitle; ?></h2>
            </div>
            <div class="card-body">
                <form method="POST" action="siswa_tambah_process.php">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Santri" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>



                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="number" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" maxlength="10" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>


                        </div>

                        <div class="col">


                            <div class="mb-3">
                                <label for="namawali" class="form-label">Nama Wali</label>
                                <input type="text" class="form-control" id="namawali" name="namawali" placeholder="Masukkan Nama Wali Santri" required>
                            </div>

                            <div class="mb-3">
                                <label for="nohpwali" class="form-label">No. HP Wali</label>
                                <input type="text" class="form-control" id="nohpwali" name="nohpwali" placeholder="Masukkan No. HP Wali Santri" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_kelas" class="form-label">Kelas</label>
                                <select class="form-select" id="id_kelas" name="id_kelas" required>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['id_kelas'] . '">' . $row['nama'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Santri</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>