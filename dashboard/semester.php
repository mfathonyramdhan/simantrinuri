<?php
$pageTitle = "Semester";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Function to delete the violation and violation
function deleteviolation($dettransId, $connection)
{
    // Delete violation
    $deletetransdetQuery = "DELETE FROM transaksi_detail WHERE id_transaksi_detail = $dettransId";
    mysqli_query($connection, $deletetransdetQuery);
}

// Check if the delete button is clicked
if (isset($_POST['delete_transaksi'])) {
    $dettransId = $_POST['transaksi_detail_id'];

    // Validate violation ID
    if (!empty($dettransId)) {
        // Delete the violation and violation
        deleteviolation($dettransId, $connection);
    } else {
        echo "<script>alert('ID Detail Transaksi');</script>";
    }
}

?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2><?php echo $pageTitle; ?></h2>
                        <a type="button" href="semester_tambah.php" class="btn btn-rounded btn-primary">+ Tambah Semester</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Pelajaran</th>

                                        <th>Semester</th>
                                        <th>File Rincian Tagihan</th>

                                        <th>Aksi</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the violation table
                                    $query = "SELECT * FROM transaksi_detail";

                                    $result = mysqli_query($connection, $query);

                                    // Check if any rows are found
                                    if (mysqli_num_rows($result) > 0) {
                                        // Counter variable for numbering the rows
                                        $counter = 1;

                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td><?php echo $row['tahun_pelajaran']; ?></td>

                                                <td><?php echo $row['semester']; ?></td>

                                                <td>
                                                    <a href="frtpdf/frtTapel<?php $tapel = $row['tahun_pelajaran'];
                                                                            $tapelc = str_replace(['/', '20'], '', $tapel);
                                                                            echo $tapelc;  ?>Sems<?php echo $row['semester']; ?>.pdf" class="btn btn-primary shadow sharp me-1">
                                                        <i class="fa fa-download"></i>
                                                </td>
                                                </a>
                                                <td>
                                                    <div class="d-flex">

                                                        <a href="semester_update.php?id=<?php echo $row['id_transaksi_detail']; ?>" class="btn btn-primary shadow sharp me-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>

                                                        <form method="post" action="">
                                                            <input type="hidden" name="transaksi_detail_id" value="<?php echo $row['id_transaksi_detail']; ?>">
                                                            <button type="submit" name="delete_transaksi" class="btn btn-danger shadow  sharp me-1" onclick="return confirm('Anda yakin ingin menghapus data semester ini ?');">
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
                                            <td colspan="4" class="text-center">Belum ada data semester.</td>
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
                                        <th>Tahun Pelajaran</th>

                                        <th>Semester</th>
                                        <th>File Rincian Tagihan</th>

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