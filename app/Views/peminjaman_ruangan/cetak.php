<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
    <!-- <style>
        @media print {
            thead {
                display: table-header-group;
            }
        }

        body {
            font-family: sans-serif
        }

        .centered {
            text-align: center;
        }

        #header-img {
            width: 100%;
            max-height: 150px;
            /* Set a max-height to maintain the image's aspect ratio */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            /* Add some margin between the header and the table */
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            font-size: 11px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table th {
            padding-top: 10px;
            padding-bottom: 10px;
            background-color: #5DA5FA;
            color: white;
        }

        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            /* Set the desired height for the table container */
        }

        .ttd {
            font-size: 11px;
            /* border: 2px solid red; */
            margin-left: 550px !important;
            /* text-align: right; */
        }
    </style> -->
    <style>
        @media print {
            thead {
                display: table-header-group;
            }
        }

        body {
            font-family: sans-serif
        }

        .centered {
            text-align: center;
        }


        #header-img {
            width: 100%;
            max-height: 130px;
            /* Set a max-height to maintain the image's aspect ratio */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            vertical-align: middle;
            padding: 5px;


            /* Add some margin between the header and the table */
        }



        table th,
        table td {
            border: 1px solid black;
            padding: 8px;
            font-size: 11px;
            text-align: center;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table th {
            padding-top: 10px;
            padding-bottom: 10px;
            background-color: #5DA5FA;
            color: white;
            vertical-align: middle;

        }

        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            vertical-align: middle;


            /* Set the desired height for the table container */
        }

        .ttd {
            font-size: 11px;
        }

        .tebal {
            font-weight: bold;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>
    <img id="header-img" src="gentelella-master/production/images/kopL.jpeg" width="6000%" alt="Header Image">
    <h4 class="centered">DAFTAR PEMINJAMAN <?= strtoupper($ruangan[0]['nama_ruangan']) ?> PROGRAM STUDI SISTEM INFORMASI FAKULTAS SAINS DAN TEKNOLOGI UIN SUSKA RIAU</h4><br>
    <div>
        <table>
            <thead>
                <tr class="tebal">
                    <th>NO</th>
                    <th>Asal Peminjam</th>
                    <th>Organisasi</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal</th>
                    <th>Lama</th>
                    <th>Biaya</th>
                </tr>
            </thead>
        </table>
        <table class="table">
            <tbody>
                <?php
                $no = 0;
                foreach ($model as $value) {
                    $no++;
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?= $value["asal_peminjam"] ?></td>
                        <td><?= $value["organisasi"] ?></td>
                        <td><?= $value["nama_peminjam"] ?></td>
                        <td><?= date('d', strtotime($value["tgl_peminjaman"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_peminjaman"]))) . ' ' . date('Y', strtotime($value["tgl_peminjaman"])) ?></td>
                        <td><?= $value["lama_peminjaman"] ?> Hari</td>
                        <td>Rp.<?= number_format(floatval($value["biaya_peminjaman"]), 0, ',', '.') ?>.-</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="ttd">
        <?php
        // Fungsi untuk mengubah nama bulan bahasa Inggris menjadi bahasa Indonesia
        function bulanIndonesia($bulan)
        {
            $bulan = strtolower($bulan);
            switch ($bulan) {
                case 'january':
                    return 'Januari';
                case 'february':
                    return 'Februari';
                case 'march':
                    return 'Maret';
                case 'april':
                    return 'April';
                case 'may':
                    return 'Mei';
                case 'june':
                    return 'Juni';
                case 'july':
                    return 'Juli';
                case 'august':
                    return 'Agustus';
                case 'september':
                    return 'September';
                case 'october':
                    return 'Oktober';
                case 'november':
                    return 'November';
                case 'december':
                    return 'Desember';
                default:
                    return $bulan;
            }
        }
        // Mengubah format tanggal menjadi format Indonesia
        $tanggal = date('d');
        $bulanInggris = date('F');
        $bulanIndonesia = bulanIndonesia($bulanInggris);
        $tahun = date('Y');
        ?>
        <div class="ttd"><span style="color: white;">====================================================================================</span><?= 'Pekanbaru, ' . $tanggal . ' ' . $bulanIndonesia . ' ' . $tahun ?>
        </div>
        <span style="color: white;">====================================================================================</span>Kepala Laboratorium
        <br><span style="color: white;">====================================================================================</span>Program Studi Sistem Informasi,
        <br>
        <br>
        <br>
        <br>
        <br>
        <div><span style="color: white;">===================================================================================</span><b><?php foreach ($kalabNames as $kalabName) : ?>
                    <u class="custom-u"><?= $kalabName ?></u> <?php endforeach; ?>
                <span style="color: white;">===================================================================================</span><b><?php foreach ($kalabNips as $kalabNip) : ?>
                        <?= $kalabNip ?><br><?php endforeach; ?>
        </div>
    </div>
</body>

</html>