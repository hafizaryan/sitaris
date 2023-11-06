<?php

namespace App\Models;

use CodeIgniter\Model;

class PendanaanModel extends Model
{
    protected $table = 'pendanaan';
    protected $primaryKey = 'id_pendanaan';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['jenis_pendanaan','keterangan'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedFiled = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    
}