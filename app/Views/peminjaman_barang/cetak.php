<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
    <style>
        table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
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
            text-align: left;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            /* vertical-align:middle; */
        }
    </style>
</head>

<body>
    <h1 valign="center">Cetak Barang</h1>

    <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" BORDER="1" style="border-spacing:15px"> -->
    <table id="table">
        <thead>
            <tr style="font-size:10px">
                <th width="40px" valign="center">
                    <div>NO</div>
                </th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Keterlambatan Pengembalian</th>
                <th>Asal Peminjam</th>
                <th>Organisasi</th>
                <th>Nama Peminjam</th>
                <th>Keterangan</th>
                <th>Status Pinjam</th>

            </tr>
        </thead>

        <tbody>
            <?php
            $no = 0;
            foreach ($model as $key => $value) {
                $no++;
                $tgl1 = strtotime($value['tgl_pengembalian']);
                $tgl2 = strtotime(date("Y-m-d"));
                $tgl = $tgl1 - $tgl2;
                $hari = $tgl / 60 / 60 / 24;
            ?>

                <tr style="font-size:10px">
                    <td width="40px"><?php echo $no; ?></td>
                    <td><?= $value["tgl_peminjaman"]; ?></td>
                    <td><?= $value["tgl_pengembalian"]; ?></td>
                    <td>
                        <?php
                        if ($hari >= 0) {
                            echo 'Sisa ' . $hari . ' Hari Lagi';
                        } else {
                            echo 'Terlambat ' . abs($hari) . ' Hari';
                        }
                        ?>
                    </td>
                    <td><?= $value["asal_peminjam"] ?></td>
                    <td><?= $value["organisasi"] ?></td>
                    <td><?= $value["nama_peminjam"] ?></td>
                    <td><?= $value["keterangan"] ?></td>
                    <td><?= $value["status_pinjam"] ?></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>