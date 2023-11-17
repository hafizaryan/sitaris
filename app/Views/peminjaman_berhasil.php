<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <style>
    body,
    h1,
    p {
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .message {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    h1 {
      font-size: 32px;
      color: black;
      margin-bottom: 20px;
    }

    p {
      font-size: 18px;
      margin-bottom: 20px;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: grey;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
      font-size: 18px;
    }

    .btn:hover {
      background-color: #fff;
      color: black;
    }

    .logo {
      max-width: 100px;
    }
  </style>
  <title>Peminjaman Berhasil Diajukan</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/gentelella-master/production/images/HIMASI.png">
</head>

<body>
  <div class="container">
    <div class="message">
      <img src="<?= base_url() ?>/gentelella-master/production/images/HIMASI.png" alt="HIMASI Logo" class="logo">
      <h1>Peminjaman Berhasil Diajukan</h1>
      <p>Terima kasih atas pengajuan peminjaman Anda! <br>Kami akan segera memprosesnya dan menghubungi Anda melalui email atau telepon.</p>
      <?php if (session('status') == "Berhasil") { ?>
        <a href="<?= base_url('peminjaman_barang/pinjam'); ?>" class="btn">Close</a>
      <?php } elseif (session('status') == "Sukses") { ?>
        <a href="<?= base_url('peminjaman_ruangan/pinjam'); ?>" class="btn">Close</a>
      <?php } ?>
    </div>
  </div>
</body>

</html>