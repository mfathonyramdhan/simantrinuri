<?php
$pageTitle = "Update Potongan";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Get the discount ID from the URL parameter
if (isset($_GET['id'])) {
    $discountId = $_GET['id'];

    // Retrieve the discount data
    $query = "SELECT * FROM diskon WHERE diskon_id = $discountId";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('ID Diskon tidak valid.'); window.location='potongan.php';</script>";
}
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2> Update Potongan</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="potongan_update_process.php">
                            <input type="hidden" name="discount_id" value="<?php echo $discountId; ?>">
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $row['diskon_deskripsi']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="persentase" class="form-label">Persentase Potongan (%)</label>
                                <input type="number" class="form-control" id="persentase" name="persentase" value="<?php echo $row['diskon_persentase']; ?>" min="1" max="100" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Potongan</button>
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