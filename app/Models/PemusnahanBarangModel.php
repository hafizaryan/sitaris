<?php

namespace App\Models;

use CodeIgniter\Model;

class PemusnahanBarangModel extends Model
{
    protected $table = 'pemusnahan_barang';
    protected $primaryKey = 'id_musnah';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['id_barang','tgl_pemusnahan', 'bukti_pemusnahan', 'waktu', 'alasan'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedFiled = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    
}
