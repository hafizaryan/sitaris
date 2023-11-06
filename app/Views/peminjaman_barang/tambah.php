<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Fitur Sedang Dalam Pengembangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
            color: #888888;
            margin-bottom: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Fitur Sedang Dalam Pengembangan</h1>
        <p>Kami sedang mengembangkan fitur ini untuk memberikan pengalaman terbaik kepada Anda. Mohon maaf atas ketidaknyamanan yang mungkin terjadi.</p>
        <div>
            <a href="<?= base_url('peminjaman_barang/pinjam'); ?>" class="btn">Kembali ke Halaman Utama</a>
        </div>
        <img src="https://www.webqued.com/wp-content/uploads/2020/06/42.png" width="50%" alt="Sedang Dalam Pengembangan">
    </div>
</body>

</html>