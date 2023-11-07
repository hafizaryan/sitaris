<?= $this->extend('layout/main1') ?>
<?= $this->section('content') ?>
<style>
    p {
        color: grey;
    }
</style>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="container">

        <div class="x_panel">
            <div class="x_title">
                <h2>Peminjaman Barang</h2>
                <div class="clearfix"></div>
            </div>
            <div class="panel-heading">
                <h3 class="panel-title" style="text-align: center;"><strong>Ajukan Peminjaman Barang</strong></h3>
            </div><br>
            <form id="myForm" class="form-horizontal form-label-left" method="POST" action="<?= base_url('/peminjaman_barang/tambah') ?>" enctype="multipart/form-data">
                <div id="wizard" class="form_wizard wizard_horizontal">
                    <ul class="wizard_steps anchor">
                        <li>
                            <a href="#step-1" class="selected" isdone="1" rel="1">
                                <span class="step_no">1</span>
                                <span class="step_descr">
                                    Step 1<br>
                                    <small>Step 1 data Peminjam Internal</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2" class="disabled" isdone="0" rel="2">
                                <span class="step_no">2</span>
                                <span class="step_descr">
                                    Step 2<br>
                                    <small>Step 2 daftar barang</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-3" class="disabled" isdone="0" rel="3">
                                <span class="step_no">3</span>
                                <span class="step_descr">
                                    Step 3<br>
                                    <small>Step 3 Data peminjam Barang</small>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div id="step-1" class="content" style="display: block;">
                        <h2>Data Peminjam</h2>
                        <hr>
                        <!-- <input type="text" name="kode" id="kode" hidden> -->
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Organisasi <span style="color: red;">*</span></label>
                            <div class="col-md-6 col-xs-12 control-label">
                                <div class="input-group">
                                    <input type="text" name="organisasi" class="form-control" autofocus required />
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Isi dengan nama organisasi Anda. Contoh: ISNC Research">?</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Peminjam</label>
                            <div class="col-md-6 col-sm-6 ">
                                <div class="input-group">
                                    <input type="text" name="nama_peminjam" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">NIK.KTP</label>
                            <div class="col-md-6 col-sm-6 ">
                                <div class="input-group">
                                    <input type="text" name="NIK" class="form-control" autofocus required minlength="12" maxlength="12" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Email Peminjam <span style="color: red;">*</span></label>
                            <div class="col-md-6 col-xs-12 control-label">
                                <div class="input-group">
                                    <input type="email" name="email_peminjam" class="form-control" autofocus required maxlength="50" />
                                    <!-- <span class="input-group-text">@example.com</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Telepon<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <div class="input-group">
                                    <input type="number" name="no_hp" class="form-control" autofocus required minlength="10" maxlength="14" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="step-2" class="content" style="display: none;">
                        <div class="row">
                            <div class="col-xl-8 col-md-8 col-sm-12" style="height: 710px;">
                                <h2>Daftar Barang yang Tersedia</h2>
                                <hr>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">
                                        <h6>Spesifikasi</h6>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select id="filter" class="form-control">
                                            <option value="">Semua</option>
                                            <option value="i3">Core i3</option>
                                            <option value="i5">Core i5</option>
                                            <option value="i7">Core i7</option>
                                        </select>
                                    </div>
                                </div>
                                <table id="myTable" class="table table-bordered table-striped display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Pilih</th>
                                            <th>Nama Barang</th>
                                            <th>Spesifikasi</th>
                                            <!-- <th>Kategori</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <div class="input-group">
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-12">
                                <h2>Barang yang Dipilih</h2>
                                <table id="tabel2" class="table table-bordered bulk_action">
                                    <thead>
                                        <tr>
                                            <th style="background-color:powderblue;">Nama Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data yang dipilih akan ditambahkan ke sini menggunakan JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <input type="hidden" id="selectedItemsInput" name="selectedItems" value="">
                    </div>
                    <div id="step-3" class="content" style="display: none;">
                        <h2 class="StepTitle text-center">Data Peminjaman Barang</h2>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Rentang Tanggal <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control" oninput="updateCostBasedOnDays()" autofocus required />
                                            <span class="input-group-addon">Sampai</span>
                                            <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control" oninput="updateCostBasedOnDays()" required min="<?php echo date('Y-m-d'); ?>" />

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Jumlah Hari <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <input type="number" name="lama_peminjaman" id="jumlah_hari" class="form-control" oninput="updateCostBasedOnDays()" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Biaya Peminjaman <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <?php foreach ($id_referensi as $referensi) : ?>
                                                <input type="text" readonly value="<?= number_format(floatval($referensi["biaya"]), 0, ',', '.') ?>.- /hari" name="biaya_peminjaman" class="form-control" maxlength="20" autofocus required />
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function updateCostBasedOnDays() {
                                var startDate = new Date(document.getElementById("tanggal_mulai").value);
                                var endDate = new Date(document.getElementById("tanggal_selesai").value);

                                // Calculate the number of days between dates
                                var timeDiff = endDate.getTime() - startDate.getTime();
                                var days = Math.ceil(timeDiff / (1000 * 3600 * 24));

                                // Update the displayed number of days
                                document.getElementById("jumlah_hari").value = days;

                                // Calculate the total cost and update the displayed value
                                calculateCost(days);
                            }
                        </script>

                        <div id="pdfPreview" style="display: none;"></div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Surat Peminjaman <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="file" name="bukti_peminjaman" id="bukti_peminjaman" class="form-control" accept=".pdf" onchange="validateImageFile()" autofocus />
                                            <span class="input-group-addon">
                                                <button type="button" id="previewButton" onclick="showPdfPreview()"><i class="fas fa-eye"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function showPdfPreview() {
                                var fileInput = document.getElementById('bukti_peminjaman');
                                var file = fileInput.files[0];
                                var fileType = file.type;

                                if (fileType.includes('pdf')) {
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        var pdfData = e.target.result;
                                        var newTab = window.open('', '_blank');
                                        newTab.document.open();
                                        newTab.document.write('<embed src="' + pdfData + '" type="application/pdf" width="100%" height="600px" />');
                                        newTab.document.close();
                                    }

                                    reader.readAsDataURL(file);
                                } else {
                                    alert('Format file harus berupa PDF.');
                                }
                            }
                        </script>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Tujuan Peminjaman <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <textarea name="keterangan" id="" cols="30" rows="2" class="form-control" autofocus required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label"></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="checkbox" class="mr-1" id="confirmCheckbox">Saya telah memastikan bahwa data yang akan dikirim sudah benar.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input hidden type="text" name="asal_peminjam" class="form-control" autofocus required value="Eksternal" />
                </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // Fungsi ini akan dieksekusi setelah halaman selesai dimuat
    $(document).ready(function() {
        var table = $('#myTable').DataTable({
            serverside: true,
            ajax: {
                url: '/peminjaman_barang/getData', // Ganti dengan URL endpoint Anda
                type: 'GET',
                dataType: 'json',
                dataSrc: 'dataBarang'
            },
            columns: [{
                    "tittle": "Pilih",
                    data: null,
                    orderable: false,
                    render: function(data) {
                        if (data.status != null) {
                            return '<input type="checkbox" name="barang[]" required class="item-checkbox" value="' + data.id_barang + '">';
                        } else {
                            return '<p class="text-danger"> Not Avalible </p>';

                        }
                    }
                },
                {
                    "tittle": "Nama Barang",
                    data: 'nama_barang'
                },
                {
                    "tittle": "Spesifikasi",
                    data: 'spek_barang'

                },
            ],
            lengthMenu: [
                [10, 15, 50, -1],
                [10, 15, 50, "All"]
            ],
            columnDefs: [{
                'targets': 0,
                'checkboxes': {
                    'selectRow': true
                },
            }],
            select: {
                style: 'multi',
                selector: 'td:first-child'
            },
            order: [
                [1, 'asc']
            ],
        });

        var selectedItems = [];

        $('#myTable tbody').on('change', 'input[type="checkbox"]', function() {
            if (this.checked) {
                // Jika checkbox dicentang, tambahkan nilai ke dalam selectedItems
                selectedItems.push($(this).val());
            } else {
                // Jika checkbox tidak dicentang, cari indeks nilai dalam selectedItems dan hapus
                var index = selectedItems.indexOf($(this).val());
                if (index !== -1) {
                    selectedItems.splice(index, 1);
                }
            }

            // Menggabungkan data menjadi string dengan pemisah tertentu, seperti koma
            var selectedItemsString = selectedItems.join(',');

            // Menyimpan data yang terpilih ke input dengan ID tertentu
            $('#selectedItemsInput').val(selectedItemsString);
        });


        $('#filter').on('change', function() {
            var filterValue = $(this).val();
            $('#myTable').DataTable().search(filterValue).draw();
        });

        $('#myForm').validate({
            rules: {
                id_fakultas: {
                    required: true
                }
            },
            messages: {
                id_fakultas: {
                    required: 'Please Enter Your Faculty'
                }
            },
            rules: {
                "barang[]": {
                    required: true, // Menyatakan bahwa setidaknya satu kotak centang harus dicentang
                },
            },
            messages: {
                "barang[]": {
                    required: "Pilih setidaknya satu pilihan.", // Pesan kesalahan yang ditampilkan jika tidak ada kotak centang yang dicentang
                },
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                if (element.attr("name") == "barang[]") {
                    error.insertBefore("#tabel2"); // Menampilkan pesan kesalahan di atas tabel
                } else {
                    error.insertAfter(element);
                }
                error.addClass("invalid-feedback");
                element.closest(".input-group").append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },

        });

        $('#tanggalPeminjaman, #tanggalPengembalian').on('change', function() {
            var tanggalPeminjaman = $('#tanggalPeminjaman').val();
            var tanggalPengembalian = $('#tanggalPengembalian').val();

            $.ajax({
                url: '/peminjaman_barang/getData',
                type: 'POST', // Metode HTTP yang sesuai dengan server Anda
                dataType: 'json',
                data: {
                    tanggalPeminjaman: tanggalPeminjaman,
                    tanggalPengembalian: tanggalPengembalian
                },
                success: function(data) {
                    // Nonaktifkan semua checkbox terlebih dahulu
                    $('.checkbox').prop('disabled', false);
                    // Loop melalui data peminjaman
                    var data = JSON.parse(data);
                    data.forEach(function(peminjaman) {
                        // Loop melalui array id_barang di setiap peminjaman
                        peminjaman.id_barang.forEach(function(barangId) {
                            // Nonaktifkan checkbox berdasarkan tanggal
                            if (peminjaman.tgl_peminjaman <= tanggalPeminjaman && peminjaman.tgl_engembalian >= tanggalPengembalian) {
                                $('.checkbox[value="' + barangId + '"]').prop('disabled', true);
                            }
                        });
                    });

                    // Re-render DataTables untuk mengupdate status checkbox
                    table.draw();
                }
            });
        });

        var table2 = $('#tabel2').DataTable({
            searching: false,
            lengthChange: false
        });

        $('#myTable tbody').on('change', 'input[type="checkbox"]', function() {
            var rowData = table.row($(this).closest('tr')).data();
            if (this.checked) {
                // Tambahkan data yang tercentang ke tabel kedua
                table2.row.add([rowData.nama_barang]).draw();
            } else {
                // Hapus data yang tidak tercentang dari tabel kedua
                var index = table2.column(0).data().indexOf(rowData.nama_barang);
                if (index !== -1) {
                    table2.row(index).remove().draw();
                }
            }
        });


        // Update "Check All" state when rows are selected/deselected
        table2.on('select deselect', function() {
            var allRowsSelected = table.rows({
                selected: true
            }).count() === table.rows().count();
            $('check-all').prop('checked', allRowsSelected);
        });



        // Ketika elemen dengan ID 'bukti_peminjaman' berubah (file dipilih), fungsi ini akan dijalankan
        $('#bukti_peminjaman').change(function() {
            var file = this.files[0];
            var fileType = file.type;

            // Jika file yang dipilih adalah gambar
            if (fileType.includes('image')) {
                // Buat objek FileReader untuk membaca konten file
                var reader = new FileReader();

                // Ketika pembacaan selesai, tampilkan gambar di elemen dengan ID 'filePreview'
                reader.onload = function(e) {
                    $('#filePreview').html('<img src="' + e.target.result + '" class="img-fluid">');
                }

                // Membaca isi file sebagai URL data (gambar)
                reader.readAsDataURL(file);
            }
            // Jika file yang dipilih adalah PDF
            else if (fileType.includes('pdf')) {
                // Buat objek FileReader untuk membaca konten file
                var reader = new FileReader();

                // Ketika pembacaan selesai, tampilkan PDF di elemen dengan ID 'filePreview'
                reader.onload = function(e) {
                    $('#filePreview').html('<embed src="' + e.target.result + '" type="application/pdf" width="100%" height="600px" />');
                }

                // Membaca isi file sebagai URL data (PDF)
                reader.readAsDataURL(file);
            }
            // Jika format file tidak didukung
            else {
                alert('Format file tidak didukung.');
            }
        });

        var awalanKode = 'PB-'; // Awalan string yang ditentukan
        var panjangAngka = 4; // Panjang Angka
        var kodeOtomatis = generateKode(awalanKode, panjangAngka);
        $('#kode').val(kodeOtomatis);
    });

    // Generate Kode peminjaman
    function generateKode(awalan, panjangAngka) {
        var angkaAcak = Math.floor(Math.random() * Math.pow(10, panjangAngka));
        var kode = awalan + angkaAcak.toString().padStart(panjangAngka, '0');
        return kode;
    }

    // Fungsi untuk memvalidasi apakah checkbox "confirmCheckbox" telah dicentang sebelum mengirimkan data
    function validateForm() {
        var checkbox = document.getElementById("confirmCheckbox");
        if (!checkbox.checked) {
            alert("Mohon Beri Tanda Centang untuk Melanjutkan!");
            return false; // Menghentikan pengiriman data
        }
        return true; // Lanjutkan pengiriman data
    }

    // Fungsi konfirmasi sebelum pergi ke URL tertentu
    function confirm(url) {
        if (confirm("Pastikan data yang anda isi sudah benar?")) {
            window.location.href = url;
        } else {
            return false;
        }
    }

    // Fungsi untuk memvalidasi file gambar yang diunggah
    function validateImageFile() {
        // Mendapatkan elemen input file dengan ID 'bukti_peminjaman'
        const fileInput = document.getElementById('bukti_peminjaman');
        const file = fileInput.files[0];

        // Ekstensi file yang diizinkan adalah PDF
        const allowedExtensions = /(\.pdf)$/i;
        const maxSize = 2 * 1024 * 1024; // Ukuran maksimal 2 MB

        // Validasi ekstensi dan ukuran file
        if (!allowedExtensions.exec(file.name)) {
            alert('File harus berupa file dengan format pdf.');
            fileInput.value = '';
            return false;
        } else if (file.size > maxSize) {
            alert('Ukuran file tidak boleh melebihi 2 MB.');
            fileInput.value = '';
            return false;
        }
        return true;
    }

    // Fungsi untuk memformat angka dengan pemisah ribuan
    function formatNumber() {
        let input = document.getElementById("numberInput");
        let value = input.value.replace(/\D/g, ""); // Menghapus semua karakter non-digit

        // Memformat angka dengan tanda titik sebagai pemisah ribuan
        if (value.length > 3) {
            let formattedValue = "";
            let remainder = value.length % 3; // Menentukan sisa digit pertama
            if (remainder > 0) {
                formattedValue = value.substr(0, remainder) + ".";
            }
            for (let i = remainder; i < value.length; i += 3) {
                formattedValue += value.substr(i, 3) + ".";
            }
            formattedValue = formattedValue.slice(0, -1); // Menghapus titik terakhir
            input.value = formattedValue;
        } else {
            input.value = value;
        }
    }

    // Fungsi untuk menampilkan nilai tanpa format 3-digit pada elemen "result"
    function showRealTimeValue(value) {
        let resultElement = document.getElementById("result");
        resultElement.value = value.replace(/\D/g, ""); // Menampilkan nilai tanpa format 3-digit
    }

    // Mendapatkan elemen input tanggal mulai, tanggal selesai, dan jumlah hari
    const tanggalMulaiInput = document.getElementById('tanggal_mulai');
    const tanggalSelesaiInput = document.getElementById('tanggal_selesai');
    const jumlahHariInput = document.getElementById('jumlah_hari');

    // Menambahkan event listener untuk memperbarui jumlah hari saat tanggal berubah
    tanggalMulaiInput.addEventListener('change', updateJumlahHari);
    tanggalSelesaiInput.addEventListener('change', updateJumlahHari);

    // Fungsi untuk memperbarui jumlah hari berdasarkan tanggal mulai dan tanggal selesai
    function updateJumlahHari() {
        const tanggalMulai = new Date(tanggalMulaiInput.value);
        const tanggalSelesai = new Date(tanggalSelesaiInput.value);

        if (!isNaN(tanggalMulai) && !isNaN(tanggalSelesai)) {
            const timeDiff = Math.abs(tanggalSelesai - tanggalMulai);
            const jumlahHari = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));

            jumlahHariInput.value = jumlahHari;
        }
    }

    // Fungsi untuk mengatur nilai tanggal pada elemen input ke tanggal hari ini
    function setTodayDate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
        const day = String(today.getDate()).padStart(2, '0');

        const formattedDate = `${year}-${month}-${day}`;
        document.getElementById('tanggal_mulai').value = formattedDate;
    }

    // Memanggil fungsi setTodayDate untuk mengatur nilai tanggal pada elemen input
    setTodayDate();
</script>
<!-- Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js?render=6LdFjE8oAAAAAORk5aKHi1UkwcH5UXkIO7gPI0tU"></script>
<script>
    function recaptchaCallback(token) {
        document.getElementById("recaptcha_response").value = token;
    }

    // Menjalankan reCAPTCHA v3
    grecaptcha.ready(function() {
        grecaptcha.execute('6LdFjE8oAAAAAORk5aKHi1UkwcH5UXkIO7gPI0tU', {
            action: 'login'
        }).then(function(token) {
            recaptchaCallback(token);
        });
    });
</script>
<?= $this->endSection() ?>