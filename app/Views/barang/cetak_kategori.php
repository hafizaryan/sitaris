<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kategori</title>
    <link rel="shortcut icon" type="image/png/jpg" href="<?= base_url() ?>/gentelella-master/production/images/HIMASI.png">
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
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            vertical-align: middle;
            padding: 5px;
        }

        table th,
        table td {
            border: 0.5px solid black;
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
        }

        .ttd {
            font-size: 11px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>
    <div class="centered">
        <img id="header-img" src="gentelella-master/production/images/kop.jpg" alt="Header Image">
        <?php
        $firstValue = reset($model);
        $kategoriInventaris = isset($firstValue["sub_kategori"]) ? $firstValue["sub_kategori"] : null;
        if ($kategoriInventaris !== null) {
            $kategoriDisplay = str_replace('_', ' ', $kategoriInventaris);        
        } else {
            header("Location: " . base_url('404'));
            exit();
        }
        ?>

        <h5>DAFTAR INVENTARIS LABORATORIUM KATEGORI <?php echo strtoupper($kategoriDisplay); ?>
            <br> PROGRAM STUDI SISTEM INFORMASI FAKULTAS SAINS DAN TEKNOLOGI UIN SUSKA RIAU
        </h5>
    </div>
    <div class="container-md">
        <table>
            <thead>
                <tr>
                    <th width="40px"><b>NO.</b></th>
                    <th><b>Kode</b></th>
                    <th width="80px"><b>Tahun</b></th>
                    <th width="220px"><b>Spesifikasi</b></th>
                    <th width="80px"><b>Kondisi</b></th>
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
                        <td width="40px"><?php echo $no; ?></td>
                        <td><?= substr($value["nama_barang"], -14) ?></td>
                        <td width="80px"><?= $value["tahun_barang"] ?></td>
                        <td width="220px" style="text-align: left;"><?= $value["spek_barang"] ?></td>
                        <td width="80px"> <?= str_replace('_', ' ', $value["kondisi"]) ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="ttd">
            <?php
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
            $tanggal = date('d');
            $bulanInggris = date('F');
            $bulanIndonesia = bulanIndonesia($bulanInggris);
            $tahun = date('Y');
            ?>
            <div class="ttd"><span style="color: white;">===============================================</span><?= 'Pekanbaru, ' . $tanggal . ' ' . $bulanIndonesia . ' ' . $tahun ?>
            </div>
            <span style="color: white;">===============================================</span>Kepala Laboratorium
            <br><span style="color: white;">===============================================</span>Program Studi Sistem Informasi,
            <br>
            <br>
            <br>
            <br>
            <div><span style="color: white;">==============================================</span><b><?php foreach ($kalabNames as $kalabName) : ?>
                        <u class="custom-u"><?= $kalabName ?></u> <?php endforeach; ?>
                    <span style="color: white;">==============================================</span><b><?php foreach ($kalabNips as $kalabNip) : ?>
                            <?= $kalabNip ?><br><?php endforeach; ?>
            </div>
        </div>
</body>

</html>