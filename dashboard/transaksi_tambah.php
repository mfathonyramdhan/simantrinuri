<?php
$pageTitle = "Tambah Transaksi";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


// Retrieve student data from the database
$transactionQuery = "SELECT * FROM santri";
$queryResult = mysqli_query($connection, $transactionQuery);

$transactionQuery4 = "SELECT * FROM transaksi t JOIN santri s ON t.id_santri = s.id_santri";
$queryResult4 = mysqli_query($connection, $transactionQuery4);

$transactionQuery2 = "SELECT COUNT(*) FROM transaksi WHERE status_transaksi != 3";
$queryResult2 = mysqli_query($connection, $transactionQuery2);

$transactionQuery3 = "SELECT * FROM transaksi_detail";
$queryResult3 = mysqli_query($connection, $transactionQuery3);

$transactionQuery5 = "SELECT * FROM diskon";
$queryResult5 = mysqli_query($connection, $transactionQuery5);

// Fetch the result
$row = mysqli_fetch_array($queryResult2);
$countStatusNot3 = $row[0];

?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2><?php echo $pageTitle; ?></h2>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="transaksi_tambah_process.php">

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="id_santri">Pilih Santri</label>
                                        <select class="form-control selectpicker" id="id_santri" name="id_santri" data-live-search="true">
                                            <?php while ($transaction = mysqli_fetch_assoc($queryResult)) : ?>
                                                <option value="<?php echo $transaction['id_santri']; ?>">
                                                    <?php echo $transaction['nama']; ?> - <?php echo $transaction['nisn']; ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>




                                <div class="col">
                                    <div class="form-group">
                                        <label for="id_transaksi_detail">Pilih Semester</label>
                                        <select class="form-control shadow" id="id_transaksi_detail" name="id_transaksi_detail">

                                            <?php while ($tr = mysqli_fetch_assoc($queryResult3)) : ?>
                                                <option value="<?php echo $tr['id_transaksi_detail']; ?>"><?php echo 'Sems. ', $tr['semester'], ' - ', 'Tapel ', $tr['tahun_pelajaran']; ?></option>
                                            <?php endwhile; ?>

                                        </select>
                                    </div>

                                </div>


                                <div class="col">
                                    <div class="form-group">
                                        <label for="id_diskon">Pilih Potongan</label>
                                        <select class="form-control shadow" id="id_diskon" name="id_diskon">

                                            <option value="1" data-percentage="0">Tanpa Potongan</option>
                                            <?php while ($diskon = mysqli_fetch_assoc($queryResult5)) : ?>
                                                <?php if ($diskon['diskon_id'] != 1) : ?>
                                                    <option value="<?php echo $diskon['diskon_id']; ?>" data-percentage="<?php echo $diskon['diskon_persentase']; ?>">
                                                        <?php echo $diskon['diskon_deskripsi'], '- ', 'Potongan Sebesar ', $diskon['diskon_persentase'], '%'; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        </select>

                                    </div>

                                </div>


                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="alert alert-danger" role="alert">
                                        Tagihan yang harus dibayar 1 Semester: <strong><span id="tagihan-1-semester"></span></strong>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="alert alert-danger" role="alert">
                                        Tagihan yang harus dibayar tiap bulan: <strong><span id="tagihan-tiap-bulan"></span></strong>
                                    </div>
                                </div>
                            </div>
                            <div id="pdf-viewer">
                                <!-- PDF.js viewer container -->
                            </div>




                            <div class="row">
                                <div class="col">
                                    <label for="nominal" class="form-label">Bulan ke : 1</label>
                                    <input type="number" min="100000" class="form-control" name="b1" placeholder="Masukkan nominal, minimal Rp. 100.000">
                                </div>

                                <div class="col">
                                    <label for="nominal" class="form-label">Bulan ke : 2</label>
                                    <input type="number" min="100000" class="form-control" name="b2" placeholder="Masukkan nominal, minimal Rp. 100.000">
                                </div>

                                <div class="col">
                                    <label for="nominal" class="form-label">Bulan ke : 3</label>
                                    <input type="number" min="100000" class="form-control" name="b3" placeholder="Masukkan nominal, minimal Rp. 100.000">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="nominal" class="form-label">Bulan ke : 4</label>
                                    <input type="number" min="100000" class="form-control" name="b4" placeholder="Masukkan nominal, minimal Rp. 100.000">
                                </div>

                                <div class="col">
                                    <label for="nominal" class="form-label">Bulan ke : 5</label>
                                    <input type="number" min="100000" class="form-control" name="b5" placeholder="Masukkan nominal, minimal Rp. 100.000">
                                </div>

                                <div class="col">
                                    <label for="nominal" class="form-label">Bulan ke : 6</label>
                                    <input type="number" min="100000" class="form-control" name="b6" placeholder="Masukkan nominal, minimal Rp. 100.000">
                                </div>
                            </div>





                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">✓ Tambah Transaksi Manual</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
    <script>
        // PDF.js configuration
        const pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.worker.min.js';

        // Initialize the PDF viewer
        pdfjsLib.getDocument('frtpdf/FileRincianTagihanContoh.pdf').promise.then(function(pdf) {
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

    <!-- Add this script before the closing </body> tag -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Function to update the calculation based on user selections
            function updateCalculation() {
                // Get selected values
                var selectedSemester = $("#id_transaksi_detail").val();
                var selectedDiskon = $("#id_diskon").val();

                // Perform AJAX request to get the calculated values
                $.ajax({
                    type: "POST",
                    url: "calculate_tagihan.php", // Replace with the URL of your calculation script
                    data: {
                        semester: selectedSemester,
                        diskon: selectedDiskon
                    },
                    dataType: "json",
                    success: function(response) {
                        // Update the placeholders with calculated values
                        $("#tagihan-1-semester").text("Rp. " + response.tagihan1Semester);
                        $("#tagihan-tiap-bulan").text("Rp. " + response.tagihanTiapBulan);
                    },
                    error: function() {
                        console.log("Error in AJAX request.");
                    }
                });
            }

            // Call the function on initial page load
            updateCalculation();

            // Call the function whenever the user makes selections
            $("#id_transaksi_detail, #id_diskon").change(function() {
                updateCalculation();
            });
        });
    </script>

</div>






<?php
include 'template/footer.php';
?>