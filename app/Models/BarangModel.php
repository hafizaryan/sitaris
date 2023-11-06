<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['id_pendanaan', 'id_ruangan', 'jenis_pendanaan', 'tahun_barang', 'kategori_barang', 'sub_kategori', 'nama_barang', 'kode', 'spek_barang', 'kondisi', 'tgl_masuk_barang', 'gambar_barang', 'waktu_input', 'deskripsi', 'user_input', 'user_edit', 'tgl_edit', 'status'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedFiled = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
