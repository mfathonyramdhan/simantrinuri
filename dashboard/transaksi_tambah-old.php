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
                                        <select class="form-control shadow" id="id_santri" name="id_santri">
                                            <?php while ($transaction = mysqli_fetch_assoc($queryResult)) : ?>
                                                <option value="<?php echo $transaction['id_santri']; ?>"><?php echo $transaction['nama']; ?></option>
                                            <?php endwhile; ?>

                                        </select>
                                    </div>

                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="id_transaksi_detail">Pilih Semester</label>
                                        <select class="form-control shadow" id="id_transaksi_detail" name="id_transaksi_detail">
                                            <option value="" selected disabled>Pilih Semester</option>

                                            <?php while ($tr = mysqli_fetch_assoc($queryResult3)) : ?>
                                                <option value="<?php echo $tr['id_transaksi_detail']; ?>"><?php echo 'Sems. ', $tr['semester'], ' - ', 'Tapel ', $tr['tahun_pelajaran']; ?></option>
                                            <?php endwhile; ?>

                                        </select>
                                    </div>

                                </div>


                            </div>






                            <div class="row mx-4">

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="biaya_listrik" class="form-label">
                                                <input type="checkbox" name="biaya_listrik" value="1">
                                                1. Biaya Listrik : &nbsp; <span> </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="biaya_asrama" class="form-label">
                                                <input type="checkbox" name="biaya_asrama" value="1">
                                                2. Biaya Asrama : &nbsp;<span> </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="biaya_pesantren" class="form-label">
                                                <input type="checkbox" name="biaya_pesantren" value="1">
                                                3. Biaya Pesantren : &nbsp;<span> </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="biaya_madin" class="form-label">
                                                <input type="checkbox" name="biaya_madin" value="1">
                                                4. Biaya Madin : &nbsp; <span> </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="biaya_mqqurani" class="form-label">
                                                <input type="checkbox" name="biaya_mqqurani" value="1">
                                                5. Biaya MQ Qur'ani : &nbsp;<span> </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="biaya_mqtahfidz" class="form-label">
                                                <input type="checkbox" name="biaya_mqtahfidz" value="1">
                                                6. Biaya MQ Tahfidz : &nbsp;<span> </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="biaya_mksni" class="form-label">
                                                <input type="checkbox" name="biaya_mksni" value="1">
                                                7. Biaya MKS NI : &nbsp; <span> </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="biaya_mqtahsin" class="form-label">
                                                <input type="checkbox" name="biaya_mqtahsin" value="1">
                                                8. Biaya MQ Tahsin : &nbsp;<span> </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="biaya_uks" class="form-label">
                                                <input type="checkbox" name="biaya_uks" value="1">
                                                9. Biaya UKS : &nbsp;<span> </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="biaya_lemari" class="form-label">
                                                <input type="checkbox" name="biaya_lemari" value="1">
                                                10. Biaya Pemeliharaan Lemari : &nbsp; <span> </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="biaya_ujianmd" class="form-label">
                                                <input type="checkbox" name="biaya_ujianmd" value="1">
                                                11. Biaya Ujian MD : &nbsp;<span> </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="biaya_makan" class="form-label">
                                                <input type="checkbox" name="biaya_makan" value="1">
                                                12. Biaya Makan : &nbsp;<span> </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="id_diskon">Pilih Potongan</label>
                                    <select class="form-control shadow" id="id_diskon" name="id_diskon">
                                        <option value="1" selected disabled>Pilih Potongan</option>

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
                                <h3>Total: <span id="totalAmount">0</span></h3>

                            </div>



                            <button type="submit" class="btn btn-primary">✓ Tambah Transaksi Manual</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#id_transaksi_detail').on('change', function() {
            var selectedId = $(this).val();
            $.ajax({
                url: 'get_biaya.php', // Update with the correct URL
                method: 'GET',
                data: {
                    id_transaksi_detail: selectedId
                },
                dataType: 'json',
                success: function(response) {
                    for (var i = 1; i <= 12; i++) {
                        var checkboxName = 'biaya_' + getCheckboxName(i);
                        $('label[for=' + checkboxName + '] span').text(response[checkboxName]);
                    }
                    calculateTotal();
                },
                error: function() {
                    console.error('Error fetching biaya values.');
                }
            });
        });

        $('#id_diskon').on('change', function() {
            calculateTotal();
        });

        function calculateTotal() {
            var total = 0;
            for (var i = 1; i <= 12; i++) {
                var checkboxName = 'biaya_' + getCheckboxName(i);
                if ($("input[name='" + checkboxName + "']").is(":checked")) {
                    total += parseFloat($('label[for="' + checkboxName + '"] span').text());
                }
            }

            // Calculate discounted total based on selected discount percentage
            var selectedDiscount = parseFloat($('#id_diskon option:selected').data('percentage'));
            var discountedTotal = total - (total * (selectedDiscount / 100));

            $("#totalAmount").text(discountedTotal.toFixed(2)); // Display total with 2 decimal places
        }

        function getCheckboxName(number) {
            var names = [
                'listrik', 'asrama', 'pesantren', 'madin', 'mqqurani',
                'mqtahfidz', 'mksni', 'mqtahsin', 'uks', 'lemari',
                'ujianmd', 'makan'
            ];
            return names[number - 1];
        }
    });
</script>






<?php
include 'template/footer.php';
?>