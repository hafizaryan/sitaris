<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanRuanganModel extends Model
{
    protected $table = 'peminjaman_ruangan';
    protected $primaryKey = 'id_peminjaman_ruangan';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['id_fakultas', 'id_prodi', 'id_ruangan', 'nama_gedung', 'asal_peminjam', 'organisasi', 'nama_peminjam', 'no_hp', 'email_peminjam', 'tgl_peminjaman', 'lama_peminjaman', 'biaya_peminjaman', 'bukti_peminjaman', 'status_barang', 'keterangan'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedFiled = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
