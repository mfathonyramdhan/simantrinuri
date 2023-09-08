<?php
$pageTitle = "Tambah Kelas";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2><?php echo $pageTitle; ?></h2>
            </div>
            <div class="card-body">
                <form method="POST" action="kelas_tambah_process.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Kelas" required>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Kelas</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>