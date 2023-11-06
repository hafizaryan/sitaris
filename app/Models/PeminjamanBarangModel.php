<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanBarangModel extends Model
{
    protected $table = 'peminjaman_barang';
    protected $primaryKey = 'id_peminjaman_barang';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['id_barang', 'id_fakultas', 'id_prodi', 'tgl_peminjaman', 'tgl_pengembalian', 'asal_peminjam', 'organisasi', 'nama_peminjam', 'bukti_peminjaman', 'biaya_peminjaman', 'keterangan', 'email_peminjam', 'no_hp', 'status'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedFiled = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
