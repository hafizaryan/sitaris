<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak QR Code</title>
    <link rel="shortcut icon" type="image/png/jpg" href="<?= base_url() ?>/gentelella-master/production/images/HIMASI.png">
    <style>
        @media print {
            thead {
                display: table-header-group;
            }
        }

        body {
            font-family: sans-serif;
            align-items: center;
        }

        .centered {
            text-align: center;
            font-size: 7px;
        }

        #header-img {
            width: 100%;
            max-height: 130px;
        }

        h5 {
            font-size: 11px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            vertical-align: middle;
            padding: 4px;
            padding-top: 8px;

        }

        table th,
        table td {
            border: 2px solid black;
            padding: 10px;
            font-size: 9px;
            text-align: center;
            vertical-align: middle;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table th {
            padding-bottom: 10px;
            background-color: #5DA5FA;
            color: white;
        }

        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .ttd {
            font-size: 11px;
        }
    </style>
    <!-- Pustaka Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>
    <div class="table-container">
        <div class="container-md">
            <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                <table class="table">
                    <tbody>
                        <!-- Mulai pengulangan data -->
                        <?php
                        $marginBetweenRows = '10px'; // Atur jarak antara baris di sini
                        // Fungsi untuk membuat QR Code dan menyimpannya dalam cache
                        function generateAndCacheQRCode($qrData, $cachePath, $cacheKey)
                        {
                            // Pastikan folder cache tersedia
                            if (!is_dir($cachePath)) {
                                mkdir($cachePath, 0777, true);
                            }
                            $cachedImagePath = $cachePath . '/' . $cacheKey . '.png';
                            // Periksa apakah gambar QR sudah ada dalam cache
                            if (file_exists($cachedImagePath)) {
                                return $cachedImagePath;
                            }
                            $centerImageUrl = ""; // Isi dengan URL gambar Anda
                            $qrCodeImageUrl = "https://quickchart.io/qr?text=" . urlencode($qrData) . "&centerImageUrl=" . urlencode($centerImageUrl);
                            // Unduh gambar QR dari QuickChart dan simpan dalam cache
                            $qrImageData = file_get_contents($qrCodeImageUrl);
                            file_put_contents($cachedImagePath, $qrImageData);
                            return $cachedImagePath;
                        }
                        // Contoh penggunaan
                        $cachePath = './qr_cache'; // Ubah sesuai dengan path cache yang Anda inginkan
                        // Mulai pengulangan data
                        foreach ($model as $value) {
                            $qrData = "Tahun " . $value["tahun_barang"]  .  " Kategori " . $value["sub_kategori"] .  " Merk " . $value["nama_barang"] . " Spesifikasi " . $value["spek_barang"];
                            $cacheKey = md5($qrData);
                            $cachedImagePath = generateAndCacheQRCode($qrData, $cachePath, $cacheKey);
                        ?>
                            <tr style="margin-bottom: <?= $marginBetweenRows ?>;">
                                <td class="centered" style="text-decoration: none;" width="85">
                                    <a href="" target="_blank" style="text-decoration: none;">
                                        <img width="49px" src="gentelella-master/production/images/logouin.jpg" alt="QR Code">
                                    </a>
                                </td>
                                <td class="spek" width="90"><?= $value["spek_barang"] ?></td>
                                <td class="centered" style="text-decoration: none;" width="85">
                                    <!-- Tampilkan gambar QR dari cache -->
                                    <img width="49px" src="<?= $cachedImagePath ?>" alt="QR Code">
                                    <?= substr($value["nama_barang"], -14) ?>
                                </td>
                                <td style="border: none; width:14px"></td>
                                <td class="centered" style="text-decoration: none;" width="85">
                                    <a href="" target="_blank" style="text-decoration: none;">
                                        <img width="49px" src="gentelella-master/production/images/logouin.jpg" alt="QR Code">
                                    </a>
                                </td>
                                <td class="spek" width="90"><?= $value["spek_barang"] ?></td>
                                <td class="centered" style="text-decoration: none;" width="85">
                                    <!-- Tampilkan gambar QR dari cache -->
                                    <img width="49px" src="<?= $cachedImagePath ?>" alt="QR Code">
                                    <?= substr($value["nama_barang"], -14) ?>
                                </td>
                            </tr>
                            <tr style="margin-bottom: <?= $marginBetweenRows ?>;">
                                <td style="border: none; height:7px"></td>
                            </tr>
                        <?php
                        } // Selesai pengulangan data
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container"></div>
</body>

</html>