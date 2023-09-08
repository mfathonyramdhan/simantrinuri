<?php
$pageTitle = "Potongan";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';




// Function to delete the admin and parents
function deleteadmin($adminId, $connection)
{
    // Delete admin
    $deleteadminQuery = "DELETE FROM diskon WHERE diskon_id = $adminId";
    mysqli_query($connection, $deleteadminQuery);
}

// Check if the delete button is clicked
if (isset($_POST['delete_admin'])) {
    $adminId = $_POST['admin_id'];

    // Validate admin ID
    if (!empty($adminId)) {
        // Delete the admin and parents
        deleteadmin($adminId, $connection);
    } else {
        echo "<script>alert('ID Diskon Salah');</script>";
    }
}

?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2> <?php echo $pageTitle; ?></h2> <a type="button" href="potongan_tambah.php" class="btn btn-rounded btn-primary">+ Tambah Potongan</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Persentase Potongan</th>
                                        <th>Aksi</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the admin table
                                    $query = "SELECT * FROM diskon WHERE diskon_id != 1";
                                    $result = mysqli_query($connection, $query);

                                    // Check if any rows are found
                                    if (mysqli_num_rows($result) > 0) {
                                        // Counter variable for numbering the rows
                                        $counter = 1;

                                        // Fetch each row and display the data 
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td><?php echo $row['diskon_deskripsi']; ?></td>
                                                <td><?php echo $row['diskon_persentase']; ?>%</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="potongan_update.php?id=<?php echo $row['diskon_id']; ?>" class="btn btn-primary shadow btn-xs sharp me-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form method="post" action="">
                                                            <input type="hidden" name="admin_id" value="<?php echo $row['diskon_id']; ?>">
                                                            <button type="submit" name="delete_admin" class="btn btn-danger shadow btn-xs sharp 
                                                        " onclick="return confirm('Yakin untuk menghapus data potongan ini ?');">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        // No data found
                                        ?>
                                        <tr>
                                            <td colspan="4">Data tidak ditemukan.</td>
                                        </tr>
                                    <?php
                                    }

                                    // Close the database connection
                                    mysqli_close($connection);
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Persentase Potongan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>