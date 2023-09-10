<?php
$pageTitle = "Tambah Cicilan";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


$query = "SELECT t.*, s.nama AS nama_santri, k.nama AS nama_kelas
    FROM transaksi t
    JOIN santri s ON t.nisn_santri = s.nisn
    JOIN kelas k ON s.id_kelas = k.id_kelas
    JOIN diskon d ON d.diskon_id = t.id_diskon";



$result = mysqli_query($connection, $query);

// Check if the teacher exists
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

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
                            <input type="hidden" class="form-control" id="id_transaksi" name="id_transaksi" value="<?php echo $row['id_transaksi']; ?>">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama_santri" class="form-label">Nama Santri</label>
                                    <input type="text" class="form-control" id="nama_santri" name="nama_santri" value="<?php echo $row['nama_santri']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="id_order" class="form-label">ID Transaksi</label>
                                    <input type="text" class="form-control" id="id_order" name="id_order" value="<?php echo $row['id_order']; ?>" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="alert alert-danger" role="alert">
                                        Tagihan yang harus dibayar 1 Semester: <strong><span>
                                                <?php echo $row['terbayar']; ?>
                                            </span></strong>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="alert alert-danger" role="alert">
                                        Tagihan yang harus dibayar tiap bulan: <strong><span>
                                                <?php echo $row['tagihan']; ?>
                                            </span></strong>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="alert alert-danger" role="alert">
                                        Sisa Tagihan : <strong><span>
                                                <?php $tr = $row['tagihan'];
                                                $tg = $row['tagihan'];
                                                $print = $tg - $tr;
                                                echo $print; ?>
                                            </span></strong>
                                    </div>
                                </div>




                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="terbayar" class="form-label">Nominal Cicilan</label>
                                    <input type="number" min="100000" class="form-control" name="terbayar" placeholder="Masukkan nominal, minimal Rp. 100.000">
                                </div>
                            </div>



                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Cicilan</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
        <script>
            // PDF.js configuration
            const pdfjsLib = window['pdfjs-dist/build/pdf'];
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.worker.min.js';

            // Initialize the PDF viewer
            pdfjsLib.getDocument('frtpdf/frt.pdf').promise.then(function(pdf) {
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
    echo "Teacher not found.";
}

// Close the database connection
mysqli_close($connection);


include 'template/footer.php';
?>