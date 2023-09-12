<?php
$pageTitle = "Tambah Cicilan";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT t.*, s.nama AS nama_santri, k.nama AS nama_kelas, d.diskon_persentase AS dp
    FROM transaksi t
    JOIN santri s ON t.nisn_santri = s.nisn
    JOIN kelas k ON s.id_kelas = k.id_kelas
    JOIN diskon d ON d.diskon_id = t.id_diskon WHERE id_order = '$id'";


    $result = mysqli_query($connection, $query);
}

// Check if the teacher exists
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id_order = $row['id_order'];
    $tapelpdf = substr($id_order, 0, 4);
    $semspdf = substr($id_order, 4, 1);
    $first_four = substr($id_order, 0, 4);

    // Extract the 5th character
    $semester = substr($id_order, 4, 1);

    // Add "20" to the first two digits
    $first_two = "20" . substr($first_four, 0, 2);

    // Add "20" to the third and fourth digits
    $third_fourth = "20" . substr($first_four, 2, 2);

    // Convert the first two characters to the academic year format
    $tapelc = $first_two . '/' . $third_fourth;

    $tagihan = $row['tagihan'] - ($row['tagihan'] * ($row['dp'] / 100));
    $total = $row['terbayar'];
?>

    <div class="content-body">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h2><?php echo $pageTitle; ?></h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="transaksi_update_process.php" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" class="form-control" id="id_order" name="id_order" value="<?php echo $row['id_order']; ?>">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama_santri" class="form-label">Nama Santri</label>
                                    <input type="text" class="form-control" id="nama_santri" name="nama_santri" value="<?php echo $row['nama_santri']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="id_order2" class="form-label">ID Transaksi</label>
                                    <input type="text" class="form-control" id="id_order2" name="id_order2" value="<?php echo $row['id_order']; ?>" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col">
                                <div class="alert alert-primary" role="alert">
                                    Potongan : <strong><span>
                                            <?php if ($row['id_diskon'] == 1) {
                                                echo '-';
                                            } else {
                                                echo $row['dp'] . '%';
                                            } ?>
                                        </span></strong>
                                </div>
                            </div>
                            <div class="col">
                                <div class="alert alert-primary" role="alert">
                                    Tapel / Semester : <strong><span>
                                            <?php echo $tapelc . ' Semester ' . $semester; ?>
                                        </span></strong>
                                </div>
                            </div>

                            <!-- <div class="col">
                                <div class="alert alert-primary" role="alert">
                                    Terakhir bayar : <strong><span>
                                            <?php

                                            if ($row['terbayar'] == 0) {
                                                echo '-';
                                            } else {

                                                echo $row['tanggal_transaksi'];
                                            } ?>
                                        </span></strong>
                                </div>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger" role="alert">
                                    Tagihan yang harus dibayar 1 Semester: <strong><span>
                                            <?php echo 'Rp. ' . number_format(($tagihan),
                                                0,
                                                ',',
                                                '.'
                                            ); ?>
                                        </span></strong>
                                </div>
                            </div>

                            <div class="col">
                                <div class="alert alert-success" role="alert">
                                    Tagihan yang sudah dibayar selama 1 semester: <strong><span>
                                            <?php echo 'Rp. ' . number_format(($row['terbayar']),
                                                0,
                                                ',',
                                                '.'
                                            ); ?>
                                        </span></strong>
                                </div>
                            </div>

                            <div class="col">
                                <div class="alert alert-danger" role="alert">
                                    Sisa Tagihan : <strong><span>
                                            <?php $tr = $row['terbayar'];

                                            $print = $tagihan - $tr;
                                            echo 'Rp. ' . number_format($print, 0, ',', '.'); ?>
                                        </span></strong>
                                </div>
                            </div>








                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger" role="alert">
                                    Tagihan yang harus dibayar tiap bulan: <strong><span>
                                            <?php echo 'Rp. ' . number_format(($tagihan / 6),
                                                0,
                                                ',',
                                                '.'
                                            ); ?>
                                        </span></strong>
                                </div>
                            </div>
                            <!-- <div class="col">
                                <div class="alert alert-danger" role="alert">
                                    Sisa Tagihan bulan ini : <strong><span>
                                            <?php echo 'Rp. ' . number_format(($tagihan / 6),
                                                0,
                                                ',',
                                                '.'
                                            ); ?>
                                        </span></strong>
                                </div>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="bayar" class="form-label">Nominal Cicilan</label>
                                <input type="number" min="100000" class="form-control" name="bayar" placeholder="Masukkan nominal, minimal Rp. 100.000">
                            </div>
                        </div>





                </div>
                <button type="submit" class="btn btn-primary" style="margin-right: 20px; margin-left: 20px; margin-bottom: 20px;">Tambah Cicilan</button>
                <div class="row" style="margin-right: 20px; margin-left: 20px; margin-bottom: 20px;">
                    <div class="col">
                        <h4 style="margin-left: 20px;">> Riwayat Cicilan Pembayaran <strong><span>
                                    <?php echo 'Tahun Pelajaran ' . $tapelc . ' Semester ' . $semester; ?>
                                </span></strong></h4>




                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                    <th scope="col">Jumlah Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                $historiQuery = "SELECT t.* FROM transaksi_histori t WHERE id_order = '$id' ORDER BY tanggal DESC";
                                $historiQueryr = mysqli_query($connection, $historiQuery);
                                if (mysqli_num_rows($historiQueryr) > 0) {
                                    $counter = 1;


                                    while ($hq = mysqli_fetch_assoc($historiQueryr)) {
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $counter++; ?></th>
                                            <td><?php echo date('d F Y / H:i', strtotime($hq['tanggal'])); ?></td>
                                            <td><?php
                                                echo 'Rp. ' . number_format(($hq['terbayar']),
                                                    0,
                                                    ',',
                                                    '.'
                                                );
                                                ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <th scope="row"></th>
                                    <td class="table-success"><strong> Total :</strong> </td>
                                    <td class="table-success"><strong> <?php echo 'Rp. ' . number_format(
                                                                            $total,
                                                                            0,
                                                                            ',',
                                                                            '.'
                                                                        ); ?></strong> </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                    <th scope="col">Jumlah Bayar</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <h3 style="margin-left: 20px;">> Rincian Tagihan <strong><span>
                                    <?php echo 'Tahun Pelajaran ' . $tapelc . ' Semester ' . $semester; ?>
                                </span></strong></h3>

                        <div id="pdf-viewer">
                            <!-- PDF.js viewer container -->
                        </div>
                    </div>

                </div>





                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
    <script>
        // PDF.js configuration
        const pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.worker.min.js';

        const tapel = "<?php echo $tapelpdf; ?>";
        const sems = "<?php echo $semspdf; ?>";
        const pdfFileName = `frtpdf/frtTapel${tapel}Sems${sems}.pdf`;
        // Initialize the PDF viewer
        pdfjsLib.getDocument(pdfFileName).promise.then(function(pdf) {
            // Get the first page of the PDF
            return pdf.getPage(1);
        }).then(function(page) {
            // Create a canvas element to render the PDF page
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            const viewport = page.getViewport({
                scale: 1.5
            });

            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Append the canvas to the viewer container
            document.getElementById('pdf-viewer').appendChild(canvas);

            // Render the PDF page on the canvas
            page.render({
                canvasContext: context,
                viewport: viewport
            });
        });
    </script>
    </div>

<?php
} else {
    echo "Transaksi tidak ditemukan.";
}

// Close the database connection
mysqli_close($connection);


include 'template/footer.php';
?>