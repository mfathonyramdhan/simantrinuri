<?php
$pageTitle = "Data Potongan SPP Santri";
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
                        <h2> <?php echo $pageTitle; ?></h2> <a type="button" href="potongan_s_tambah.php" class="btn btn-rounded btn-primary">+ Tambah Potongan SPP Santri</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Order</th>
                                        <th>Nama</th>
                                        <th>Persentase Diskon</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the admin table
                                    $query = "SELECT * FROM transaksi t JOIN diskon d ON t.id_diskon = d.diskon_id  JOIN santri s ON t.nisn_santri = s.nisn WHERE id_diskon != 1";
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
                                                <td><?php echo $row['id_order']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>

                                                <td><?php echo $row['diskon_persentase']; ?>%</td>

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
                                        <th>ID Order</th>
                                        <th>Nama</th>
                                        <th>Persentase Diskon</th>

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