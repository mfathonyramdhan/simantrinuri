<?php
$pageTitle = "Tambah Potongan";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deskripsi = $_POST['deskripsi'];
    $persentase = $_POST['persentase'];

    // Insert the new discount into the database
    $insertQuery = "INSERT INTO diskon (diskon_deskripsi, diskon_persentase) VALUES ('$deskripsi', '$persentase')";
    if (mysqli_query($connection, $insertQuery)) {
        echo "<script>alert('Potongan berhasil ditambahkan.'); window.location='potongan.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan potongan.');</script>";
    }
}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2> Tambah Potongan</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                            </div>
                            <div class="mb-3">
                                <label for="persentase" class="form-label">Persentase Potongan (%)</label>
                                <input type="number" class="form-control" id="persentase" name="persentase" min="1" max="100" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Potongan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>